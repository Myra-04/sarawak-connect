<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');
require_once('classes/student.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fallback if no quiz result
$quiz_result = $_SESSION['quiz_result'] ?? null;
if (!$quiz_result) {
    echo "<div class='content-center'><h2>No quiz result found.</h2></div>";
    include('includes/footer.php');
    exit;
}

// Extract result
$score = $quiz_result['score'];
$article_id = $quiz_result['article_id'];
unset($_SESSION['quiz_result']); // clean up

$lang = $_SESSION['lang'] ?? 'english';
$title_field = $lang === 'malay' ? 'title_my' : ($lang === 'mandarin' ? 'title_zh' : 'title_en');

// Translation Labels
$translations = [
    'english' => [
        'complete' => '🎉 Quiz Complete',
        'completed_on' => 'You completed the quiz on:',
        'score' => 'Your Score:',
        'back' => '← Back to Articles'
    ],
    'malay' => [
        'complete' => '🎉 Kuiz Selesai',
        'completed_on' => 'Anda telah menyelesaikan kuiz mengenai:',
        'score' => 'Skor Anda:',
        'back' => '← Kembali ke Artikel'
    ],
    'mandarin' => [
        'complete' => '🎉 测验完成',
        'completed_on' => '您已完成有关以下内容的测验：',
        'score' => '您的得分：',
        'back' => '← 返回文章'
    ]
];

// Define QuizResult class
class QuizResult {
    public $user_id;
    public $article_id;
    public $score;
    public $language;
    public $labels;
    public $conn;

    public function __construct($user_id, $article_id, $score, $language, $labels, $conn) {
        $this->user_id = $user_id;
        $this->article_id = $article_id;
        $this->score = $score;
        $this->language = $language;
        $this->labels = $labels;
        $this->conn = $conn;
    }

    public function getArticleTitle() {
        $field = $this->language === 'malay' ? 'title_my' : ($this->language === 'mandarin' ? 'title_zh' : 'title_en');
        $stmt = $this->conn->prepare("SELECT $field AS title FROM articles WHERE id = ?");
        $stmt->bind_param("i", $this->article_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $article = $result->fetch_assoc();
        return $article['title'] ?? 'Article';
    }

    public function saveToHistory() {
        $stmt = $this->conn->prepare("INSERT INTO quiz_history (user_id, article_id, score, taken_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iii", $this->user_id, $this->article_id, $this->score);
        $stmt->execute();
    }
}

// Create student object
$student = new Student($_SESSION['username']); // Uses base User behavior now
$quiz = new QuizResult($_SESSION['user_id'], $article_id, $score, $lang, $translations[$lang], $conn);

$article_title = $quiz->getArticleTitle();
$quiz->saveToHistory();
?>

<!-- Output -->
<div class="quiz-result-page">
  <div class="quiz-result-card">
    <h2><?php echo $quiz->labels['complete']; ?></h2>
    <p><?php echo $student->getGreeting(); ?></p>
    <p><?php echo $quiz->labels['completed_on']; ?> <strong><?php echo htmlspecialchars($article_title); ?></strong></p>
    <p><?php echo $quiz->labels['score']; ?> <strong><?php echo $score; ?> / 3</strong></p>
    <a href="articles.php" class="quiz-btn"><?php echo $quiz->labels['back']; ?></a>
  </div>
</div>

<?php include('includes/footer.php'); ?>