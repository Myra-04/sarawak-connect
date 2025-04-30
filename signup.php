<?php
session_start();
include('includes/db_connect.php');

$lang = $_SESSION['lang'] ?? 'english';

$text = [
  'english' => [
    'title' => 'Sign Up',
    'username' => 'Username',
    'email' => 'Email',
    'password' => 'Password',
    'signup' => 'Sign Up',
    'have_account' => 'Already have an account?',
    'login' => 'Login here',
    'error_exists' => 'Username already exists.',
    'success' => 'Signup successful! You can now login.'
  ],
  'malay' => [
    'title' => 'Daftar',
    'username' => 'Nama Pengguna',
    'email' => 'Emel',
    'password' => 'Kata Laluan',
    'signup' => 'Daftar',
    'have_account' => 'Sudah ada akaun?',
    'login' => 'Log masuk di sini',
    'error_exists' => 'Nama pengguna sudah wujud.',
    'success' => 'Pendaftaran berjaya! Anda boleh log masuk sekarang.'
  ],
  'mandarin' => [
    'title' => '注册',
    'username' => '用户名',
    'email' => '电子邮件',
    'password' => '密码',
    'signup' => '注册',
    'have_account' => '已有账户？',
    'login' => '点此登录',
    'error_exists' => '用户名已存在。',
    'success' => '注册成功！现在可以登录了。'
  ]
];

$t = $text[$lang];

// Handle signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $check_query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        $error = $t['error_exists'];
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("sss", $username, $email, $hashed_password);
        if ($stmt->execute()) {
            $success = $t['success'];
        } else {
            $error = "Error creating account. Try again.";
        }
    }
}
?>

<?php include('includes/header.php'); ?>

<div class="content-center">
  <div class="form-container">
    <h1><?php echo $t['title']; ?></h1>

    <?php if (!empty($error)) echo "<p class='error-message'>$error</p>"; ?>
    <?php if (!empty($success)) echo "<p class='success-message'>$success</p>"; ?>

    <form method="POST" action="">
      <input type="text" name="username" placeholder="<?php echo $t['username']; ?>" required><br><br>
      <input type="email" name="email" placeholder="<?php echo $t['email']; ?>" required><br><br>
      <input type="password" name="password" placeholder="<?php echo $t['password']; ?>" required><br><br>
      <button type="submit"><?php echo $t['signup']; ?></button>
    </form>

    <p><?php echo $t['have_account']; ?> <a href="login.php"><?php echo $t['login']; ?></a></p>
  </div>
</div>

<?php include('includes/footer.php'); ?>

