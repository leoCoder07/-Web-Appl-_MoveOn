class ProfileManager {
 constructor() {
  this.currentProfileIcon = null;
  this.init();
 }

 async init() {
  await this.loadUserData();
  this.setupEventListeners();
 }

 async loadUserData() {
  try {
   const response = await fetch(
    "./scripts/api/profile-api.php?action=get_user_data",
   );
   const data = await response.json();

   if (data.success && data.user) {
    this.renderProfile(data.user);
    await this.loadQuestionsAnswers();
   } else {
    this.showError("Failed to load user data");
   }
  } catch (error) {
   console.error("Error loading user data:", error);
  }
 }

 renderProfile(user) {
  const profileIcon = document.getElementById("profileIcon");
  const iconClass = user.profile_icon || "gradient-1";
  profileIcon.className = `profile-icon ${iconClass}`;

  const firstLetter = user.username.charAt(0).toUpperCase();
  profileIcon.innerHTML = `<span>${firstLetter}</span>`;
  this.currentProfileIcon = iconClass;

  document.getElementById("displayUsername").textContent = user.username;
  document.getElementById("displayUserCode").textContent =
   `#${user.four_digit_code}`;

  const bioElement = document.getElementById("displayBio");
  if (user.bio && user.bio.trim()) {
   bioElement.textContent = user.bio;
  } else {
   bioElement.textContent = "No bio yet. Click the edit button to add one!";
   bioElement.style.color = "#999";
  }

  window.userFourDigitCode = user.four_digit_code;
 }

 async loadQuestionsAnswers() {
  try {
   const response = await fetch(
    "./scripts/api/profile-api.php?action=get_questions_with_answers",
   );
   const data = await response.json();

   if (data.success && data.questions_answers) {
    this.renderAnswers(data.questions_answers);
   }
  } catch (error) {
   console.error("Error loading answers:", error);
  }
 }

 renderAnswers(questionsAnswers) {
  const container = document.getElementById("answersContainer");
  const allSkipped = questionsAnswers.every((qa) => qa.answer === "skip");

  if (allSkipped) {
   container.innerHTML = `
                <div class="answer-item">
                    <p class="answer-text skip">You skipped all the onboarding questions. That's okay! You can always come back to reflect on your journey.</p>
                </div>
            `;
   return;
  }

  container.innerHTML = questionsAnswers
   .map(
    (qa) => `
            <div class="answer-item">
                <div class="answer-question">Question ${qa.question_id}: ${this.escapeHtml(qa.question_text)}</div>
                <div class="answer-text ${qa.answer === "skip" ? "skip" : ""}">
                    ${qa.answer === "skip" ? "⏭️ Skipped this question" : `${this.escapeHtml(qa.answer)}`}
                </div>
            </div>
        `,
   )
   .join("");
 }

 setupEventListeners() {
  const editIconBtn = document.getElementById("editIconBtn");
  if (editIconBtn) {
   editIconBtn.addEventListener("click", () => this.showIconModal());
  }

  const editUsernameBtn = document.getElementById("editUsernameBtn");
  if (editUsernameBtn) {
   editUsernameBtn.addEventListener("click", () => this.showUsernameModal());
  }

  const editBioBtn = document.getElementById("editBioBtn");
  if (editBioBtn) {
   editBioBtn.addEventListener("click", () => this.showBioModal());
  }

  document.querySelectorAll(".close-modal").forEach((btn) => {
   btn.addEventListener("click", () => this.closeAllModals());
  });

  window.addEventListener("click", (e) => {
   if (e.target.classList.contains("modal")) {
    e.target.style.display = "none";
   }
  });

  const userBio = document.getElementById("userBio");
  if (userBio) {
   userBio.addEventListener("input", () => {
    const count = userBio.value.length;
    document.getElementById("bioCharCount").textContent = count;
   });
  }
 }

 showIconModal() {
  const modal = document.getElementById("iconModal");
  const grid = document.getElementById("iconGrid");

  const gradients = [
   {name: "Ocean Sunset", class: "gradient-1"},
   {name: "Coral Dream", class: "gradient-2"},
   {name: "Sky Blue", class: "gradient-3"},
   {name: "Fresh Mint", class: "gradient-4"},
   {name: "Golden Glow", class: "gradient-5"},
   {name: "Purple Haze", class: "gradient-6"},
   {name: "Rose Petal", class: "gradient-7"},
  ];

  grid.innerHTML = gradients
   .map(
    (g) => `
            <div class="icon-option ${this.currentProfileIcon === g.class ? "selected" : ""}" data-icon="${g.class}">
                <div class="icon-preview ${g.class}"></div>
                <span class="icon-name">${g.name}</span>
            </div>
        `,
   )
   .join("");

  grid.querySelectorAll(".icon-option").forEach((option) => {
   option.addEventListener("click", async () => {
    const iconClass = option.dataset.icon;
    await this.updateProfileIcon(iconClass);
    grid
     .querySelectorAll(".icon-option")
     .forEach((opt) => opt.classList.remove("selected"));
    option.classList.add("selected");
    this.currentProfileIcon = iconClass;

    const profileIcon = document.getElementById("profileIcon");
    profileIcon.className = `profile-icon ${iconClass}`;
   });
  });

  modal.style.display = "flex";
 }

 async updateProfileIcon(iconClass) {
  try {
   const formData = new FormData();
   formData.append("action", "update_profile_icon");
   formData.append("icon", iconClass);

   const response = await fetch("./scripts/api/profile-api.php", {
    method: "POST",
    body: formData,
   });
   const data = await response.json();

   if (data.success) {
    this.showNotification("Profile icon updated!", "success");
   } else {
    this.showNotification(data.error || "Failed to update icon", "error");
   }
  } catch (error) {
   console.error("Error updating icon:", error);
   this.showNotification("Network error", "error");
  }
 }

 showUsernameModal() {
  const modal = document.getElementById("usernameModal");
  const input = document.getElementById("newUsername");
  input.value = document.getElementById("displayUsername").textContent;
  document.getElementById("usernameError").textContent = "";
  modal.style.display = "flex";

  const saveBtn = document.getElementById("saveUsernameBtn");
  const cancelBtn = document.getElementById("cancelUsernameBtn");

  const saveHandler = async () => {
   const newUsername = input.value.trim();
   const userCode = document.getElementById("userCode").value;

   if (!newUsername) {
    this.showError("usernameError", "Username cannot be empty");
    return;
   }

   if (newUsername.length < 3 || newUsername.length > 50) {
    this.showError(
     "usernameError",
     "Username must be between 3 and 50 characters",
    );
    return;
   }

   if (!/^[a-zA-Z0-9_]+$/.test(newUsername)) {
    this.showError(
     "usernameError",
     "Username can only contain letters, numbers, and underscores",
    );
    return;
   }

   if (!userCode) {
    this.showError(
     "usernameError",
     "Please enter your 4-digit code for verification",
    );
    return;
   }

   if (userCode !== window.userFourDigitCode) {
    this.showError("usernameError", "Incorrect 4-digit code");
    return;
   }

   try {
    const formData = new FormData();
    formData.append("action", "update_username");
    formData.append("username", newUsername);

    const response = await fetch("./scripts/api/profile-api.php", {
     method: "POST",
     body: formData,
    });
    const data = await response.json();

    if (data.success) {
     document.getElementById("displayUsername").textContent = data.new_username;
     this.showNotification("Username updated successfully!", "success");
     modal.style.display = "none";
     document.getElementById("userCode").value = "";
    } else {
     this.showError("usernameError", data.error);
    }
   } catch (error) {
    console.error("Error updating username:", error);
    this.showError("usernameError", "Network error");
   }
  };

  const cancelHandler = () => {
   modal.style.display = "none";
   saveBtn.removeEventListener("click", saveHandler);
   cancelBtn.removeEventListener("click", cancelHandler);
  };

  saveBtn.addEventListener("click", saveHandler);
  cancelBtn.addEventListener("click", cancelHandler);

  modal.addEventListener(
   "click",
   (e) => {
    if (e.target === modal) {
     cancelHandler();
    }
   },
   {once: true},
  );
 }

 showBioModal() {
  const modal = document.getElementById("bioModal");
  const textarea = document.getElementById("userBio");
  const currentBio = document.getElementById("displayBio").textContent;

  textarea.value =
   currentBio !== "No bio yet. Click the edit button to add one!"
    ? currentBio
    : "";
  document.getElementById("bioCharCount").textContent = textarea.value.length;
  document.getElementById("bioError").textContent = "";
  modal.style.display = "flex";

  const saveBtn = document.getElementById("saveBioBtn");
  const cancelBtn = document.getElementById("cancelBioBtn");

  const saveHandler = async () => {
   const bio = textarea.value.trim();

   if (bio.length > 500) {
    this.showError("bioError", "Bio cannot exceed 500 characters");
    return;
   }

   try {
    const formData = new FormData();
    formData.append("action", "update_bio");
    formData.append("bio", bio);

    const response = await fetch("./scripts/api/profile-api.php", {
     method: "POST",
     body: formData,
    });
    const data = await response.json();

    if (data.success) {
     const bioElement = document.getElementById("displayBio");
     if (bio) {
      bioElement.textContent = bio;
      bioElement.style.color = "#666";
     } else {
      bioElement.textContent = "No bio yet. Click the edit button to add one!";
      bioElement.style.color = "#999";
     }
     this.showNotification("Bio updated successfully!", "success");
     modal.style.display = "none";
    } else {
     this.showError("bioError", data.error);
    }
   } catch (error) {
    console.error("Error updating bio:", error);
    this.showError("bioError", "Network error");
   }
  };

  const cancelHandler = () => {
   modal.style.display = "none";
   saveBtn.removeEventListener("click", saveHandler);
   cancelBtn.removeEventListener("click", cancelHandler);
  };

  saveBtn.addEventListener("click", saveHandler);
  cancelBtn.addEventListener("click", cancelHandler);

  modal.addEventListener(
   "click",
   (e) => {
    if (e.target === modal) {
     cancelHandler();
    }
   },
   {once: true},
  );
 }

 closeAllModals() {
  document.querySelectorAll(".modal").forEach((modal) => {
   modal.style.display = "none";
  });
 }

 showError(elementId, message) {
  const errorDiv = document.getElementById(elementId);
  if (errorDiv) {
   errorDiv.textContent = message;
   setTimeout(() => {
    errorDiv.textContent = "";
   }, 3000);
  }
 }

 showNotification(message, type = "success") {
  const notification = document.createElement("div");
  notification.className = `notification ${type}`;
  notification.innerHTML = `<i class="ti ti-${type === "success" ? "check" : "alert-circle"}"></i> ${message}`;
  notification.style.cssText = `
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: ${type === "success" ? "#4c6a3b" : "#dc3545"};
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            z-index: 1001;
            animation: slideInRight 0.3s, fadeOut 0.3s 2.7s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        `;
  document.body.appendChild(notification);

  setTimeout(() => {
   if (notification) notification.remove();
  }, 3000);
 }

 escapeHtml(text) {
  const div = document.createElement("div");
  div.textContent = text;
  return div.innerHTML;
 }
}

document.addEventListener("DOMContentLoaded", () => {
 if (!window.userSession?.isGuest) {
  new ProfileManager();
 }
});
