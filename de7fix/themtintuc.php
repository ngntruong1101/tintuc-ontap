<?php
require_once 'header.php';
require_once 'connect.php';
if (isset($_GET['id'])) {
    $chuyenmuc_id = $_GET['id'];
    $sql = "SELECT tintuc.*, chuyenmuc.ten as tcm, tacgia.hovaten as ttg FROM tintuc
    INNER JOIN tacgia ON tacgia.id = tintuc.tacgia_id INNER JOIN chuyenmuc
    ON tintuc.chuyenmuc_id = chuyenmuc.id WHERE chuyenmuc_id = $chuyenmuc_id";
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>
<div class="nav">
    <a href="index.php"
       class="btn btn-primary me-3">Trang Chủ</a>
    <a href="dschuyenmuc.php"
       class="btn btn-primary me-3">Danh Sách Chuyên Mục</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tác giả</th>
            <th>Chuyên mục</th>
            <th>Tiêu đề</th>
            <th>Mô tả ngắn</th>
            <th>Nội dung</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item) { ?>
            <tr>
                <td><?php echo $item['ID'] ?></td>
                <td>
                    <?php echo $item['ttg'] ?>
                </td>
                <td>
                    <?php echo $item['tcm'] ?>
                </td>
                <td><?php echo $item['tieude'] ?></td>
                <td>
                    <?php echo $item['motanngan'] ?>
                </td>
                <td><?php echo $item['noidung'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<h5>Thêm tin tức</h5>
<form action="them.php"
      method="post">
      <input type="hidden" name="chuyenmuc_id" value="<?php echo $chuyenmuc_id ?>">
    <label class="form-label">Tác giả</label>
    <select name="tacgia_id" class="form-control">
        <?php
        $sqlTg = "SELECT * FROM tacgia";
        $stmt = $pdo->query($sqlTg);
        $tgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($tgs as $tg) {
            ?>
        <option value="<?php echo $tg['ID'] ?>"><?php echo $tg['hovaten'] ?></option>
        <?php } ?>
    </select>
    <label class="form-label">Tiêu đề</label>
    <input type="text"
           class="form-control"
           name="tieude">
           <label class="form-label">Mô tả ngắn</label>
    <input type="text"
           class="form-control"
           name="motangan">
           <label class="form-label">Nội dung</label>
    <input type="text"
           class="form-control"
           name="noidung">
    <input type="submit"
           value="Thêm"
           class="btn btn-primary mt-3">
</form>

<?php require_once 'footer.php' ?>