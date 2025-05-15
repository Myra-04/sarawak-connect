<?php 
session_start();
include('includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}  

$lang = $_SESSION['lang'] ?? 'english';

$quizzes = [
  1 => [
    [
      'question' => [
        'english' => 'What is a traditional food of Sarawak?',
        'malay' => 'Apakah makanan tradisional Sarawak?',
        'mandarin' => '砂拉越的传统食物是什么？'
      ],
      'options' => [
        'english' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'],
        'malay' => ['Nasi Lemak', 'Manok Pansoh', 'Tom Yum', 'Char Kway Teow'],
        'mandarin' => ['椰浆饭', '竹筒鸡', '冬阴功', '炒粿条']
      ],
      'answer' => 1
    ],
    [
      'question' => [
        'english' => 'What is the main ingredient in Manok Pansoh?',
        'malay' => 'Apakah bahan utama dalam Manok Pansoh?',
        'mandarin' => '竹筒鸡的主要食材是什么？'
      ],
      'options' => [
        'english' => ['Beef', 'Fish', 'Chicken', 'Duck'],
        'malay' => ['Daging Lembu', 'Ikan', 'Ayam', 'Itik'],
        'mandarin' => ['牛肉', '鱼', '鸡肉', '鸭肉']
      ],
      'answer' => 2
    ],
    [
      'question' => [
        'english' => 'What is often used to cook Sarawak food in traditional style?',
        'malay' => 'Apakah yang sering digunakan untuk memasak makanan Sarawak secara tradisional?',
        'mandarin' => '传统砂拉越食物常用什么方式烹饪？'
      ],
      'options' => [
        'english' => ['Wok', 'Steamer', 'Bamboo', 'Claypot'],
        'malay' => ['Kuali', 'Pengukus', 'Buluh', 'Periuk tanah'],
        'mandarin' => ['炒锅', '蒸锅', '竹子', '砂锅']
      ],
      'answer' => 2
    ]
  ],
  2 => [
    [
      'question' => [
        'english' => 'Which festival is celebrated by the Dayak people?',
        'malay' => 'Perayaan manakah yang disambut oleh kaum Dayak?',
        'mandarin' => '达雅族人庆祝哪个节日？'
      ],
      'options' => [
        'english' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'],
        'malay' => ['Thaipusam', 'Gawai Dayak', 'Deepavali', 'Kaamatan'],
        'mandarin' => ['大宝森节', '达雅丰收节', '屠妖节', '丰收节']
      ],
      'answer' => 1
    ],
    [
      'question' => [
        'english' => 'When is Gawai Dayak celebrated?',
        'malay' => 'Bilakah Gawai Dayak disambut?',
        'mandarin' => '达雅丰收节何时庆祝？'
      ],
      'options' => [
        'english' => ['1 June', '31 August', '25 December', '1 January'],
        'malay' => ['1 Jun', '31 Ogos', '25 Disember', '1 Januari'],
        'mandarin' => ['6月1日', '8月31日', '12月25日', '1月1日']
      ],
      'answer' => 0
    ],
    [
      'question' => [
        'english' => 'What is one main activity during Gawai?',
        'malay' => 'Apakah aktiviti utama semasa Gawai?',
        'mandarin' => '达雅丰收节的主要活动之一是？'
      ],
      'options' => [
        'english' => ['Lion Dance', 'Ngajat Dance', 'Open House', 'Prayer Ceremony'],
        'malay' => ['Tarian Singa', 'Tarian Ngajat', 'Rumah Terbuka', 'Upacara Doa'],
        'mandarin' => ['舞狮', 'Ngajat舞', '开放日', '祈祷仪式']
      ],
      'answer' => 1
    ]
    ],
  3 => [
    [
    'question_en' => 'Which group is native to Sarawak?',
    'question_my' => 'Kumpulan manakah yang berasal dari Sarawak?',
    'question_zh' => '哪个族群是砂拉越的原住民？',
    'options_en' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'],
    'options_my' => ['Kadazan', 'Minangkabau', 'Iban', 'Bugis'],
    'options_zh' => ['卡达山人', '米南佳保人', '伊班人', '布吉人'],
    'answer' => 2
  ],
  [
    'question_en' => 'What language is commonly spoken by the Bidayuh?',
    'question_my' => 'Bahasa apa yang biasa digunakan oleh Bidayuh?',
    'question_zh' => '比达友人常用的语言是什么？',
    'options_en' => ['Malay', 'Bidayuh', 'Javanese', 'English'],
    'options_my' => ['Melayu', 'Bidayuh', 'Jawa', 'Inggeris'],
    'options_zh' => ['马来语', '比达友语', '爪哇语', '英语'],
    'answer' => 1
  ],
  [
    'question_en' => 'The Melanau people are known for preserving fish using what method?',
    'question_my' => 'Kaum Melanau dikenali dengan kaedah apa untuk mengawet ikan?',
    'question_zh' => '马兰瑙族人以哪种方式保存鱼类而闻名？',
    'options_en' => ['Freezing', 'Smoking', 'Fermentation', 'Drying'],
    'options_my' => ['Membeku', 'Salai', 'Penapaian', 'Pengeringan'],
    'options_zh' => ['冷冻', '熏制', '发酵', '晾干'],
    'answer' => 2
  ]
  ]
];

$article_id = $_GET['article_id'] ?? $_POST['article_id'] ?? null;

try {
    if (!$article_id || !isset($quizzes[$article_id])) {
        throw new Exception("Quiz not found for this article.");
    }

    $quiz = $quizzes[$article_id];

    $current = $_POST['current'] ?? 0;
    $score = $_POST['score'] ?? 0;
    $selected = $_POST['choice'] ?? null;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($selected !== null && $selected == $quiz[$current]['answer']) {
            $score++;
        }
        $current++;

        if ($current >= count($quiz)) {
            $_SESSION['quiz_result'] = ['score' => $score, 'total' => count($quiz), 'article_id' => $article_id];
            header("Location: quiz_result.php");
            exit;
        }
    }
} catch (Exception $e) {
    echo "<p style='color:red; text-align:center;'>" . htmlspecialchars($e->getMessage()) . "</p>";
    include('includes/footer.php');
    exit;
}
?>

<div class="quiz-page">
  <div class="quiz-card">
    <form method="POST" action="quiz.php">
      <h2>Question <?php echo $current + 1; ?> of <?php echo count($quiz); ?></h2>
      <p class="question-text"><?php echo $quiz[$current]['question'][$lang]; ?></p>

      <?php foreach ($quiz[$current]['options'][$lang] as $index => $option): ?>
        <label class="quiz-option">
          <input type="radio" name="choice" value="<?php echo $index; ?>" required>
          <?php echo htmlspecialchars($option); ?>
        </label><br>
      <?php endforeach; ?>

      <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
      <input type="hidden" name="current" value="<?php echo $current; ?>">
      <input type="hidden" name="score" value="<?php echo $score; ?>">

      <button type="submit" class="quiz-btn">Next</button>
    </form>
  </div>
</div>

<?php include('includes/footer.php'); ?>