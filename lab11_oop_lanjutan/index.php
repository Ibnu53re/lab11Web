<?php
include 'class/Database.php';
include 'template/header.php';

$db = new Database();
$data = $db->tampil("artikel");
?>

<h2>Daftar Artikel</h2>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Aksi</th>
    </tr>
    <?php while ($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['judul']; ?></td>
        <td><?= $row['isi']; ?></td>
        <td>
            <a href="ubah.php?id=<?= $row['id']; ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus artikel ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include 'template/footer.php'; ?>
