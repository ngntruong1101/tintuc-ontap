<?php
require_once 'header.php';
if ($_SESSION['dangnhap'] != 1) {
   header("Location:" . 'dangnhap.php');
}
?>
<?php require_once 'header.php' ?>
 <div style=" text-align: center; " class="logo">
            <img style="    height: 80px; width: 80px;"
                src="logo.png" alt=""> Quản lí tin tức
        </div>
    <content style=" text-align: center; ">
<div class="nav container" style="background-color:#b4c2c4;">
   <ul class="nav " >
                <li class="nav-item">
                    <a class="nav-link" href="cau1.png">Ảnh Câu 1</a>
                </li>
                <li class="nav-item">
                    <a href="dschuyenmuc.php" class="nav-link">Danh sách chuyên mục</a>
                </li>
                 <li class="nav-item">
                    <a href="dangxuat.php" class="nav-link">Đăng Xuất</a>
                </li>                             
            </ul>   
</div>
<?php require_once 'footer.php' ?>