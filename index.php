<?php
session_start();
$language = $_SESSION['lang'] ?? 'english';
include('includes/header.php');
?>

<div class="homepage">
  <section class="hero-section">
    <div class="hero-text">
      <?php
      if ($language === 'malay') {
          echo "<h1>Selamat datang ke <span>Sarawak Connect</span></h1>";
          echo "<p>Menghubungkan anda dengan budaya dan pendidikan Sarawak.</p>";
      } elseif ($language === 'mandarin') {
          echo "<h1>欢迎来到 <span>Sarawak Connect</span></h1>";
          echo "<p>连接您与砂拉越的文化与教育资源。</p>";
      } else {
          echo "<h1>Welcome to <span>Sarawak Connect</span></h1>";
          echo "<p>Connecting you to Sarawak's culture and educational tools.</p>";
      }
      ?>
      <div class="hero-buttons">
        <a href="login.php" class="btn"><?php echo $language === 'malay' ? 'Log Masuk' : ($language === 'mandarin' ? '登录' : 'Login'); ?></a>
        <a href="signup.php" class="btn"><?php echo $language === 'malay' ? 'Daftar' : ($language === 'mandarin' ? '注册' : 'Sign Up'); ?></a>
      </div>
    </div>
  </section>

  <section class="intro-section">
    <?php
    if ($language === 'malay') {
        echo "<h2>Apa itu Sarawak Connect?</h2>";
        echo "<p>Sarawak Connect ialah platform digital untuk meneroka artikel, kuiz dan kandungan bahasa berkaitan Sarawak.</p>";
    } elseif ($language === 'mandarin') {
        echo "<h2>什么是 Sarawak Connect？</h2>";
        echo "<p>Sarawak Connect 是一个探索文章、测验和语言学习的数字平台。</p>";
    } else {
        echo "<h2>What is Sarawak Connect?</h2>";
        echo "<p>Sarawak Connect is your digital gateway to exploring articles, quizzes, and language content about Sarawak.</p>";
    }
    ?>
  </section>
</div>

<?php include('includes/footer.php'); ?>
