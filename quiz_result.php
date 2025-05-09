<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Get quiz result from session
$quiz_result = $_SESSION['quiz_result'] ?? null;
if (!$quiz_result) {
    echo "<div class='content-center'><h2>No quiz result found.</h2></div>";
    include('includes/footer.php');
    exit;
}

$score = $quiz_result['score'];
$article_id = $quiz_result['article_id'];
unset($_SESSION['quiz_result']); // optional cleanup

// Get article title
$lang = $_SESSION['lang'] ?? 'english';
$title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');

$stmt = $conn->prepare("SELECT $title_field AS title FROM articles WHERE id = ?");
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
$article_title = $article['title'] ?? 'Article';

// Save to quiz_history
$user_id = $_SESSION['user_id'];
$save = $conn->prepare("INSERT INTO quiz_history (user_id, article_id, score, taken_at) VALUES (?, ?, ?, NOW())");
$save->bind_param("iii", $user_id, $article_id, $score);
$save->execute();
?>

<div class="quiz-result-page">
  <div class="quiz-result-card">
    <h2>🎉 Quiz Complete</h2>
    <p>You completed the quiz on: <strong><?php echo htmlspecialchars($article_title); ?></strong></p>
    <p>Your Score: <strong><?php echo $score; ?> / 3</strong></p>
    <a href="articles.php" class="quiz-btn">← Back to Articles</a>
  </div>
</div>

<?php include('includes/footer.php'); ?>

