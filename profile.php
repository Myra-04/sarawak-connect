<?php
session_start();
include('includes/db_connect.php');
include('includes/header.php');

$lang = $_SESSION['lang'] ?? 'english';

$profileLabels = [
  'english' => [
    'welcome' => 'Welcome',
    'manage' => 'You can manage your reading preferences and see your history below.',
    'reading_history' => '📖 Full Reading History',
    'quiz_history' => '🧠 Full Quiz History',
    'recent_articles' => 'Recently Read Articles:',
    'recent_quiz' => 'Recent Quiz History:',
    'score' => 'Score',
    'review' => 'Review',
    'login_prompt_title' => 'Please Log In',
    'login_prompt_text' => 'You need to log in to access your profile and reading history.',
    'login_btn' => '🔐 Log In'
  ],
  'malay' => [
    'welcome' => 'Selamat datang',
    'manage' => 'Anda boleh mengurus pilihan pembacaan anda dan melihat sejarah anda di bawah.',
    'reading_history' => '📖 Sejarah Bacaan Penuh',
    'quiz_history' => '🧠 Sejarah Kuiz Penuh',
    'recent_articles' => 'Artikel Yang Baru Dibaca:',
    'recent_quiz' => 'Sejarah Kuiz Terkini:',
    'score' => 'Skor',
    'review' => 'Semak Semula',
    'login_prompt_title' => 'Sila Log Masuk',
    'login_prompt_text' => 'Anda perlu log masuk untuk mengakses profil dan sejarah bacaan anda.',
    'login_btn' => '🔐 Log Masuk'
  ],
  'mandarin' => [
    'welcome' => '欢迎',
    'manage' => '您可以在此处管理阅读偏好并查看历史记录。',
    'reading_history' => '📖 全部阅读记录',
    'quiz_history' => '🧠 全部测验记录',
    'recent_articles' => '最近阅读的文章：',
    'recent_quiz' => '最近的测验记录：',
    'score' => '得分',
    'review' => '查看',
    'login_prompt_title' => '请登录',
    'login_prompt_text' => '您需要登录才能访问您的个人资料和阅读历史。',
    'login_btn' => '🔐 登录'
  ]
];

$t = $profileLabels[$lang];
?>

<div class="profile-page">
  <?php if (isset($_SESSION['user_id'])): ?>
    <div class="profile-card">
      <h2><?php echo $t['welcome']; ?>, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
      <p><?php echo $t['manage']; ?></p>
      <a href="reading_history.php" class="profile-btn"><?php echo $t['reading_history']; ?></a>
      <a href="quiz_history.php" class="profile-btn"><?php echo $t['quiz_history']; ?></a>

      <!-- Recently Read Articles -->
      <h3 style="margin-top: 30px;"><?php echo $t['recent_articles']; ?></h3>
      <?php
        $user_id = $_SESSION['user_id'];
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

      <!-- Recent Quiz History -->
      <h3 style="margin-top: 30px;"><?php echo $t['recent_quiz']; ?></h3>
      <?php
        $quizQuery = "
          SELECT q.article_id, q.score, q.taken_at, a.$title_field AS title
          FROM quiz_history q
          JOIN articles a ON a.id = q.article_id
          WHERE q.user_id = ?
          ORDER BY q.taken_at DESC
          LIMIT 5
        ";
        $quizStmt = $conn->prepare($quizQuery);
        $quizStmt->bind_param("i", $user_id);
        $quizStmt->execute();
        $quizResult = $quizStmt->get_result();
      ?>

      <ul class="profile-history">
        <?php while ($quiz = $quizResult->fetch_assoc()): ?>
          <li>
            <strong><?php echo htmlspecialchars($quiz['title']); ?></strong> — 
            <?php echo $t['score']; ?>: <?php echo $quiz['score']; ?>/5 
            (<?php echo date("d M Y, H:i", strtotime($quiz['taken_at'])); ?>)
            <a href="article.php?id=<?php echo $quiz['article_id']; ?>">🔁 <?php echo $t['review']; ?></a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  <?php else: ?>
    <div class="login-prompt-card">
      <h2><?php echo $t['login_prompt_title']; ?></h2>
      <p><?php echo $t['login_prompt_text']; ?></p>
      <a href="login.php" class="profile-btn"><?php echo $t['login_btn']; ?></a>
    </div>
  <?php endif; ?>
</div>

<?php include('includes/footer.php'); ?>
