<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

if (!isset($_SESSION['user_id'])) {
    echo "<div class='content-center'><h2>Please log in to view your reading history.</h2></div>";
    include('includes/footer.php');
    exit;
}

$lang = $_SESSION['lang'] ?? 'english';
$title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');

$user_id = $_SESSION['user_id'];
$query = "
  SELECT a.id, a.image, a.tag, a.$title_field AS title, rh.viewed_at
  FROM reading_history rh
  JOIN articles a ON a.id = rh.article_id
  WHERE rh.user_id = ?
  ORDER BY rh.viewed_at DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="articles-page">
  <div class="articles-header">
    <h1>Reading History</h1>
    <p>Your recently read articles.</p>
  </div>

  <div class="articles-list">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="article-card">
        <img src="images/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
        <div class="article-content">
          <h3><?php echo htmlspecialchars($row['title']); ?></h3>
          <span class="article-tag"><?php echo htmlspecialchars($row['tag']); ?></span>
          <p><small>Viewed on <?php echo date("d M Y, H:i", strtotime($row['viewed_at'])); ?></small></p>
          <a href="article.php?id=<?php echo $row['id']; ?>">Read Again</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
