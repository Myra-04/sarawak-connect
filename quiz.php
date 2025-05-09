<?php 
session_start();
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}  

$article_id = $_GET['article_id'] ?? $_POST['article_id'] ?? null;
if (!$article_id) {
    echo "<p class='content-center'>Invalid article.</p>";
    include('includes/footer.php');
    exit;
}

// Example quiz per article_id (replace with DB-driven logic later)
$quizzes = [
  1 => [ 
    ['question' => 'What is a traditional food of Sarawak?', 'options' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'], 'answer' => 1],
    ['question' => 'What is the main ingredient in Manok Pansoh?', 'options' => ['Beef', 'Fish', 'Chicken', 'Duck'], 'answer' => 2],
    ['question' => 'What is often used to cook Sarawak food in traditional style?', 'options' => ['Wok', 'Steamer', 'Bamboo', 'Claypot'], 'answer' => 2],
  ],
  2 => [ 
    ['question' => 'Which festival is celebrated by the Dayak people?', 'options' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'], 'answer' => 1],
    ['question' => 'When is Gawai Dayak celebrated?', 'options' => ['1 June', '31 August', '25 December', '1 January'], 'answer' => 0],
    ['question' => 'What is one main activity during Gawai?', 'options' => ['Lion Dance', 'Ngajat Dance', 'Open House', 'Prayer Ceremony'], 'answer' => 1],
  ],
  3 => [ 
    ['question' => 'Which group is native to Sarawak?', 'options' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'], 'answer' => 2],
    ['question' => 'What language is commonly spoken by the Bidayuh?', 'options' => ['Malay', 'Bidayuh', 'Javanese', 'English'], 'answer' => 1],
    ['question' => 'The Melanau people are known for preserving fish using what method?', 'options' => ['Freezing', 'Smoking', 'Fermentation', 'Drying'], 'answer' => 2],
  ]
];

$quiz = $quizzes[$article_id] ?? [];
if (empty($quiz)) {
  echo "<p style='text-align: center; color: red;'>Quiz not found for this article. Please go back.</p>";
  include('includes/footer.php');
  exit;
}

// Quiz state tracking
$current = isset($_POST['current']) ? (int)$_POST['current'] : 0;
$score = isset($_POST['score']) ? (int)$_POST['score'] : 0;
$selected = $_POST['choice'] ?? null;

// Check and update score
if ($_SERVER["REQUEST_METHOD"] === "POST" && $current < count($quiz)) {
  if ($selected !== null && (int)$selected === $quiz[$current]['answer']) {
    $score++;
  }
  $current++;
}

// If quiz complete, redirect to results
if ($current >= count($quiz)) {
  $_SESSION['quiz_result'] = [
    'score' => $score,
    'total' => count($quiz),
    'article_id' => $article_id
  ];
  header("Location: quiz_result.php");
  exit;
}
?>

<div class="quiz-page">
  <div class="quiz-card">
    <form method="POST" action="quiz.php">
      <h2>Question <?php echo $current + 1; ?> of <?php echo count($quiz); ?></h2>
      <p class="question-text"><?php echo htmlspecialchars($quiz[$current]['question']); ?></p>

      <?php foreach ($quiz[$current]['options'] as $index => $option): ?>
        <label class="quiz-option">
          <input type="radio" name="choice" value="<?php echo $index; ?>" required>
          <?php echo htmlspecialchars($option); ?>
        </label><br>
      <?php endforeach; ?>

      <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
      <input type="hidden" name="current" value="<?php echo $current; ?>">
      <input type="hidden" name="score" value="<?php echo $score; ?>">

      <button type="submit" class="quiz-btn">Next</button>
    </form>
  </div>
</div>

<?php include('includes/footer.php'); ?>
