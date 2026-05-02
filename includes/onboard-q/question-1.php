<?php 

 require_once './includes/db-connect.php';

 $current_q_id = isset($_GET['q']) ? (int)$_GET['q'] : 1;

 $stmt = $pdo->prepare("SELECT question_text FROM onboarding_questions WHERE id = ?");
 $stmt->execute([$current_q_id]);
 $question = $stmt->fetch(PDO::FETCH_ASSOC);

 $stmt = $pdo->prepare("SELECT id, option_text FROM onboarding_options WHERE question_id = ? ORDER BY display_order");
 $stmt->execute([$current_q_id]);
 $options = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="header-q">
 <h1 class="header-1">Hi! You are exactly where you are. It's not a mistake.</h1>
 <h2 class="header-2"><?= htmlspecialchars($question['question_text']) ?></h2>
</div>

<div id="options-container">
 <?php foreach($options as $index => $option): ?>
  <label for="question-<?= $option['id'] ?>"><?= htmlspecialchars($option['option_text']) ?><input type="radio" id="question-<?= $option['id'] ?>" name="q<?= $current_q_id ?>" value="<?= $option['id'] ?>" <?= $index === 0 ? 'checked' : '' ?> required/></label>
 <?php endforeach; ?>

 <div id="buttons-q-nav">
  <button class="previous-btn">&#8592; Back</button>
  <button class="skip-btn">Skip</button>
  <button type="submit" class="next-btn">Next &#8594;</button>
 </div>
</div>


