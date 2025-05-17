<?php
session_start();
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$lang = $_SESSION['lang'] ?? 'english';

// Translation labels
$translations = [
  'english' => ['next' => 'Next', 'question' => 'Question', 'invalid' => 'Invalid article.', 'notfound' => 'Quiz not found for this article.'],
  'malay'   => ['next' => 'Seterusnya', 'question' => 'Soalan', 'invalid' => 'Artikel tidak sah.', 'notfound' => 'Kuiz tidak dijumpai untuk artikel ini.'],
  'mandarin'=> ['next' => '下一题', 'question' => '问题', 'invalid' => '无效的文章。', 'notfound' => '未找到此文章的测验。']
];
$t = $translations[$lang];

// Get article ID
$article_id = $_GET['article_id'] ?? $_POST['article_id'] ?? null;
if (!$article_id) {
    echo "<p class='content-center' style='color:red'>{$t['invalid']}</p>";
    include('includes/footer.php');
    exit;
}

// Define multilingual quizzes
$quizzes = [
  1 => [ // Article 1 — Traditional Food
    'en' => [
      ['question' => 'What is a traditional food of Sarawak?', 'options' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'], 'answer' => 1],
      ['question' => 'What is the main ingredient in Manok Pansoh?', 'options' => ['Beef', 'Fish', 'Chicken', 'Duck'], 'answer' => 2],
      ['question' => 'What is often used to cook Sarawak food in traditional style?', 'options' => ['Wok', 'Steamer', 'Bamboo', 'Claypot'], 'answer' => 2],
    ],
    'my' => [
      ['question' => 'Apakah makanan tradisional Sarawak?', 'options' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'], 'answer' => 1],
      ['question' => 'Apakah bahan utama dalam Manok Pansoh?', 'options' => ['Daging', 'Ikan', 'Ayam', 'Itik'], 'answer' => 2],
      ['question' => 'Apa yang sering digunakan untuk memasak makanan tradisional Sarawak?', 'options' => ['Kuali', 'Pengukus', 'Buluh', 'Periuk tanah'], 'answer' => 2],
    ],
    'zh' => [
      ['question' => '砂拉越的传统食物是什么？', 'options' => ['椰浆饭', '竹筒鸡', '冬阴功', '炒粿条'], 'answer' => 1],
      ['question' => '竹筒鸡的主要材料是什么？', 'options' => ['牛肉', '鱼肉', '鸡肉', '鸭肉'], 'answer' => 2],
      ['question' => '传统砂拉越食物通常使用什么烹饪？', 'options' => ['炒锅', '蒸锅', '竹子', '陶锅'], 'answer' => 2],
    ]
  ],

  2 => [ // Article 2 — Festivals
    'en' => [
      ['question' => 'Which festival is celebrated by the Dayak people?', 'options' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'], 'answer' => 1],
      ['question' => 'When is Gawai Dayak celebrated?', 'options' => ['1 June', '31 August', '25 December', '1 January'], 'answer' => 0],
      ['question' => 'What is one main activity during Gawai?', 'options' => ['Lion Dance', 'Ngajat Dance', 'Open House', 'Prayer Ceremony'], 'answer' => 1],
    ],
    'my' => [
      ['question' => 'Perayaan manakah disambut oleh masyarakat Dayak?', 'options' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'], 'answer' => 1],
      ['question' => 'Bilakah Gawai Dayak disambut?', 'options' => ['1 Jun', '31 Ogos', '25 Disember', '1 Januari'], 'answer' => 0],
      ['question' => 'Apakah aktiviti utama semasa Gawai?', 'options' => ['Tarian Singa', 'Tarian Ngajat', 'Rumah Terbuka', 'Upacara Doa'], 'answer' => 1],
    ],
    'zh' => [
      ['question' => '达雅族庆祝哪个节日？', 'options' => ['大宝森节', '达雅丰收节', '屠妖节', '丰收节'], 'answer' => 1],
      ['question' => '达雅丰收节是在什么时候庆祝的？', 'options' => ['6月1日', '8月31日', '12月25日', '1月1日'], 'answer' => 0],
      ['question' => '丰收节其中一个主要活动是什么？', 'options' => ['舞狮', 'Ngajat舞蹈', '开放日', '祈祷仪式'], 'answer' => 1],
    ]
  ],

  3 => [ // Article 3 — Ethnic Groups
    'en' => [
      ['question' => 'Which group is native to Sarawak?', 'options' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'], 'answer' => 2],
      ['question' => 'What language is commonly spoken by the Bidayuh?', 'options' => ['Malay', 'Bidayuh', 'Javanese', 'English'], 'answer' => 1],
      ['question' => 'The Melanau people are known for preserving fish using what method?', 'options' => ['Freezing', 'Smoking', 'Fermentation', 'Drying'], 'answer' => 2],
    ],
    'my' => [
      ['question' => 'Kumpulan manakah yang berasal dari Sarawak?', 'options' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'], 'answer' => 2],
      ['question' => 'Bahasa apakah yang sering digunakan oleh Bidayuh?', 'options' => ['Melayu', 'Bidayuh', 'Jawa', 'Inggeris'], 'answer' => 1],
      ['question' => 'Kaum Melanau terkenal dengan kaedah pengawetan ikan menggunakan apa?', 'options' => ['Penyejukan beku', 'Salai', 'Fermentasi', 'Pengeringan'], 'answer' => 2],
    ],
    'zh' => [
      ['question' => '哪一族群是砂拉越的原住民？', 'options' => ['卡达山', '米南加保', '伊班', '布吉'], 'answer' => 2],
      ['question' => '比达友人常用哪种语言？', 'options' => ['马来语', '比达友语', '爪哇语', '英语'], 'answer' => 1],
      ['question' => '马兰诺族以哪种方式保存鱼类而闻名？', 'options' => ['冷冻', '熏制', '发酵', '晒干'], 'answer' => 2],
    ]
  ]
];

$langKey = ($lang === 'malay') ? 'my' : (($lang === 'mandarin') ? 'zh' : 'en');

try {
    if (!isset($quizzes[$article_id][$langKey])) {
        throw new Exception($t['notfound']);
    }

    $quiz = $quizzes[$article_id][$langKey];

    // Quiz progression
    $current = isset($_POST['current']) ? (int)$_POST['current'] : 0;
    $score = isset($_POST['score']) ? (int)$_POST['score'] : 0;
    $selected = $_POST['choice'] ?? null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $current < count($quiz)) {
        if ($selected !== null && (int)$selected === $quiz[$current]['answer']) {
            $score++;
        }
        $current++;
    }

    // If finished
    if ($current >= count($quiz)) {
        $_SESSION['quiz_result'] = [
            'score' => $score,
            'total' => count($quiz),
            'article_id' => $article_id
        ];
        header("Location: quiz_result.php");
        exit;
    }

    $question = $quiz[$current];
} catch (Exception $e) {
    echo "<p class='content-center' style='color:red'>" . $e->getMessage() . "</p>";
    include('includes/footer.php');
    exit;
}
?>

<!-- Display quiz -->
<div class="quiz-page">
  <div class="quiz-card">
    <form method="POST" action="quiz.php">
      <h2><?php echo $t['question']; ?> <?php echo $current + 1; ?> / <?php echo count($quiz); ?></h2>
      <p class="question-text"><?php echo htmlspecialchars($question['question']); ?></p>

      <?php foreach ($question['options'] as $index => $option): ?>
        <label class="quiz-option">
          <input type="radio" name="choice" value="<?php echo $index; ?>" required>
          <?php echo htmlspecialchars($option); ?>
        </label><br>
      <?php endforeach; ?>

      <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
      <input type="hidden" name="current" value="<?php echo $current; ?>">
      <input type="hidden" name="score" value="<?php echo $score; ?>">

      <button type="submit" class="quiz-btn"><?php echo $t['next']; ?></button>
    </form>
  </div>
</div>

<?php include('includes/footer.php'); ?>