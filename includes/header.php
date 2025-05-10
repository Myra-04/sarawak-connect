<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$lang = $_SESSION['lang'] ?? 'english';

$navLabels = [
  'english' => [
    'home' => 'Home',
    'about' => 'About',
    'articles' => 'Articles',
    'profile' => 'Profile',
    'logout' => 'Log Out',
    'login' => 'Login'
  ],
  'malay' => [
    'home' => 'Laman Utama',
    'about' => 'Tentang',
    'articles' => 'Artikel',
    'profile' => 'Profil',
    'logout' => 'Log Keluar',
    'login' => 'Log Masuk'
  ],
  'mandarin' => [
    'home' => '主页',
    'about' => '关于',
    'articles' => '文章',
    'profile' => '个人资料',
    'logout' => '登出',
    'login' => '登录'
  ]
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
    <?php if (isset($_SESSION['user_id'])): ?>
      <li class="profile-dropdown">
        <div class="profile-toggle">👤 <?php echo htmlspecialchars($_SESSION['username']); ?> <span class="arrow">▼</span></div>
        <ul class="profile-menu">
          <li><a href="profile.php"><?php echo $nav['profile']; ?></a></li>
          <li><a href="logout.php"><?php echo $nav['logout']; ?></a></li>
        </ul>
      </li>
    <?php else: ?>
      <li class="profile-link">
        <a href="login.php">👤 <?php echo $nav['login']; ?></a>
      </li>
    <?php endif; ?>

      <li class="lang-dropdown" id="lang-dropdown">
        <div class="lang-current" id="lang-toggle">
          🌐 <?php echo ucfirst($lang); ?> ▼
        </div>
        <ul class="lang-menu" id="lang-menu">
          <li><a href="set_language.php?lang=english">English</a></li>
          <li><a href="set_language.php?lang=malay">Malay</a></li>
          <li><a href="set_language.php?lang=mandarin">Mandarin</a></li>
        </ul>
      </li>
    </ul>

    <!-- HAMBURGER (optional for mobile) -->
    <div class="menu-toggle" id="mobile-menu">☰</div>

  </div>
</nav>
