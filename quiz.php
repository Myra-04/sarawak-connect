<?php
session_start();
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
  }  
  
// Sample quiz questions
$quiz = [
  [
    'question' => 'What is a traditional food of Sarawak?',
    'options' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'],
    'answer' => 1
  ],
  [
    'question' => 'What festival is celebrated by the Dayak people?',
    'options' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'],
    'answer' => 1
  ],
  [
    'question' => 'Which group is native to Sarawak?',
    'options' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'],
    'answer' => 2
  ]
];

$current = $_POST['current'] ?? 0;
$score = $_POST['score'] ?? 0;
$selected = $_POST['choice'] ?? null;

// Check answer and move forward
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if ($selected !== null && $selected == $quiz[$current]['answer']) {
    $score++;
  }
  $current++;
}

// Quiz complete
$is_complete = $current >= count($quiz);
?>

<div class="quiz-page">
  <div class="quiz-card">
    <?php if ($is_complete): ?>
      <h2>Quiz Complete 🎉</h2>
      <p>You scored <strong><?php echo $score; ?></strong> out of <strong><?php echo count($quiz); ?></strong>.</p>
      <a href="quiz.php" class="quiz-btn">Try Again</a>
    <?php else: ?>
      <form method="POST" action="quiz.php">
        <h2>Question <?php echo $current + 1; ?> of <?php echo count($quiz); ?></h2>
        <p class="question-text"><?php echo $quiz[$current]['question']; ?></p>

        <?php foreach ($quiz[$current]['options'] as $index => $option): ?>
          <label class="quiz-option">
            <input type="radio" name="choice" value="<?php echo $index; ?>" required>
            <?php echo htmlspecialchars($option); ?>
          </label><br>
        <?php endforeach; ?>

        <input type="hidden" name="current" value="<?php echo $current; ?>">
        <input type="hidden" name="score" value="<?php echo $score; ?>">

        <button type="submit" class="quiz-btn">Next</button>
      </form>
    <?php endif; ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
