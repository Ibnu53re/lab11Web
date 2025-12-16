<?php
session_start();
include "../../config.php";
include "../../class/Database.php";

if (isset($_SESSION['is_login'])) {
    header("Location: ../home/index");
    exit;
}

$message = "";

if ($_POST) {
    $db = new Database();
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = $db->query($sql);
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama'] = $user['nama'];

        header("Location: ../artikel/index");
        exit;
    } else {
        $message = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container col-md-4 mt-5">
<h3 class="text-center">Login User</h3>

<?php if ($message): ?>
<div class="alert alert-danger"><?= $message ?></div>
<?php endif; ?>

<form method="post">
<input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
<input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
<button class="btn btn-primary w-100">Login</button>
</form>
</div>
</body>
</html>
