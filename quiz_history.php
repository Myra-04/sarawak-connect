<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$lang = $_SESSION['lang'] ?? 'english';
$title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');

$user_id = $_SESSION['user_id'];
$query = "
  SELECT a.id, a.image, a.tag, a.$title_field AS title, qh.score, qh.taken_at
  FROM quiz_history qh
  JOIN articles a ON a.id = qh.article_id
  WHERE qh.user_id = ?
  ORDER BY qh.taken_at DESC
";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="articles-page">
  <div class="articles-header">
    <h1>Quiz History</h1>
    <p>Track your quiz progress here.</p>
  </div>

  <div class="articles-list">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="article-card">
        <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
        <div class="article-content">
          <h3><?php echo htmlspecialchars($row['title']); ?></h3>
          <span class="article-tag"><?php echo htmlspecialchars($row['tag']); ?></span>
          <p><strong>Score:</strong> <?php echo $row['score']; ?>/5</p>
          <p><small>Taken on <?php echo date("d M Y, H:i", strtotime($row['taken_at'])); ?></small></p>
          <a href="article.php?id=<?php echo $row['id']; ?>">Review Article</a>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
