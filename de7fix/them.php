<?php
require_once 'connect.php';

var_dump($_POST);
$chuyenmuc_id = $_POST['chuyenmuc_id'];
$tacgia_id = $_POST['tacgia_id'];
$tieude = $_POST['tieude'];
$motangan = $_POST['motangan'];
$noidung = $_POST['noidung'];

$sql = "INSERT INTO tintuc (tacgia_id, chuyenmuc_id, tieude, motanngan, noidung) VALUES
('$tacgia_id', '$chuyenmuc_id', '$tieude', '$motangan', '$noidung')";
$stmt = $pdo->prepare($sql);
$rows = $stmt->execute();
if ($rows) {
    header("Location:" . 'themtintuc.php?id=' . $chuyenmuc_id);
}
?>