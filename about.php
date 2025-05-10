<?php
session_start();
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

$aboutContent = [
  'english' => [
    'title' => 'About Sarawak Connect',
    'paragraphs' => [
      "<strong>Sarawak Connect</strong> is a cultural learning platform dedicated to promoting the rich heritage, traditions, and languages of Sarawak. This site was built to help students, tourists, and locals explore the diverse ethnic groups, festivals, traditional foods, and customs found across Sarawak.",
      "With support for <strong>multiple languages</strong> and interactive features like <strong>quizzes and reading history</strong>, Sarawak Connect aims to make learning fun and accessible to all.",
      "Whether you’re here to read, learn, or test your knowledge — <strong>thank you</strong> for being part of preserving and celebrating Sarawak’s identity."
    ]
  ],
  'malay' => [
    'title' => 'Tentang Sarawak Connect',
    'paragraphs' => [
      "<strong>Sarawak Connect</strong> ialah platform pembelajaran budaya yang didedikasikan untuk mempromosikan warisan, tradisi dan bahasa yang kaya di Sarawak. Laman ini dibina untuk membantu pelajar, pelancong dan penduduk tempatan meneroka kumpulan etnik, perayaan, makanan tradisional dan adat resam yang pelbagai di seluruh Sarawak.",
      "Dengan sokongan untuk <strong>pelbagai bahasa</strong> dan ciri interaktif seperti <strong>kuiz dan sejarah bacaan</strong>, Sarawak Connect bertujuan untuk menjadikan pembelajaran menyeronokkan dan mudah diakses oleh semua.",
      "Sama ada anda di sini untuk membaca, belajar atau menguji pengetahuan — <strong>terima kasih</strong> kerana menjadi sebahagian daripada usaha memelihara dan meraikan identiti Sarawak."
    ]
  ],
  'mandarin' => [
    'title' => '关于 Sarawak Connect',
    'paragraphs' => [
      "<strong>Sarawak Connect</strong> 是一个文化学习平台，致力于推广砂拉越丰富的文化遗产、传统和语言。该网站旨在帮助学生、游客和当地人探索砂拉越多样的族群、节庆、美食与习俗。",
      "通过支持 <strong>多语言</strong> 和互动功能（如 <strong>测验和阅读记录</strong>），Sarawak Connect 致力于让学习变得有趣且更容易获取。",
      "无论您是来阅读、学习还是测试您的知识 — <strong>感谢您</strong> 成为保护和弘扬砂拉越文化的一份子。"
    ]
  ]
];

$content = $aboutContent[$lang];
?>

<div class="about-page">
  <div class="about-card">
    <img src="images/sarawak-banner.jpeg" alt="Sarawak Culture" class="about-banner">
    <h1><?php echo $content['title']; ?></h1>
    <?php foreach ($content['paragraphs'] as $para): ?>
      <p><?php echo $para; ?></p>
    <?php endforeach; ?>
  </div>
</div>

<?php include('includes/footer.php'); ?>
