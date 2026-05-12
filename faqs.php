<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>MoveOn - FAQ'S</title>
 <link rel="stylesheet" href="assets/css/header&footer/footer.css">
 <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
 <style>
  * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
  }

  body {
   font-family: 'Lexend Deca', sans-serif;
   background: white;
   line-height: 1.6;
   color: #333;
  }

  .faq-container {
   max-width: 1200px;
   margin: 0 auto;
   padding: 40px 20px;
  }

  .faq-header {
   background: linear-gradient(135deg, #2AD1E2 0%, #829CEE 50%, #625FE9 100%);
   color: white;
   padding: 60px 40px;
   border-radius: 20px;
   margin-bottom: 40px;
   text-align: center;
  }

  .faq-header h1 {
   font-size: 48px;
   margin-bottom: 10px;
  }

  .faq-header p {
   font-size: 18px;
   opacity: 0.9;
  }

  .faq-header .question-count {
   display: inline-block;
   margin-top: 20px;
   padding: 8px 16px;
   border-radius: 20px;
   font-size: 14px;
  }

  .faq-category {
   background: white;
   border-radius: 10px;
   margin-bottom: 30px;
   overflow: hidden;
  }

  .category-header {
   border-bottom: 1px solid #829CEE;
   color: #2442a6;
   padding: 20px 30px;
   cursor: pointer;
   display: flex;
   justify-content: space-between;
   align-items: center;
   transition: 0.2s;
  }

  .category-header:hover {
   opacity: 0.95;
  }

  .category-header h2 {
   font-size: 22px;
   font-weight: 400;
   display: flex;
   align-items: center;
   gap: 10px;
  }

  .category-toggle {
   font-size: 24px;
   transition: transform 0.3s;
  }

  .category-toggle.rotated {
   transform: rotate(180deg);
  }

  .faq-items {
   display: none;
  }

  .faq-items.active {
   display: block;
  }

  .faq-item {
   border-bottom: 1px solid #eee;
   padding: 20px 30px;
   transition: 0.2s;
  }

  .faq-item:last-child {
   border-bottom: none;
  }

  .faq-item:hover {
   background: #f8f9fa;
  }

  .faq-question {
   font-weight: 400;
   font-size: 18px;
   color: #333;
   cursor: pointer;
   display: flex;
   justify-content: space-between;
   align-items: center;
   gap: 15px;
  }

  .faq-question i {
   color: #2AD1E2;
   transition: transform 0.2s;
  }

  .faq-answer {
   display: none;
   margin-top: 15px;
   padding-top: 15px;
   color: #666;
   line-height: 1.8;
   border-top: 1px solid #f0f0f0;
  }

  .faq-answer.show {
   display: block;
  }

  .faq-answer strong {
   color: #625FE9;
  }

  .back-to-top {
   position: fixed;
   bottom: 30px;
   right: 30px;
   background: #2AD1E2;
   color: white;
   width: 50px;
   height: 50px;
   border-radius: 50%;
   display: flex;
   align-items: center;
   justify-content: center;
   cursor: pointer;
   opacity: 0;
   transition: 0.3s;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  }

  .back-to-top.visible {
   opacity: 1;
  }

  .back-to-top:hover {
   background: #625FE9;
   transform: scale(1.1);
  }

  .search-box {
   background: white;
   border-radius: 50px;
   padding: 12px 25px;
   margin-bottom: 30px;
   display: flex;
   align-items: center;
   gap: 15px;
   box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .search-box i {
   color: #2AD1E2;
   font-size: 20px;
  }

  .search-box input {
   flex: 1;
   border: none;
   outline: none;
   font-family: 'Lexend Deca', sans-serif;
   font-size: 16px;
   padding: 8px 0;
  }

  .search-box input::placeholder {
   color: #ccc;
  }

  .no-results {
   text-align: center;
   padding: 40px;
   color: #999;
   display: none;
  }

  .no-results.show {
   display: block;
  }

  @media (max-width: 768px) {
   .faq-header h1 {
    font-size: 32px;
   }

   .faq-question {
    font-size: 16px;
   }

   .category-header h2 {
    font-size: 18px;
   }

   .faq-item {
    padding: 15px 20px;
   }
  }
 </style>
</head>

<body>
 <div id="breadcrumb-container"></div>
 <div class="faq-container">
  <div class="faq-header">
   <h1>Frequently Asked Questions</h1>
   <p>Everything you need to know about MoveOn</p>
   <div class="question-count">📋 15+ Answers to Common Questions</div>
  </div>

  <div id="noResults" class="no-results">
   No questions found matching your search. Try different keywords!
  </div>

  <!-- Category 1: General Usage -->
  <div class="faq-category" data-category="general">
   <div class="category-header">
    <h2>General Usage</h2>
    <span class="category-toggle">▼</span>
   </div>
   <div class="faq-items">
    <div class="faq-item">
     <div class="faq-question">
      Do I need to create an account to use MoveOn?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      No. MoveOn offers a "Continue as Guest" option. We understand that when you're going through a tough time, the last thing you want is another signup form. Guests can access the core healing tools immediately. However, your data will be saved locally in your browser rather than on our secure servers.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      What is the difference between a Guest and a Registered User?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Guests have full access to the Vent, Relapse, and Track features, but their saved thoughts, moods, and music states are stored locally on their device's browser (LocalStorage). <strong>Registered Users</strong> have their data securely saved in our database, meaning they can log in from any device and never lose their progress or saved memories.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      How does the Onboarding Questionnaire work?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      When you first enter the app, you are asked 4 quick questions to gauge your current emotional state. Your answers are temporarily saved. Once you choose to Sign Up, Log In, or Continue as Guest, those answers are linked to your session to personalize your initial dashboard experience.
     </div>
    </div>
   </div>
  </div>

  <!-- Category 2: Features & Functionality -->
  <div class="faq-category" data-category="features">
   <div class="category-header">
    <h2>Features & Functionality</h2>
    <span class="category-toggle">▼</span>
   </div>
   <div class="faq-items">
    <div class="faq-item">
     <div class="faq-question">
      What is the "Vent Jar"?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      The Vent Jar is a private, digital space for you to write down intrusive thoughts, frustrations, or feelings. You can choose to "Save" a thought to keep it in your jar, or "Burn" (delete) it. Burning a thought is a symbolic exercise in letting go and moving forward.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      Why does the music keep playing when I navigate to different pages?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      We designed the Relapse music player to provide a continuous, immersive healing experience. Instead of stopping when you click a new page, our GlobalMusicManager saves your playback state continuously, ensuring your therapeutic playlist never interrupts your flow.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      How does the Mood Tracker help me?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      The Mood Tracker provides a visual calendar of your emotional journey. By logging your daily mood and pinning specific triggers or memories, you create a tangible record of your progress. On days when you feel stuck, looking back at your calendar can remind you of the good days and prove that healing is happening.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      What kind of music is available in the Relapse player?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      The Relapse player features two curated playlists: <strong>SUBMERGED</strong> for deep, emotional moments with slower, atmospheric tracks, and <strong>ASCENDANT</strong> for uplifting, energetic vibes that help you feel empowered and moving forward.
     </div>
    </div>
   </div>
  </div>

  <!-- Category 3: Data Privacy & Security -->
  <div class="faq-category" data-category="privacy">
   <div class="category-header">
    <h2>Data Privacy & Security</h2>
    <span class="category-toggle">▼</span>
   </div>
   <div class="faq-items">
    <div class="faq-item">
     <div class="faq-question">
      Is my Vent Jar data private?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Absolutely. Your Vent Jar is strictly private. Your thoughts are never shared publicly or with other users. They are solely for your personal emotional processing.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      Where is my data stored?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      For <strong>Registered Users</strong>, all personal information, vent messages, and mood logs are securely stored in our encrypted MySQL database. For <strong>Guest Users</strong>, data is stored locally within your web browser's LocalStorage. Note that clearing your browser cache/data will erase Guest data.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      How do you handle my password?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      We take security seriously. Passwords are never stored in plain text. They are securely hashed using industry-standard PHP password hashing algorithms before being saved to the database. Even our system administrators cannot view your plain-text password.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      Can other users see my mood entries?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      No. Your mood entries are completely private. Only you can see your mood calendar and the emotions you've logged. MoveOn is designed as a personal healing tool, not a social platform.
     </div>
    </div>
   </div>
  </div>

  <!-- Category 4: Technical & Account Management -->
  <div class="faq-category" data-category="technical">
   <div class="category-header">
    <h2>Technical & Account Management</h2>
    <span class="category-toggle">▼</span>
   </div>
   <div class="faq-items">
    <div class="faq-item">
     <div class="faq-question">
      Can I access MoveOn on my mobile phone?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Yes. MoveOn is a web-based application built with responsive design principles, meaning it adapts seamlessly to mobile phones, tablets, and desktop screens.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      How do I log out?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      You can log out by navigating to your Profile page and clicking the "Log Out" button. This securely destroys your active session on the server and redirects you to the authentication page, ensuring your data remains safe if you are on a shared device.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      What happens to my data if I log in as a Guest and later create an account?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Currently, Guest data (saved in LocalStorage) and Registered User data (saved in the Database) exist in separate environments. If you start as a Guest and later create an account, your new account will start fresh. We recommend registering from the beginning if you wish to preserve your progress long-term.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      I forgot my password. How do I reset it?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      On the login page, click "Forgot Password" and follow the instructions. You'll be prompted to verify your identity, and a password reset link will be sent to your registered email address.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      Can I delete my account and all my data?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Yes. Contact our support team at support@moveon.com, and we will permanently delete your account and all associated data from our servers within 30 days.
     </div>
    </div>
   </div>
  </div>

  <!-- Category 5: Troubleshooting -->
  <div class="faq-category" data-category="troubleshooting">
   <div class="category-header">
    <h2>Troubleshooting</h2>
    <span class="category-toggle">▼</span>
   </div>
   <div class="faq-items">
    <div class="faq-item">
     <div class="faq-question">
      The music player stops when I change pages. What's wrong?
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Make sure your browser allows localStorage and JavaScript. The GlobalMusicManager requires these to function properly. Also, ensure you're not using incognito/private mode, as some browsers restrict persistent storage in these modes.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      My Vent Jar messages disappeared after clearing browser cache.
      <i>▶</i>
     </div>
     <div class="faq-answer">
      If you were using MoveOn as a Guest, your messages were stored in your browser's LocalStorage. Clearing your browser cache and cookies will erase all Guest data. To prevent this, we recommend creating a registered account to save your data securely on our servers.
     </div>
    </div>

    <div class="faq-item">
     <div class="faq-question">
      The calendar won't load or shows errors.
      <i>▶</i>
     </div>
     <div class="faq-answer">
      Try refreshing the page. If the issue persists, clear your browser cache or try a different browser. MoveOn works best on the latest versions of Chrome, Firefox, Safari, and Edge.
     </div>
    </div>
   </div>
  </div>

  <script>
   document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
     const answer = question.nextElementSibling;
     const icon = question.querySelector('i');
     answer.classList.toggle('show');
     icon.style.transform = answer.classList.contains('show') ? 'rotate(90deg)' : 'rotate(0deg)';
    });
   });

   document.querySelectorAll('.category-header').forEach(header => {
    header.addEventListener('click', () => {
     const items = header.nextElementSibling;
     const toggle = header.querySelector('.category-toggle');
     items.classList.toggle('active');
     toggle.classList.toggle('rotated');
    });
   });

   document.querySelectorAll('.faq-items').forEach(items => {
    items.classList.add('active');
   });

   const backToTop = document.getElementById('backToTop');
   window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
     backToTop.classList.add('visible');
    } else {
     backToTop.classList.remove('visible');
    }
   });

   backToTop.addEventListener('click', () => {
    window.scrollTo({
     top: 0,
     behavior: 'smooth'
    });
   });

   const searchInput = document.getElementById('searchInput');
   const noResults = document.getElementById('noResults');

   searchInput.addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase().trim();
    const allItems = document.querySelectorAll('.faq-item');
    let visibleCount = 0;

    if (searchTerm === '') {
     allItems.forEach(item => {
      item.style.display = '';
      noResults.classList.remove('show');
     });
     return;
    }

    allItems.forEach(item => {
     const question = item.querySelector('.faq-question').textContent.toLowerCase();
     const answer = item.querySelector('.faq-answer').textContent.toLowerCase();

     if (question.includes(searchTerm) || answer.includes(searchTerm)) {
      item.style.display = '';
      visibleCount++;
     } else {
      item.style.display = 'none';
     }
    });

    if (visibleCount === 0) {
     noResults.classList.add('show');
    } else {
     noResults.classList.remove('show');
    }
   });
  </script>

  <?php include 'includes/footer.php'; ?>
</body>

</html>