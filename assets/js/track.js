let moodData = {};
let currentDisplayYear = null;
let currentDisplayMonth = null;
let selectedMood = null;
let isGuest = false;

const calendarGridEl = document.getElementById("calendarGrid");
const monthYearDisplay = document.getElementById("monthYearDisplay");
const prevBtn = document.getElementById("prevMonthBtn");
const nextBtn = document.getElementById("nextMonthBtn");
const pinTodayBtn = document.getElementById("pinTodayBtn");
const burnBtn = document.getElementById("burnSelectedBtn");
const moodButtonsContainer = document.getElementById("moodButtonsContainer");
const infoMessageEl = document.getElementById("infoMessage");

function getTodayKey() {
 const today = new Date();
 const yyyy = today.getFullYear();
 const mm = String(today.getMonth() + 1).padStart(2, "0");
 const dd = String(today.getDate()).padStart(2, "0");
 return `${yyyy}-${mm}-${dd}`;
}

function getTodayDateObj() {
 const now = new Date();
 return new Date(now.getFullYear(), now.getMonth(), now.getDate());
}

function showTemporaryMessage(msg, isError = false) {
 const originalHTML = infoMessageEl.innerHTML;
 infoMessageEl.innerHTML = isError ? `⚠️ ${msg}` : `✨ ${msg}`;
 infoMessageEl.style.color = isError ? "#c77d5e" : "#aa7f60";
 setTimeout(() => {
  infoMessageEl.innerHTML = originalHTML;
  infoMessageEl.style.color = "#aa7f60";
 }, 3000);
}

async function saveMoodToServer(date, mood) {
 const formData = new FormData();
 formData.append("action", "save_mood");
 formData.append("mood_date", date);
 formData.append("mood_text", mood);

 try {
  const response = await fetch("./scripts/api/track-api.php", {
   method: "POST",
   body: formData,
  });
  const result = await response.json();
  return result;
 } catch (error) {
  console.error("Error saving mood:", error);
  return {success: false, error: "Network error"};
 }
}

async function removeMoodFromServer(date) {
 const formData = new FormData();
 formData.append("action", "remove_mood");
 formData.append("mood_date", date);

 try {
  const response = await fetch("./scripts/api/track-api.php", {
   method: "POST",
   body: formData,
  });
  const result = await response.json();
  return result;
 } catch (error) {
  console.error("Error removing mood:", error);
  return {success: false, error: "Network error"};
 }
}

async function loadMoodsFromServer(year, month) {
 try {
  const response = await fetch(
   `./scripts/api/track-api.php?action=get_moods&year=${year}&month=${month}`,
  );
  const result = await response.json();

  if (result.success) {
   if (result.is_guest) {
    isGuest = true;

    loadFromLocalStorage();
   } else {
    isGuest = false;

    moodData = result.moods;
    saveToLocalStorage();
   }
   renderCalendar();
  } else {
   showTemporaryMessage(
    "Error loading moods: " + (result.error || "Unknown error"),
    true,
   );
  }
 } catch (error) {
  console.error("Error loading moods:", error);
  showTemporaryMessage("Network error loading moods", true);

  loadFromLocalStorage();
  renderCalendar();
 }
}

function loadFromLocalStorage() {
 const stored = localStorage.getItem("mood_calendar_guest_data");
 if (stored) {
  try {
   moodData = JSON.parse(stored);
  } catch (e) {
   moodData = {};
  }
 } else {
  moodData = {};
 }
}

function saveToLocalStorage() {
 if (isGuest || !document.querySelector("[data-user-logged]")) {
  localStorage.setItem("mood_calendar_guest_data", JSON.stringify(moodData));
 }
}

async function setMoodForDate(dateObj, moodText) {
 if (!moodText) return false;

 const year = dateObj.getFullYear();
 const month = String(dateObj.getMonth() + 1).padStart(2, "0");
 const day = String(dateObj.getDate()).padStart(2, "0");
 const key = `${year}-${month}-${day}`;

 moodData[key] = moodText;
 saveToLocalStorage();

 const result = await saveMoodToServer(key, moodText);
 if (result.success) {
  showTemporaryMessage(`✅ ${moodText} mood saved!`);
  return true;
 } else {
  showTemporaryMessage(
   `⚠️ Saved locally only: ${result.error || "Server issue"}`,
   true,
  );
  return false;
 }
}

