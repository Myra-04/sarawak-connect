<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

// Choose the correct fields
$title_field = "title_en";
$content_field = "content_en";
if ($lang === 'malay') {
    $title_field = "title_my";
    $content_field = "content_my";
} elseif ($lang === 'mandarin') {
    $title_field = "title_zh";
    $content_field = "content_zh";
}

// Get article ID
$article_id = $_GET['id'] ?? null;

// Validate and fetch article
if (!$article_id || !is_numeric($article_id)) {
    echo "<div class='content-center'><h2>Article not found.</h2></div>";
    include('includes/footer.php');
    exit;
}

$stmt = $conn->prepare("SELECT $title_field AS title, $content_field AS content, image, tag FROM articles WHERE id = ?");
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$article = $result->fetch_assoc()) {
    echo "<div class='content-center'><h2>Article not found.</h2></div>";
    include('includes/footer.php');
    exit;
}
?>

<div class="article-detail">
  <div class="article-image">
    <img src="images/<?php echo $article['image']; ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
  </div>
  <div class="article-content-full">
    <h1><?php echo htmlspecialchars($article['title']); ?></h1>
    <span class="article-tag"><?php echo htmlspecialchars($article['tag']); ?></span>
    <p><?php echo nl2br(htmlspecialchars($article['content'])); ?></p>
    <a href="articles.php" class="back-link">← Back to Articles</a>
  </div>
</div>

<?php include('includes/footer.php'); ?>
