<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>MoveOn - Project Documentation</title>
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

  .documentation-container {
   max-width: 1200px;
   margin: 0 auto;
   padding: 40px 20px;
  }

  /* Header */
  .doc-header {
   background: linear-gradient(135deg, #2AD1E2 0%, #829CEE 50%, #625FE9 100%);
   color: white;
   padding: 60px 40px;
   border-radius: 20px;
   margin-bottom: 40px;
   text-align: center;
  }

  .doc-header h1 {
   font-size: 48px;
   margin-bottom: 10px;
  }

  .doc-header p {
   font-size: 18px;
   opacity: 0.9;
  }

  .doc-header .version {
   display: inline-block;
   margin-top: 20px;
   padding: 8px 16px;
   background: rgba(255, 255, 255, 0.2);
   border-radius: 20px;
   font-size: 14px;
  }

  /* Table of Contents */
  .toc {
   background: white;
   padding: 30px;
   border-radius: 15px;
   margin-bottom: 40px;
  }

  .toc h2 {
   color: #625FE9;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 2px solid #eee;
  }

  .toc-grid {
   display: grid;
   grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
   gap: 15px;
  }

  .toc-item {
   padding: 10px 15px;
   background: #f8f9fa;
   border-radius: 10px;
   transition: 0.2s;
  }

  .toc-item:hover {
   background: #e9ecef;
   transform: translateX(5px);
  }

  .toc-item a {
   text-decoration: none;
   color: #333;
   font-weight: 500;
  }

  .toc-item a:hover {
   color: #2AD1E2;
  }

  /* Sections */
  .section {
   background: white;
   padding: 40px;
   border-radius: 15px;
   margin-bottom: 30px;
  }

  .section h2 {
   color: #625FE9;
   font-size: 28px;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 3px solid #2AD1E2;
   display: inline-block;
  }

  .section h3 {
   color: #2AD1E2;
   font-size: 22px;
   margin: 25px 0 15px 0;
  }

  .section h4 {
   color: #829CEE;
   font-size: 18px;
   margin: 20px 0 10px 0;
  }

  .section p {
   margin-bottom: 15px;
   color: #555;
  }

  /* Feature Cards */
  .features-grid {
   display: grid;
   grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
   gap: 20px;
   margin: 30px 0;
  }

  .feature-card {
   background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
   padding: 25px;
   border-radius: 15px;
  }

  .feature-card h4 {
   color: #625FE9;
   margin-top: 0;
  }

  /* Best Practices List */
  .practices-list {
   list-style: none;
   padding: 0;
  }

  .practices-list li {
   padding: 12px 0;
   border-bottom: 1px solid #eee;
   display: flex;
   align-items: flex-start;
   gap: 15px;
  }

  .practices-list li strong {
   color: #2AD1E2;
   min-width: 180px;
  }

  /* Diagram Placeholders */
  .diagram-placeholder {
   width: 100%;
  }

  .diagram-placeholder img {
   object-fit: cover;
   width: inherit;
   border-radius: 10px;
   border: 1px solid;
  }

  .diagram-placeholder:hover {
   border-color: #2AD1E2;
   background: #f0f8ff;
  }

  .diagram-placeholder i {
   font-size: 48px;
   color: #ccc;
   margin-bottom: 15px;
   display: block;
  }

  .diagram-placeholder p {
   color: #999;
   margin: 0;
  }

  /* Tech Stack */
  .tech-stack {
   display: flex;
   flex-wrap: wrap;
   gap: 15px;
   margin: 20px 0;
  }

  .tech-badge {
   background: linear-gradient(135deg, #2AD1E2, #829CEE);
   color: white;
   padding: 8px 20px;
   border-radius: 25px;
   font-weight: 500;
   font-size: 14px;
  }

  /* Responsive */
  @media (max-width: 768px) {
   .doc-header h1 {
    font-size: 32px;
   }

   .section {
    padding: 25px;
   }

   .features-grid {
    grid-template-columns: 1fr;
   }

   .practices-list li {
    flex-direction: column;
    gap: 5px;
   }

   .practices-list li strong {
    min-width: auto;
   }
  }

  /* Code Block Style */
  .code-block {
   background: #1e1e1e;
   color: #d4d4d4;
   padding: 15px;
   border-radius: 10px;
   overflow-x: auto;
   font-family: 'Courier New', monospace;
   font-size: 13px;
   margin: 15px 0;
  }

  /* Footer */
  .doc-footer {
   text-align: center;
   padding: 30px;
   color: #999;
   border-top: 1px solid #eee;
   margin-top: 40px;
  }
 </style>
</head>

<body>
 <div class="documentation-container">
  <!-- Header -->
  <div class="doc-header">
   <h1>MoveOn</h1>
   <p>Emotional Recovery Platform - Technical Documentation</p>
   <div class="version">Version 1.0 | Last Updated: May 2026</div>
  </div>

  <!-- Table of Contents -->
  <div class="toc">
   <h2>Table of Contents</h2>
   <div class="toc-grid">
    <div class="toc-item"><a href="#overview">1. Project Overview</a></div>
    <div class="toc-item"><a href="#goals">2. Project Goals</a></div>
    <div class="toc-item"><a href="#features">3. Core Features</a></div>
    <div class="toc-item"><a href="#technical">4. Technical Implementation</a></div>
    <div class="toc-item"><a href="#practices">5. Best Practices Applied</a></div>
    <div class="toc-item"><a href="#diagrams">6. System Design Diagrams</a></div>
   </div>
  </div>

  <!-- Section 1: Project Overview -->
  <div id="overview" class="section">
   <h2>1. Project Overview</h2>
   <p><strong>MoveOn</strong> is a targeted web-based mental health and emotional recovery application designed to help individuals navigate the difficult aftermath of a breakup. Understanding that heartbreak is a non-linear process, MoveOn provides a structured, safe, and interactive digital space for users to process their emotions, track their healing progress, and find solace through music and community stories. By combining cognitive behavioral tracking with expressive writing and sensory therapy, MoveOn acts as a digital companion for the newly single.</p>
  </div>

  <!-- Section 2: Project Goals -->
  <div id="goals" class="section">
   <h2>2. Project Goals</h2>
   <ul style="margin-left: 20px; color: #555;">
    <li><strong>Facilitate Emotional Processing</strong>: Provide immediate, frictionless outlets for users to express negative or overwhelming thoughts without judgment.</li>
    <li><strong>Promote Self-Awareness</strong>: Enable users to visualize their emotional journey over time, helping them recognize that healing is happening even when it feels slow.</li>
    <li><strong>Lower the Barrier to Entry</strong>: Allow guest users to experience the core healing tools immediately, without forcing them through a lengthy registration process upfront.</li>
    <li><strong>Ensure Data Privacy & Security</strong>: Protect sensitive emotional data and user credentials through secure authentication flows and session management.</li>
    <li><strong>Deliver a Seamless UX</strong>: Ensure smooth transitions between features, particularly in the music player, so the user's immersive experience is never broken.</li>
   </ul>
  </div>

  <!-- Section 3: Core Features -->
  <div id="features" class="section">
   <h2>3. Core Features</h2>
   <div class="features-grid">
    <div class="feature-card">
     <h4>📋 Onboarding Questionnaire</h4>
     <p>A 4-step initial assessment that captures the user's immediate emotional state, saving answers temporarily before committing them to a user account.</p>
    </div>
    <div class="feature-card">
     <h4>🔐 Flexible Authentication</h4>
     <p>Supports three distinct paths—Sign Up, Log In, and Guest Mode. Guests can utilize core features with data saved locally via JavaScript, while registered users have persistent database storage.</p>
    </div>
    <div class="feature-card">
     <h4>🏺 Vent Jar</h4>
     <p>A digital journal where users can write down intrusive thoughts. Users can choose to "save" their thoughts to the jar or "burn" (delete) them, symbolizing letting go.</p>
    </div>
    <div class="feature-card">
     <h4>🎵 Relapse Music Player</h4>
     <p>A curated music player featuring "Submerged" (for deep feels) and "Ascendant" (for moving forward) playlists. Ensures seamless playback across different pages without interruption.</p>
    </div>
    <div class="feature-card">
     <h4>💝 Hope Section</h4>
     <p>A curated feed of inspirational quotes, shared heartbreak stories, and book recommendations to provide perspective and comfort.</p>
    </div>
    <div class="feature-card">
     <h4>📅 Mood Tracker</h4>
     <p>An interactive calendar where users can log their daily mood and pin specific memories or triggers, allowing them to visualize their emotional trajectory over weeks or months.</p>
    </div>
    <div class="feature-card">
     <h4>👤 Profile Management</h4>
     <p>A centralized dashboard for registered users to update their personal information and manage their account.</p>
    </div>
   </div>
  </div>

  <!-- Section 4: Technical Implementation -->
  <div id="technical" class="section">
   <h2>4. Technical Implementation</h2>
   <p>I developed MoveOn using a traditional but highly effective basic style architecture (JS, Apache, MySQL, PHP), enhanced with modern frontend practices.</p>

   <div class="tech-stack">
    <span class="tech-badge">HTML5</span>
    <span class="tech-badge">CSS3</span>
    <span class="tech-badge">JavaScript</span>
    <span class="tech-badge">PHP</span>
    <span class="tech-badge">MySQL</span>
    <span class="tech-badge">AJAX/Fetch API</span>
    <span class="tech-badge">LocalStorage</span>
   </div>

   <h3>Frontend</h3>
   <p>Built using core web technologies (HTML5, CSS3, JavaScript). I utilized AJAX (Fetch API) to communicate with backend APIs asynchronously, ensuring the UI updates dynamically without page reloads. For the music player, I engineered a <code>GlobalMusicManager</code> in JavaScript that binds to the <code>window</code> object, utilizing the browser's <code>localStorage</code> to persist playback state (current song, timestamp) across page navigations.</p>

   <h3>Backend</h3>
   <p>Powered by PHP. I strictly separated concerns by dividing the backend into three types of files:</p>
   <ul style="margin-left: 20px; margin-bottom: 15px;">
    <li><strong>UI Pages</strong> (e.g., <code>vent.php</code>, <code>track.php</code>): Render the HTML.</li>
    <li><strong>Processors</strong> (e.g., <code>process-authentication.php</code>): Handle form POSTs, manage <code>$_SESSION</code> variables, and execute database writes.</li>
    <li><strong>APIs</strong> (e.g., <code>vent-api.php</code>, <code>music-api.php</code>): Accept AJAX requests, execute CRUD operations, and return JSON responses.</li>
   </ul>

   <h3>Database</h3>
   <p>MySQL. I designed a relational schema to store user credentials, vent messages, mood tracking histories, and music playback states.</p>

   <h3>Session Management</h3>
   <p>Implemented a robust session validation layer via <code>process-post-authentication.php</code>. Every protected page includes this file, which checks for <code>$_SESSION['user_id']</code> (for registered users) or <code>$_SESSION['guest_answers']</code> (for guests), redirecting unauthorized access appropriately.</p>
  </div>

  <!-- Section 5: Best Practices -->
  <div id="practices" class="section">
   <h2>5. Best Practices Applied</h2>
   <ul class="practices-list">
    <li><strong>Separation of Concerns:</strong> Strictly separating UI rendering (PHP pages), business logic (Processors), and data access (APIs) makes the codebase modular and maintainable.</li>
    <li><strong>Progressive Onboarding:</strong> By allowing Guest access and storing temporary answers in <code>$_SESSION</code> before account creation, the app respects the user's immediate emotional needs before asking for a commitment.</li>
    <li><strong>Graceful Degradation (Guest Mode):</strong> The application does not break for guests. If a guest uses the Vent or Track features, the APIs detect the lack of <code>user_id</code> and gracefully fall back to saving data via JavaScript <code>localStorage</code> instead of the MySQL database.</li>
    <li><strong>Stateless API Communication:</strong> APIs receive data via POST/GET and return standardized JSON responses, making the frontend easily adaptable if the UI framework changes in the future.</li>
    <li><strong>Persistent State for Media:</strong> Implementing <code>localStorage</code> for the music player ensures that a user's listening experience isn't interrupted by a page refresh or navigation, which is crucial for emotional immersion.</li>
   </ul>
  </div>

  <!-- Section 6: System Design Diagrams -->
  <div id="diagrams" class="section">
   <h2>6. System Design Diagrams</h2>
   <p>To ensure a robust architecture and clear understanding of system behaviors, I utilized the following UML and system diagrams during the design phase:</p>

   <!-- Diagram 1 -->
   <h3>1. Sequence Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_sequence.png" alt="">
   </div>
   <p><strong>Key Insight:</strong> It mapped out the exact lifecycle of a user session—from the initial onboarding loop, through the complex authentication decision tree (Sign Up/Log In/Guest), to the asynchronous API calls for saving moods and vent thoughts.</p>

   <!-- Diagram 2 -->
   <h3>2. Use Case Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_ucd.png" alt="">
   </div>
   <p><strong>Key Insight:</strong> Clearly defined the boundaries between "Visitors," "Guests," and "Registered Users," highlighting how Guests interact with the same UI features but route their data to LocalStorage instead of the Database.</p>

   <!-- Diagram 3 -->
   <h3>3. Activity Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_activity.png" alt="">
   </div>
   <p><strong>Key Insight:</strong> Illustrated the parallel processing during onboarding (fetching questions while initializing sessions) and the conditional branching within the core features (e.g., choosing between updating a profile or logging out).</p>

   <!-- Diagram 4 -->
   <h3>4. Deployment Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_deployment.png" alt="">
   </div>
   <p><strong>Key Insight:</strong> Visualized the Three-Tier Architecture (Client Browser, PHP Web Server, MySQL Database), clarifying where different storage mechanisms (<code>$_SESSION</code>, <code>localStorage</code>, MySQL tables) reside and how data traverses via HTTP/SQL protocols.</p>

   <!-- Diagram 5 -->
   <h3>5. Flowchart Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_flowchart.png" alt="">
   </div>
   <p><strong>Key Insight:</strong> It clearly illustrated the "Guest vs. Registered User" data persistence logic. When a user saves a vent or a mood, the flowchart shows the exact decision node: <em>Is user_id set?</em> If yes, route data to the MySQL Database via PHP API; if no (Guest), route data to the Browser's LocalStorage via JavaScript. This ensured no logical gaps existed in the dual-mode functionality.</p>

   <h3>6. MoveOn ER Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_db_er.png" alt="">
   </div>

   <h3>7. MoveOn-Admin ER Diagram</h3>
   <div class="diagram-placeholder">
    <img src="assets/images/diagrams/moveon_admin_er.png" alt="">
   </div>
  </div>

  <!-- Footer -->
 </div>
 <?php include './includes/footer.php' ?>

</body>

</html>