async function removeMoodForDate(dateObj) {
 const year = dateObj.getFullYear();
 const month = String(dateObj.getMonth() + 1).padStart(2, "0");
 const day = String(dateObj.getDate()).padStart(2, "0");
 const key = `${year}-${month}-${day}`;

 if (moodData[key]) {
  delete moodData[key];
  saveToLocalStorage();

  const result = await removeMoodFromServer(key);
  if (result.success) {
   showTemporaryMessage(`🔥 Mood removed!`);
  } else {
   showTemporaryMessage(`⚠️ Removed locally only`, true);
  }
  return true;
 }
 return false;
}

function getMoodForDate(dateObj) {
 const year = dateObj.getFullYear();
 const month = String(dateObj.getMonth() + 1).padStart(2, "0");
 const day = String(dateObj.getDate()).padStart(2, "0");
 const key = `${year}-${month}-${day}`;
 return moodData[key] || null;
}

function renderCalendar() {
 if (!currentDisplayYear || currentDisplayMonth === undefined) return;

 const firstDayOfMonth = new Date(currentDisplayYear, currentDisplayMonth, 1);
 const startWeekday = firstDayOfMonth.getDay();
 const daysInMonth = new Date(
  currentDisplayYear,
  currentDisplayMonth + 1,
  0,
 ).getDate();

 const prevMonthDate = new Date(currentDisplayYear, currentDisplayMonth, 0);
 const daysInPrevMonth = prevMonthDate.getDate();

 const todayObj = getTodayDateObj();
 const currentYear = todayObj.getFullYear();
 const currentMonth = todayObj.getMonth();
 const currentDateNum = todayObj.getDate();

 let cells = [];

 for (let i = startWeekday - 1; i >= 0; i--) {
  const prevDateNum = daysInPrevMonth - i;
  const fillerDate = new Date(
   currentDisplayYear,
   currentDisplayMonth - 1,
   prevDateNum,
  );
  const moodHere = getMoodForDate(fillerDate);
  const isTodayFiller =
   fillerDate.getFullYear() === currentYear &&
   fillerDate.getMonth() === currentMonth &&
   fillerDate.getDate() === currentDateNum;
  cells.push({
   type: "filler",
   date: fillerDate,
   dayNum: prevDateNum,
   mood: moodHere,
   isToday: isTodayFiller,
  });
 }

 for (let d = 1; d <= daysInMonth; d++) {
  const currentDate = new Date(currentDisplayYear, currentDisplayMonth, d);
  const moodHere = getMoodForDate(currentDate);
  const isToday =
   currentDisplayYear === currentYear &&
   currentDisplayMonth === currentMonth &&
   d === currentDateNum;
  cells.push({
   type: "current",
   date: currentDate,
   dayNum: d,
   mood: moodHere,
   isToday: isToday,
  });
 }

 const totalCells = cells.length;
 const remaining = 42 - totalCells;
 for (let i = 1; i <= remaining; i++) {
  const nextDate = new Date(currentDisplayYear, currentDisplayMonth + 1, i);
  const moodHere = getMoodForDate(nextDate);
  const isTodayNext =
   nextDate.getFullYear() === currentYear &&
   nextDate.getMonth() === currentMonth &&
   nextDate.getDate() === currentDateNum;
  cells.push({
   type: "filler",
   date: nextDate,
   dayNum: i,
   mood: moodHere,
   isToday: isTodayNext,
  });
 }

 calendarGridEl.innerHTML = "";
 cells.forEach((cell) => {
  const dayDiv = document.createElement("div");
  dayDiv.classList.add("calendar-day");
  if (cell.type === "filler") dayDiv.classList.add("empty");
  if (cell.isToday) dayDiv.classList.add("today");

  const numberSpan = document.createElement("div");
  numberSpan.classList.add("day-number");
  numberSpan.innerText = cell.dayNum;
  dayDiv.appendChild(numberSpan);

  if (cell.mood) {
   const moodSpan = document.createElement("div");
   moodSpan.classList.add("mood-marker");
   let moodIcon = "😊";
   if (cell.mood.toLowerCase().includes("creative")) moodIcon = "✨";
   else if (cell.mood.toLowerCase().includes("stable")) moodIcon = "🌿";
   else if (cell.mood.toLowerCase().includes("sad")) moodIcon = "💧";
   else if (cell.mood.toLowerCase().includes("drained")) moodIcon = "⚡";
   else if (cell.mood.toLowerCase().includes("overwhelmed")) moodIcon = "🌀";
   else if (cell.mood.toLowerCase().includes("joyful")) moodIcon = "🌸";
   else if (cell.mood.toLowerCase().includes("motivated")) moodIcon = "🚀";
   else moodIcon = "📌";
   moodSpan.innerText = `${moodIcon} ${cell.mood}`;
   dayDiv.appendChild(moodSpan);
  }

  calendarGridEl.appendChild(dayDiv);
 });
}

