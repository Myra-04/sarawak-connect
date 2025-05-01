<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');
?>

<div class="profile-page">
  <?php if (isset($_SESSION['user_id'])): ?>
    <div class="profile-card">
      <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
      <p>You can manage your reading preferences and see your history below.</p>
      <a href="reading_history.php" class="profile-btn">📖 Full Reading History</a>

      <h3 style="margin-top: 30px;">Recently Read Articles:</h3>
      <?php
        $user_id = $_SESSION['user_id'];
        $lang = $_SESSION['lang'] ?? 'english';
        $title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');

        $query = "
          SELECT a.id, a.image, a.tag, a.$title_field AS title
          FROM reading_history rh
          JOIN articles a ON a.id = rh.article_id
          WHERE rh.user_id = ?
          ORDER BY rh.viewed_at DESC
          LIMIT 5
        ";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
      ?>

      <ul class="profile-history">
        <?php while ($row = $result->fetch_assoc()): ?>
          <li>
            <a href="article.php?id=<?php echo $row['id']; ?>">
              <?php echo htmlspecialchars($row['title']); ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php else: ?>
    <div class="login-prompt-card">
      <h2>Please Log In</h2>
      <p>You need to log in to access your profile and reading history.</p>
      <a href="login.php" class="profile-btn">🔐 Log In</a>
    </div>
  <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>

