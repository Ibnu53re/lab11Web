<?php
include 'class/Database.php';
include 'template/header.php';

$db = new Database();
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'judul' => $_POST['judul'],
        'isi' => $_POST['isi']
    ];
    $db->ubah('artikel', $data, "WHERE id=$id");
    header('Location: index.php');
}

$result = $db->tampil("artikel WHERE id=$id");
$artikel = $result->fetch_assoc();
?>

<h2>Edit Artikel</h2>
<form method="post">
    <label>Judul:</label><br>
    <input type="text" name="judul" value="<?= $artikel['judul']; ?>" required><br>
    <label>Isi:</label><br>
    <textarea name="isi" rows="5" cols="40" required><?= $artikel['isi']; ?></textarea><br><br>
    <input type="submit" value="Simpan Perubahan">
</form>

<?php include 'template/footer.php'; ?>
