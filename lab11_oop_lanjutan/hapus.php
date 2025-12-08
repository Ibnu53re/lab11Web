<?php
include 'class/Database.php';
$db = new Database();
$id = $_GET['id'];
$db->hapus('artikel', "WHERE id=$id");
header('Location: index.php');
?>
