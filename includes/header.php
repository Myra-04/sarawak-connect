<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = $_SESSION['lang'] ?? 'english';

$navLabels = [
  'english' => ['home' => 'Home', 'about' => 'About', 'articles' => 'Articles', 'profile' => 'Profile'],
  'malay' => ['home' => 'Laman Utama', 'about' => 'Tentang', 'articles' => 'Artikel', 'profile' => 'Profil'],
  'mandarin' => ['home' => '主页', 'about' => '关于', 'articles' => '文章', 'profile' => '个人资料']
];
$nav = $navLabels[$lang];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sarawak Connect</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
  <div class="nav-container">

    <!-- LEFT: Logo -->
    <div class="logo">
      <a href="index.php">
        <span class="sarawak-text">Sarawak</span><span class="connect-text">Connect</span>
      </a>
    </div>

    <!-- CENTER: Navigation Links -->
    <div class="nav-center">
      <ul class="nav-links" id="nav-links">
        <li><a href="index.php"><?php echo $nav['home']; ?></a></li>
        <li><a href="articles.php"><?php echo $nav['articles']; ?></a></li>
        <li><a href="about.php"><?php echo $nav['about']; ?></a></li>
      </ul>
    </div>

    <!-- RIGHT: Profile and Language -->
    <ul class="nav-right">
      <li class="profile-link">
        <a href="profile.php">
          <span class="icon">👤</span><?php echo $nav['profile']; ?>
        </a>
      </li>
      <li class="lang-dropdown" id="lang-dropdown">
        <div class="lang-current" id="lang-toggle">
          🌐 <?php echo ucfirst($lang); ?> ▼
        </div>
        <ul class="lang-menu" id="lang-menu">
          <li><a href="set_language.php?lang=english">English</a></li>
          <li><a href="set_language.php?lang=malay">Malay</a></li>
          <li><a href="set_language.php?lang=mandarin">Mandarin (官話)</a></li>
        </ul>
      </li>
    </ul>

    <!-- HAMBURGER (optional for mobile) -->
    <div class="menu-toggle" id="mobile-menu">☰</div>

  </div>
</nav>
