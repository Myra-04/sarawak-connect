<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

// Language-based fields
$title_field = "title_en";
$content_field = "content_en";
if ($lang === 'malay') {
    $title_field = "title_my";
    $content_field = "content_my";
} elseif ($lang === 'mandarin') {
    $title_field = "title_zh";
    $content_field = "content_zh";
}

// UI labels
$text = [
    'english' => ['title' => 'Articles', 'subtitle' => "Learn more about Sarawak’s culture and heritage.", 'read' => 'Read More'],
    'malay' => ['title' => 'Artikel', 'subtitle' => "Ketahui lebih lanjut tentang budaya dan warisan Sarawak.", 'read' => 'Baca Lagi'],
    'mandarin' => ['title' => '文章', 'subtitle' => "深入了解砂拉越的文化与遗产。", 'read' => '阅读更多']
];
$t = $text[$lang];

// Fetch articles
$query = "SELECT id, image, tag, $title_field AS title, $content_field AS content FROM articles";
$result = $conn->query($query);
?>

<div class="articles-page">
  <div class="articles-header">
    <h1><?php echo $t['title']; ?></h1>
    <p><?php echo $t['subtitle']; ?></p>
  </div>

  <div class="articles-list">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="article-card">
        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
        <div class="article-content">
          <h3><?php echo htmlspecialchars($row['title']); ?></h3>
          <span class="article-tag"><?php echo htmlspecialchars($row['tag']); ?></span>
          <p><?php echo htmlspecialchars(substr($row['content'], 0, 100)) . '...'; ?></p>
          <a href="article.php?id=<?php echo $row['id']; ?>"><?php echo $t['read']; ?></a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