function updateMonthYearLabel() {
 const monthNames = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
 ];
 monthYearDisplay.innerText = `${monthNames[currentDisplayMonth]} ${currentDisplayYear}`;
}

function goPrevMonth() {
 let newMonth = currentDisplayMonth - 1;
 let newYear = currentDisplayYear;
 if (newMonth < 0) {
  newMonth = 11;
  newYear--;
 }
 currentDisplayMonth = newMonth;
 currentDisplayYear = newYear;
 updateMonthYearLabel();
 loadMoodsFromServer(currentDisplayYear, currentDisplayMonth + 1);
}

function goNextMonth() {
 let newMonth = currentDisplayMonth + 1;
 let newYear = currentDisplayYear;
 if (newMonth > 11) {
  newMonth = 0;
  newYear++;
 }
 currentDisplayMonth = newMonth;
 currentDisplayYear = newYear;
 updateMonthYearLabel();
 loadMoodsFromServer(currentDisplayYear, currentDisplayMonth + 1);
}

function highlightSelectedMoodButton(moodValue) {
 const allBtns = document.querySelectorAll(".mood-btn");
 allBtns.forEach((btn) => {
  if (btn.getAttribute("data-mood") === moodValue) {
   btn.classList.add("active");
  } else {
   btn.classList.remove("active");
  }
 });
}

async function pinMoodToToday() {
 if (!selectedMood) {
  showTemporaryMessage("Please select a mood first!", true);
  return;
 }

 const todayDate = new Date();
 const year = todayDate.getFullYear();
 const month = String(todayDate.getMonth() + 1).padStart(2, "0");
 const day = String(todayDate.getDate()).padStart(2, "0");
 const key = `${year}-${month}-${day}`;

 moodData[key] = selectedMood;
 saveToLocalStorage();

 saveMoodToServer(key, selectedMood).then((result) => {
  if (result.success) {
   showTemporaryMessage(`✅ ${selectedMood} mood saved!`);
  } else {
   showTemporaryMessage(`⚠️ Saved locally only`, true);
  }
 });

 renderCalendar();
}

async function burnMoodFromToday() {
 const todayDate = new Date();
 const year = todayDate.getFullYear();
 const month = String(todayDate.getMonth() + 1).padStart(2, "0");
 const day = String(todayDate.getDate()).padStart(2, "0");
 const key = `${year}-${month}-${day}`;

 const existingMood = moodData[key];
 if (!existingMood) {
  showTemporaryMessage("No mood to burn today!", true);
  return;
 }

 delete moodData[key];
 saveToLocalStorage();

 removeMoodFromServer(key).then((result) => {
  if (result.success) {
   showTemporaryMessage(`🔥 Mood removed!`);
  } else {
   showTemporaryMessage(`⚠️ Removed locally only`, true);
  }
 });

 renderCalendar();
}

function setupMoodSelection() {
 moodButtonsContainer.addEventListener("click", (e) => {
  const btn = e.target.closest(".mood-btn");
  if (!btn) return;
  const moodValue = btn.getAttribute("data-mood");
  if (moodValue) {
   selectedMood = moodValue;
   highlightSelectedMoodButton(moodValue);
   showTemporaryMessage(`Selected: ${moodValue}`);
  }
 });
}

async function init() {
 const now = new Date();
 currentDisplayYear = now.getFullYear();
 currentDisplayMonth = now.getMonth();
 updateMonthYearLabel();

 await loadMoodsFromServer(currentDisplayYear, currentDisplayMonth + 1);

 prevBtn.addEventListener("click", goPrevMonth);
 nextBtn.addEventListener("click", goNextMonth);
 pinTodayBtn.addEventListener("click", pinMoodToToday);
 burnBtn.addEventListener("click", burnMoodFromToday);
 setupMoodSelection();
}

init();
