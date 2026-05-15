class VentJar {
 constructor() {
  this.messages = [];
  this.currentMessageId = null;
  this.isGuest = window.userSession?.isGuest || false;
  this.init();
 }

 async init() {
  await this.loadMessages();
  this.setupEventListeners();
 }

 setupEventListeners() {
  const form = document.getElementById("ventForm");
  if (form) {
   form.addEventListener("submit", (e) => {
    e.preventDefault();
    this.addMessage();
   });
  }

  const burnAllBtn = document.getElementById("burnAllBtn");
  if (burnAllBtn) {
   burnAllBtn.addEventListener("click", () => this.burnAllMessages());
  }

  const modal = document.getElementById("messageModal");
  const closeBtn = document.querySelector(".close-modal");
  if (closeBtn) {
   closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
   });
  }

  window.addEventListener("click", (e) => {
   if (e.target === modal) {
    modal.style.display = "none";
   }
  });

  const deleteBtn = document.getElementById("deleteMessageBtn");
  if (deleteBtn) {
   deleteBtn.addEventListener("click", () => this.deleteCurrentMessage());
  }
 }

 async loadMessages() {
  const container = document.getElementById("papersContainer");
  container.innerHTML =
   '<div class="loading-indicator">Loading your thoughts...</div>';

  try {
   if (this.isGuest) {
    this.loadFromLocalStorage();
    this.renderPapers();
   } else {
    const response = await fetch(
     "./scripts/api/vent-api.php?action=get_messages",
    );
    const data = await response.json();

    if (data.success) {
     this.messages = data.messages || [];
     this.renderPapers();

     this.saveToLocalStorage();
    } else {
     container.innerHTML =
      '<div class="empty-jar-message">Your jar is empty. Write something to fill it!</div>';
    }
   }
  } catch (error) {
   console.error("Error loading messages:", error);
   container.innerHTML =
    '<div class="empty-jar-message">⚠️ Error loading messages. Please refresh the page.</div>';
  }
 }

 loadFromLocalStorage() {
  const stored = localStorage.getItem("vent_guest_messages");
  if (stored) {
   try {
    this.messages = JSON.parse(stored);
   } catch (e) {
    this.messages = [];
   }
  } else {
   this.messages = [];
  }
 }

 saveToLocalStorage() {
  if (this.isGuest) {
   localStorage.setItem("vent_guest_messages", JSON.stringify(this.messages));
  }
 }

 async addMessage() {
  const textarea = document.getElementById("ventMessage");
  const message = textarea.value.trim();

  if (!message) {
   this.showNotification("Please write something first!", "error");
   return;
  }

  if (message.length > 500) {
   this.showNotification("Message is too long (max 500 characters)", "error");
   return;
  }

  const putButton = document.getElementById("putButton");

  try {
   const formData = new FormData();
   formData.append("action", "save_message");
   formData.append("message", message);

   const response = await fetch("./scripts/api/vent-api.php", {
    method: "POST",
    body: formData,
   });
   const data = await response.json();

   if (data.success) {
    if (this.isGuest && data.paper) {
     this.messages.unshift(data.paper);
    } else if (!this.isGuest && data.paper) {
     this.messages.unshift(data.paper);
    }

    this.saveToLocalStorage();
    this.renderPapers();
    textarea.value = "";
    this.showNotification("✨ Your thought has been added to the jar!");
   } else {
    this.showNotification(data.error || "Failed to save message", "error");
   }
  } catch (error) {
   console.error("Error adding message:", error);
   this.showNotification("Network error. Please try again.", "error");
  } finally {
   putButton.disabled = false;
   putButton.innerHTML =
    '<i class="ti ti-circle-dashed-plus"></i><span>Put</span>';
  }
 }

 async deleteMessage(messageId) {
  try {
   if (this.isGuest) {
    this.messages = this.messages.filter((msg) => msg.id !== messageId);
    this.saveToLocalStorage();
    this.renderPapers();
    this.showNotification("Message removed from jar");
    return true;
   } else {
    const formData = new FormData();
    formData.append("action", "delete_message");
    formData.append("message_id", messageId);

    const response = await fetch("./scripts/api/vent-api.php", {
     method: "POST",
     body: formData,
    });
    const data = await response.json();

    if (data.success) {
     this.messages = this.messages.filter((msg) => msg.id != messageId);
     this.saveToLocalStorage();
     this.renderPapers();
     this.showNotification("Message deleted successfully");
     return true;
    } else {
     this.showNotification(data.error || "Failed to delete", "error");
     return false;
    }
   }
  } catch (error) {
   console.error("Error deleting message:", error);
   this.showNotification("Network error", "error");
   return false;
  }
 }

 async burnAllMessages() {
  if (this.messages.length === 0) {
   this.showNotification("Jar is already empty!", "error");
   return;
  }

  const confirmed = confirm(
   "⚠️ Are you sure? This will burn ALL your messages permanently.",
  );
  if (!confirmed) return;

  if (this.isGuest) {
   this.messages = [];
   this.saveToLocalStorage();
   this.renderPapers();
   this.showNotification("🔥 All messages have been burned!");
  } else {
   const deletePromises = this.messages.map((msg) =>
    this.deleteMessage(msg.id),
   );
   await Promise.all(deletePromises);
   this.showNotification("🔥 All messages have been burned!");
  }
 }

 async deleteCurrentMessage() {
  if (this.currentMessageId) {
   await this.deleteMessage(this.currentMessageId);
   const modal = document.getElementById("messageModal");
   modal.style.display = "none";
   this.currentMessageId = null;
  }
 }

 renderPapers() {
  const container = document.getElementById("papersContainer");

  if (!this.messages || this.messages.length === 0) {
   container.innerHTML =
    '<div class="empty-jar-message">Your jar is empty. Write something to fill it!</div>';
   return;
  }

  container.innerHTML = "";

  this.messages.forEach((msg, index) => {
   const paper = this.createPaperElement(msg, index);
   container.appendChild(paper);
  });
 }

 createPaperElement(message, index) {
  const svgString = `<svg fill="${message.color_code || "#FFE4B5"}" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 31.344 31.344" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><g><g><path d="M14.512,16.491c-1.044-1.062-3.715-3.402-6.129-2.517l-7.339,7.238c0.038-0.006,0.076-0.013,0.114-0.017 c1.682-0.221,4.117,0.041,6.459,2.414c1.89,1.918,2.702,3.679,2.285,4.955c-0.233,0.707-0.825,1.188-1.628,1.319 c-0.141,0.021-0.296,0.034-0.458,0.034c-1.351,0-3.353-0.84-5.176-3.298l1.128-0.84c1.484,1.998,3.281,2.888,4.28,2.716 c0.421-0.07,0.492-0.295,0.518-0.37c0.175-0.536-0.23-1.785-1.952-3.526c-2.78-2.82-5.592-2.089-6.569-1.701 c-0.265,1.611,0.65,3.861,2.489,5.728c2.377,2.412,5.423,3.289,6.929,2.04c0.011-0.002,0.015-0.003,0.015-0.003l8.174-8.06 c0.125-0.328,0.252-1.062-0.352-2.27C16.644,19.021,15.628,17.622,14.512,16.491z"></path><path d="M28.811,2.715c-2.452-2.486-5.618-3.342-7.069-1.912C21.7,0.843,15.845,6.61,15.845,6.61 c1.791,0.721,3.709,2.043,5.274,3.63c1.811,1.835,2.945,3.762,3.365,5.624c0,0,6.102-6.015,6.139-6.052 C32.074,8.38,31.264,5.203,28.811,2.715z"></path><path d="M24.449,19.137c-0.752-0.176-1.311-0.238-1.395-0.244c0.172-0.59,0.229-1.193,0.186-1.8 c-0.148-2.06-1.437-4.151-3.121-5.86c-1.484-1.506-3.277-2.716-4.875-3.342c-0.183-0.072-0.36-0.12-0.536-0.151l-4.719,4.653 c1.953,0.186,3.908,1.473,5.526,3.112c1.283,1.304,2.356,2.831,3.043,4.201c0.277,0.551,0.44,1.048,0.524,1.486 c0.328,1.67-0.461,2.521-0.461,2.521l2.617-2.58c0.111-0.021,0.229-0.051,0.34-0.094c0.121,0.562,0.146,1.104,0.1,1.633 c-0.254,2.887-2.604,5.102-2.604,5.102l2.781,1.201c3.491-2.803,2.368-6.197,1.447-7.904c-0.215-0.396-0.418-0.699-0.55-0.887 c-0.006-0.01-0.014-0.021-0.02-0.035c0.008,0.008,0.012,0.017,0.02,0.024c0.336,0.146,0.644,0.326,0.927,0.521 c2.791,1.945,2.977,5.982,2.977,5.982l2.724-1.326C29.524,20.977,26.362,19.58,24.449,19.137z"></path></g></g></g></svg>`;

  const wrapper = document.createElement("div");
  wrapper.className = "paper-note";

  const randomX = 10 + Math.random() * 60;
  const randomY = 20 + Math.random() * 60;
  const rotation = message.paper_rotation || Math.random() * 30 - 15;

  wrapper.style.position = "absolute";
  wrapper.style.left = `${randomX}%`;
  wrapper.style.bottom = `${randomY}%`;
  wrapper.style.transform = `rotate(${rotation}deg)`;
  wrapper.style.width = "35px";
  wrapper.style.height = "35px";
  wrapper.style.zIndex = index;

  wrapper.innerHTML = svgString;

  wrapper.addEventListener("click", (e) => {
   e.stopPropagation();
   this.showMessageModal(message);
  });

  return wrapper;
 }

 showMessageModal(message) {
  const modal = document.getElementById("messageModal");
  const modalMessage = document.getElementById("modalMessage");
  const modalDate = document.getElementById("modalDate");

  modalMessage.textContent = message.message;
  const date = new Date(message.created_at);
  modalDate.textContent = `Added: ${date.toLocaleString()}`;
  this.currentMessageId = message.id;

  modal.style.display = "flex";
 }

 showNotification(message, type = "success") {
  const existing = document.querySelector(".notification");
  if (existing) existing.remove();

  const notification = document.createElement("div");
  notification.className = `notification ${type}`;
  notification.innerHTML = `<i class="ti ti-${type === "error" ? "alert-circle" : "check"}"></i> ${message}`;
  document.body.appendChild(notification);

  setTimeout(() => {
   if (notification) notification.remove();
  }, 3000);
 }
}

document.addEventListener("DOMContentLoaded", () => {
 new VentJar();
});
