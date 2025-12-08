<?php
include 'class/Database.php';
include 'template/header.php';

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi']
    ];
    $db->tambah('artikel', $data);
    header('Location: index.php');
}
?>

<h2>Tambah Artikel</h2>
<form method="post">
    <label>Judul:</label><br>
    <input type="text" name="judul" required><br>
    <label>Isi:</label><br>
    <textarea name="isi" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Simpan">
</form>

<?php include 'template/footer.php'; ?>
