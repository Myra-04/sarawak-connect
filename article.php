<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

// Set language-specific fields
$title_field = 'title_en';
$content_field = 'content_en';
if ($lang === 'malay') {
    $title_field = 'title_my';
    $content_field = 'content_my';
} elseif ($lang === 'mandarin') {
    $title_field = 'title_zh';
    $content_field = 'content_zh';
}

// Validate article ID
$article_id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int) $_GET['id'] : null;

if (!$article_id) {
    echo "<div class='content-center'><h2>Invalid article.</h2></div>";
    include('includes/footer.php');
    exit;
}

// Fetch the article
$stmt = $conn->prepare("SELECT $title_field AS title, $content_field AS content, image, tag FROM articles WHERE id = ?");
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$article = $result->fetch_assoc()) {
    echo "<div class='content-center'><h2>Article not found.</h2></div>";
    include('includes/footer.php');
    exit;
}

// Save to reading history if logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Only insert if not already recorded
    $check = $conn->prepare("SELECT * FROM reading_history WHERE user_id = ? AND article_id = ?");
    $check->bind_param("ii", $user_id, $article_id);
    $check->execute();
    $exists = $check->get_result()->fetch_assoc();

    if (!$exists) {
        $insert = $conn->prepare("INSERT INTO reading_history (user_id, article_id) VALUES (?, ?)");
        $insert->bind_param("ii", $user_id, $article_id);
        $insert->execute();
    }
}
?>

<div class="article-detail">
  <div class="article-image">
    <img src="images/<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
  </div>
  <div class="article-content-full">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <span class="article-tag"><?php echo htmlspecialchars($article['tag']); ?></span>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
    <a href="articles.php" class="back-link">← Back to Articles</a>
  </div>
</div>

<?php if (isset($_SESSION['user_id']) && in_array($article_id, [1, 2, 3])): ?>
  <div class="quiz-cta">
    <a href="quiz.php?article_id=<?php echo $article_id; ?>" class="quiz-btn">Start Quiz →</a>
  </div>
<?php endif; ?>

<?php include('includes/footer.php'); ?>
