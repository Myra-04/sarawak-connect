<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

$title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');
$content_field = str_replace('title', 'content', $title_field);
?>

<div class="loggedin-homepage">
  <section class="hero-section">
    <div class="hero-text">
      <?php
      if ($lang === 'malay') {
          echo "<h1>Selamat datang ke <span>Sarawak Connect</span></h1>";
          echo "<p>Menghubungkan anda dengan budaya dan pendidikan Sarawak.</p>";
      } elseif ($lang === 'mandarin') {
          echo "<h1>欢迎来到 <span>Sarawak Connect</span></h1>";
          echo "<p>连接您与砂拉越的文化与教育资源。</p>";
      } else {
          echo "<h1>Welcome to <span>Sarawak Connect</span></h1>";
          echo "<p>Connecting you to Sarawak's culture and educational tools.</p>";
      }
      ?>
    </div>
  </section>

  <section class="articles-list">
    <?php
      $result = $conn->query("SELECT id, image, tag, $title_field AS title, $content_field AS content FROM articles LIMIT 3");
      while ($row = $result->fetch_assoc()):
    ?>
    <div class="article-card">
      <img src="images/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
      <div class="article-content">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <span class="article-tag"><?php echo htmlspecialchars($row['tag']); ?></span>
        <p><?php echo htmlspecialchars(substr($row['content'], 0, 100)) . '...'; ?></p>
        <a href="article.php?id=<?php echo $row['id']; ?>">Read More →</a>
      </div>
    </div>
    <?php endwhile; ?>
  </section>
</div>

<?php include('includes/footer.php'); ?>
