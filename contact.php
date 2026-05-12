<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>MoveOn - Contact Us</title>
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

  .contact-container {
   max-width: 1200px;
   margin: 0 auto;
   padding: 40px 20px;
  }

  .contact-header {
   background: linear-gradient(135deg, #2AD1E2 0%, #829CEE 50%, #625FE9 100%);
   color: white;
   padding: 60px 40px;
   border-radius: 10px;
   margin-bottom: 40px;
   text-align: center;
  }

  .contact-header h1 {
   font-size: 48px;
   margin-bottom: 10px;
   font-weight: 600;
  }

  .contact-header p {
   font-size: 18px;
   opacity: 0.9;
  }

  .intro-section {
   background: white;
   border-radius: 10px;
   padding: 30px;
   margin-bottom: 30px;
  }

  .intro-section p {
   color: #555;
   font-size: 16px;
   line-height: 1.8;
  }

  .contact-grid {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
   gap: 30px;
   margin-bottom: 30px;
  }

  .contact-card {
   background: white;
   border-radius: 10px;
   padding: 25px;
   transition: transform 0.2s;
  }

  .contact-card:hover {
   transform: translateY(-5px);
  }

  .contact-card h3 {
   color: #2AD1E2;
   font-size: 20px;
   margin-bottom: 15px;
   padding-bottom: 10px;
   border-bottom: 2px solid #829CEE;
   display: inline-block;
  }

  .contact-card .email {
   margin: 15px 0;
   padding: 10px;
   background: #f8f9fa;
   border-radius: 8px;
   font-family: monospace;
   word-break: break-all;
  }

  .contact-card .email a {
   color: #625FE9;
   text-decoration: none;
  }

  .contact-card .email a:hover {
   text-decoration: underline;
  }

  .contact-card .response-time {
   font-size: 13px;
   color: #999;
   margin-top: 10px;
  }

  .social-section {
   background: white;
   border-radius: 10px;
   padding: 30px;
   margin-bottom: 30px;
  }

  .social-section h3 {
   color: #2AD1E2;
   font-size: 20px;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 2px solid #829CEE;
   display: inline-block;
  }

  .social-links {
   display: flex;
   flex-wrap: wrap;
   gap: 20px;
   margin-top: 20px;
  }

  .social-link {
   background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
   padding: 12px 25px;
   border-radius: 10px;
   text-decoration: none;
   color: #625FE9;
   font-weight: 500;
   transition: 0.2s;
   border: 1px solid #eee;
  }

  .social-link:hover {
   background: linear-gradient(135deg, #2AD1E2 0%, #829CEE 100%);
   color: white;
   transform: translateY(-2px);
  }

  .developer-section {
   background: linear-gradient(135deg, #f8f9fa 0%, #fff 100%);
   border-radius: 10px;
   padding: 30px;
   margin-bottom: 30px;
   border: 1px solid #eee;
  }

  .developer-section h3 {
   color: #2AD1E2;
   font-size: 20px;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 2px solid #829CEE;
   display: inline-block;
  }

  .developer-info {
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
   gap: 15px;
   margin-top: 20px;
  }

  .developer-item {
   padding: 10px;
   background: white;
   border-radius: 8px;
   text-align: center;
  }

  .developer-item strong {
   color: #625FE9;
   display: block;
   margin-bottom: 5px;
  }

  .developer-item a {
   color: #2AD1E2;
   text-decoration: none;
  }

  .developer-item a:hover {
   text-decoration: underline;
  }

  .mailing-section {
   background: white;
   border-radius: 10px;
   padding: 30px;
   margin-bottom: 30px;
  }

  .mailing-section h3 {
   color: #2AD1E2;
   font-size: 20px;
   margin-bottom: 20px;
   padding-bottom: 10px;
   border-bottom: 2px solid #829CEE;
   display: inline-block;
  }

  .mailing-address {
   background: #f8f9fa;
   padding: 20px;
   border-radius: 10px;
   margin-top: 15px;
   font-family: monospace;
   line-height: 1.8;
  }

  .disclaimer {
   background: #fff3e0;
   padding: 20px;
   border-radius: 10px;
   margin-top: 30px;
  }

  .disclaimer p {
   color: #856404;
   font-size: 14px;
   margin: 0;
  }

  @media (max-width: 768px) {
   .contact-header h1 {
    font-size: 32px;
   }

   .contact-grid {
    grid-template-columns: 1fr;
   }

   .social-links {
    flex-direction: column;
   }

   .social-link {
    text-align: center;
   }
  }
 </style>
</head>

<body>
 <div class="contact-container">
  <div class="contact-header">
   <h1>Contact Us</h1>
   <p>We are always here to listen</p>
  </div>

  <div class="intro-section">
   <p>Whether you have feedback on how we can improve MoveOn, questions about the application, or simply want to share your own journey of healing, we would love to hear from you. Your insights help shape this platform into a better space for everyone navigating heartbreak.</p>
  </div>

  <div class="contact-grid">
   <div class="contact-card">
    <h3>General Inquiries and Support</h3>
    <div class="email">
     <a href="mailto:support@moveon-app.com">support@moveon-app.com</a>
    </div>
    <div class="response-time">Response Time: 24-48 hours</div>
   </div>

   <div class="contact-card">
    <h3>Feedback and Feature Suggestions</h3>
    <div class="email">
     <a href="mailto:feedback@moveon-app.com">feedback@moveon-app.com</a>
    </div>
    <div class="response-time">Your ideas help us improve</div>
   </div>

   <div class="contact-card">
    <h3>Partnerships and Collaborations</h3>
    <div class="email">
     <a href="mailto:partnerships@moveon-app.com">partnerships@moveon-app.com</a>
    </div>
    <div class="response-time">For mental health professionals and organizations</div>
   </div>
  </div>

  <div class="social-section">
   <h3>Connect With Us</h3>
   <p style="margin-bottom: 15px; color: #666;">Follow us for daily inspiration, updates, and a community of people moving forward.</p>
   <div class="social-links">
    <a href="#" class="social-link">Facebook</a>
    <a href="#" class="social-link">Instagram</a>
    <a href="#" class="social-link">Twitter/X</a>
    <a href="#" class="social-link">LinkedIn</a>
   </div>
  </div>

  <div class="developer-section">
   <h3>Developer Contact</h3>
   <p style="margin-bottom: 15px; color: #666;">MoveOn was proudly built and is maintained by a single developer. If you are a fellow developer or student and wish to connect, share ideas, or discuss the technical aspects of the project:</p>
   <div class="developer-info">
    <div class="developer-item">
     <strong>Name</strong>
     <span>John Leo B. Jariel</span>
    </div>
    <div class="developer-item">
     <strong>LinkedIn</strong>
     <a href="#">linkedin.com/in/yourprofile</a>
    </div>
    <div class="developer-item">
     <strong>GitHub</strong>
     <a href="#">github.com/yourusername</a>
    </div>
    <div class="developer-item">
     <strong>Portfolio</strong>
     <a href="#">yourportfolio.com</a>
    </div>
   </div>
  </div>

  <div class="mailing-section">
   <h3>Mailing Address</h3>
   <div class="mailing-address">
    MoveOn<br>
    [Your Street Address]<br>
    [Your City, State/Province]<br>
    [Your Zip/Postal Code]
   </div>
  </div>

  <div class="disclaimer">
   <p>Note: MoveOn is not a substitute for professional medical or psychological advice. If you are in crisis or need immediate mental health support, please reach out to a licensed professional or contact your local emergency services.</p>
  </div>
 </div>

 <?php include './includes/footer.php'; ?>
</body>

</html>