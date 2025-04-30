<?php
$footerLabels = [
  'english' => [
    'about' => 'About Sarawak Connect',
    'desc' => 'Explore the culture, language, and resources of Sarawak through articles and interactive learning tools.',
    'quick' => 'Quick Links',
    'contact' => 'Contact',
    'rights' => 'All rights reserved.'
  ],
  'malay' => [
    'about' => 'Tentang Sarawak Connect',
    'desc' => 'Terokai budaya, bahasa dan sumber Sarawak melalui artikel dan alat pembelajaran interaktif.',
    'quick' => 'Pautan Pantas',
    'contact' => 'Hubungi',
    'rights' => 'Semua hak cipta terpelihara.'
  ],
  'mandarin' => [
    'about' => '关于 Sarawak Connect',
    'desc' => '通过文章和互动学习工具探索砂拉越的文化、语言和资源。',
    'quick' => '快速链接',
    'contact' => '联系方式',
    'rights' => '版权所有。'
  ]
];
$footer = $footerLabels[$_SESSION['lang'] ?? 'english'];
?>

<footer class="main-footer">
  <div class="footer-container">
    <div class="footer-section">
      <h4><?php echo $footer['about']; ?></h4>
      <p><?php echo $footer['desc']; ?></p>
    </div>

    <div class="footer-section">
      <h4><?php echo $footer['quick']; ?></h4>
      <ul>
        <li><a href="index.php"><?php echo $nav['home']; ?></a></li>
        <li><a href="articles.php"><?php echo $nav['articles']; ?></a></li>
        <li><a href="quiz.php">Quiz</a></li>
        <li><a href="profile.php"><?php echo $nav['profile']; ?></a></li>
      </ul>
    </div>

    <div class="footer-section">
      <h4><?php echo $footer['contact']; ?></h4>
      <p>Email: info@sarawakconnect.com<br>Phone: +60 12-345 6789</p>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy; 2025 Sarawak Connect. <?php echo $footer['rights']; ?></p>
  </div>

  <script src="js/script.js"></script>
</footer>
</body>
</html>