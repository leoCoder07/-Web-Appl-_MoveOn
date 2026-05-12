<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>MoveOn - About</title>
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

  .about-container {
   max-width: 1200px;
   margin: 0 auto;
   padding: 40px 20px;
  }

  .about-header {
   background: linear-gradient(135deg, #2AD1E2 0%, #829CEE 50%, #625FE9 100%);
   color: white;
   padding: 60px 40px;
   border-radius: 10px;
   margin-bottom: 40px;
   text-align: center;
  }

  .about-header h1 {
   font-size: 48px;
   margin-bottom: 10px;
   font-weight: 600;
  }

  .about-header p {
   font-size: 18px;
   opacity: 0.9;
  }

  .content-grid {
   display: grid;
   grid-template-columns: 1fr 2fr;
   gap: 40px;
   margin-bottom: 40px;
  }

  .profile-section {
   background: white;
   border-radius: 10px;
   padding: 30px;
   text-align: center;
   height: fit-content;
  }

  .profile-image {
   width: 100%;
   max-width: 250px;
   height: auto;
   aspect-ratio: 1 / 1;
   border-radius: 10px;
   object-fit: cover;
   margin-bottom: 20px;
  }

  .profile-name {
   font-size: 24px;
   font-weight: 600;
   color: #2AD1E2;
   margin-bottom: 5px;
  }

  .profile-title {
   color: #829CEE;
   font-size: 14px;
   margin-bottom: 15px;
  }

  .profile-bio {
   color: #666;
   font-size: 14px;
   line-height: 1.6;
  }

  .content-section {
   background: white;
   border-radius: 10px;
   padding: 30px;
  }

  .content-section h2 {
   color: #625FE9;
   font-size: 28px;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 2px solid #2AD1E2;
   display: inline-block;
  }

  .content-section h3 {
   color: #2AD1E2;
   font-size: 20px;
   margin: 25px 0 15px 0;
  }

  .content-section p {
   margin-bottom: 15px;
   color: #555;
  }

  .pillars-grid {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
   gap: 20px;
   margin: 25px 0;
  }

  .pillar-card {
   background: #f8f9fa;
   padding: 20px;
   border-radius: 10px;
  }

  .pillar-card h4 {
   color: #625FE9;
   font-size: 18px;
   margin-bottom: 10px;
  }

  .pillar-card p {
   font-size: 14px;
   margin: 0;
  }

  .quote-box {
   background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
   padding: 30px;
   border-radius: 10px;
   text-align: center;
   margin: 30px 0;
   border: 1px solid #eee;
  }

  .quote-box p {
   font-size: 18px;
   font-style: italic;
   color: #625FE9;
   margin: 0;
  }

  @media (max-width: 768px) {
   .content-grid {
    grid-template-columns: 1fr;
    gap: 20px;
   }

   .about-header h1 {
    font-size: 32px;
   }

   .profile-image {
    max-width: 200px;
   }

   .pillars-grid {
    grid-template-columns: 1fr;
   }
  }
 </style>
</head>

<body>
 <div class="about-container">
  <div class="about-header">
   <h1>About MoveOn</h1>
   <p>A digital sanctuary for healing and moving forward</p>
  </div>

  <div class="content-grid">
   <div class="profile-section">
    <img src="assets/images/webp/me.webp" alt="Profile" class="profile-image" id="profileImage">
    <div class="profile-name">John Leo B. Jariel</div>
    <div class="profile-title">Creator & Developer</div>
    <div class="profile-bio">A sophomore college student who turned a finals project into a mission to help others heal from heartbreak.</div>
   </div>

   <div class="content-section">
    <h2>Our Mission</h2>
    <p>At MoveOn, we believe that healing from heartbreak should not be a lonely or directionless experience. Our mission is to provide a digital sanctuary for individuals navigating the emotional aftermath of a breakup, combining the principles of expressive writing, cognitive tracking, and the therapeutic power of music to create a structured, compassionate space where healing is actively facilitated.</p>
   </div>
  </div>

  <div class="content-section">
   <h2>The Story Behind MoveOn: A Solo Journey of Passion</h2>
   <p>MoveOn is entirely the original idea and creation of John Leo B. Jariel, a sophomore college student. What started as a project for his finals quarter quickly evolved into something much more meaningful. Recognizing that heartbreak is a universal yet deeply isolating experience, John Leo saw a gap in how we handle emotional recovery digitally. He noticed countless apps for physical fitness and productivity, but a stark lack of tools designed to guide people through the messy, non-linear reality of moving on from a breakup.</p>
   <p>Every line of code, every system design diagram, and every feature from the seamless music player logic to the dual-mode Guest and Registered user architecture was meticulously designed and developed by John Leo. Balancing the rigorous demands of his sophomore year, he poured his technical skills and deep empathy into building MoveOn, proving that a single, driven individual can create technology that truly understands the human heart.</p>
  </div>

  <div class="content-section">
   <h2>Our Approach: How We Help You Heal</h2>
   <p>MoveOn does not offer toxic positivity or quick fixes. Instead, it is built on three foundational pillars of emotional recovery:</p>

   <div class="pillars-grid">
    <div class="pillar-card">
     <h4>Expression (Vent)</h4>
     <p>Suppressing emotions prolongs pain. The Vent Jar provides a private, judgment-free zone to externalize intrusive thoughts. The act of writing brings clarity, and the option to burn a thought provides a powerful psychological exercise in letting go.</p>
    </div>
    <div class="pillar-card">
     <h4>Reflection (Track)</h4>
     <p>Healing is hard to see when you are in the middle of it. The Mood Tracker allows you to step back and observe your emotional landscape over time. It validates your bad days and highlights your resilience on your good days.</p>
    </div>
    <div class="pillar-card">
     <h4>Solace (Relapse and Hope)</h4>
     <p>Sometimes, you just need to feel understood. Whether it is finding comfort in a curated playlist that matches your exact emotional frequency, or reading stories from others who have survived the same pain, MoveOn provides the comfort of knowing you are not alone.</p>
    </div>
   </div>
  </div>

  <div class="content-section">
   <h2>From College Finals to the Real World</h2>
   <p>While MoveOn began as a requirement for John Leo's college finals, its potential to genuinely help people could not be ignored. The project goes far beyond a classroom exercise. John Leo is currently planning to publish MoveOn publicly, transforming it from an academic project into a real-world tool available to anyone who needs a companion through their heartbreak. His goal is to ensure that no one has to navigate the aftermath of a breakup alone.</p>
  </div>

  <div class="content-section">
   <h2>Built with Empathy and Privacy</h2>
   <p>Because MoveOn handles deeply personal thoughts, privacy is a core standard, not just a feature. Your Vent Jar is for your eyes only. Your mood data is securely protected. John Leo even engineered a Guest Mode so users can start healing immediately without exchanging personal information. It was built to be a safe space, and it will remain that way.</p>
  </div>
 </div>

 <?php include './includes/footer.php'; ?>

</body>

</html>