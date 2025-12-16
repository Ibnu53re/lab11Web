<?php
session_start();
include "../../config.php";
include "../../class/Database.php";

if (!isset($_SESSION['is_login'])) {
    header("Location: ../user/login");
    exit;
}

$db = new Database();
$message = "";

if ($_POST) {
    $password_baru = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $username = $_SESSION['username'];

    $sql = "UPDATE users SET password='$password_baru' WHERE username='$username'";
    $db->query($sql);

    $message = "Password berhasil diubah";
}
?>

<div class="container mt-4 col-md-6">
<h3>Profil User</h3>

<?php if ($message): ?>
<div class="alert alert-success"><?= $message ?></div>
<?php endif; ?>

<table class="table">
<tr>
<th>Nama</th>
<td><?= $_SESSION['nama'] ?></td>
</tr>
<tr>
<th>Username</th>
<td><?= $_SESSION['username'] ?></td>
</tr>
</table>

<h4>Ganti Password</h4>
<form method="post">
<input type="password" name="password" class="form-control mb-2" placeholder="Password Baru" required>
<button class="btn btn-primary">Simpan</button>
</form>
</div>
