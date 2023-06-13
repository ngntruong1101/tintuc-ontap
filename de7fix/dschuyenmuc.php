<?php
require_once 'header.php';
require_once 'connect.php';
if (isset($_GET['ten'])) {
    $ten = $_GET['ten'];
    $sql = "SELECT chuyenmuc.*, chude.ten as tcd FROM chuyenmuc INNER JOIN chude ON chuyenmuc.chude_id = chude.id WHERE
    chuyenmuc.ten LIKE '%$ten%'";
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT chuyenmuc.*, chude.ten as tcd FROM chuyenmuc INNER JOIN chude ON chuyenmuc.chude_id = chude.id";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<div class="nav">
    <a href="index.php"
       class="btn btn-primary me-3">Trang Chủ</a>
</div>
<form>
    <label class="form-label">Tìm kiếm chuyên mục</label>
    <input type="text" class="form-control"  name="ten" placeholder="Nhập tên chuyên mục">
    <input type="submit" value="Tìm kiếm" class="btn btn-primary mt-3">
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Chủ đề</th>
            <th>Mô tả</th>
            <th>Số từ tối thiểu</th>
            <th>Cấp độ tối thiểu</th>
            <th>Thêm tin tức</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) { ?>
            <tr>
                <td><?php echo $item['ID'] ?></td>
                <td><?php echo $item['ten'] ?></td>
                <td><?php echo $item['tcd'] ?></td>
                <td><?php echo $item['mota'] ?></td>
                <td><?php echo $item['sotutoithieu'] ?></td>
                <td><?php echo $item['capdotoithieu'] ?></td>
                <td>
                    <a href="themtintuc.php?id=<?php echo $item['ID'] ?>" class="btn btn-primary">Thêm</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require_once 'footer.php' ?>