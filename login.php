<?php
session_start();
include('includes/db_connect.php');

session_start();
if (isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}

$lang = $_SESSION['lang'] ?? 'english';


$text = [
  'english' => [
    'title' => 'Login',
    'username' => 'Username',
    'password' => 'Password',
    'login' => 'Login',
    'no_account' => "Don't have an account?",
    'signup' => 'Sign up here',
    'error_user' => 'Username not found.',
    'error_pass' => 'Incorrect password.'
  ],
  'malay' => [
    'title' => 'Log Masuk',
    'username' => 'Nama Pengguna',
    'password' => 'Kata Laluan',
    'login' => 'Log Masuk',
    'no_account' => "Belum ada akaun?",
    'signup' => 'Daftar di sini',
    'error_user' => 'Nama pengguna tidak dijumpai.',
    'error_pass' => 'Kata laluan salah.'
  ],
  'mandarin' => [
    'title' => '登录',
    'username' => '用户名',
    'password' => '密码',
    'login' => '登录',
    'no_account' => "还没有账户？",
    'signup' => '点击注册',
    'error_user' => '找不到用户名。',
    'error_pass' => '密码错误。'
  ]
];

$t = $text[$lang];

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: profile.php");
            exit;
        } else {
            $error = $t['error_pass'];
        }
    } else {
        $error = $t['error_user'];
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="content-center">
  <div class="form-container">
    <h1><?php echo $t['title']; ?></h1>

    <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>

    <form method="POST" action="">
      <input type="text" name="username" placeholder="<?php echo $t['username']; ?>" required><br><br>
      <input type="password" name="password" placeholder="<?php echo $t['password']; ?>" required><br><br>
      <button type="submit"><?php echo $t['login']; ?></button>
    </form>

    <p><?php echo $t['no_account']; ?> <a href="signup.php"><?php echo $t['signup']; ?></a></p>
  </div>
</div>

<?php include('includes/footer.php'); ?>
