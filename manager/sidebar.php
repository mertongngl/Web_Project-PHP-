<?php
include "../admin/connection.php";

$request=mysqli_query($db,"select * from employees_tbl where emp_id='".$_SESSION['emp_id']."'");
$response=mysqli_fetch_assoc($request);

?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo "../photos/".$response['emp_photo_url']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Merhaba <?php echo " ".$response['emp_name']?>!</p>
                <center style="font-size: small;color: #3f8be4"><b>( MÜDÜR )</b></center>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="employee_add_view.php">
                    <span>Çalışan Ekle</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="equ_vendor_add_view.php">
                     <span>Tedarikçi Ekle</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="equipments_add_view.php">
                     <span>Ekipman Ekle</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="../admin/logout.php">
                     <span>Çıkış Yap</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
        </ul>
    </section>
</aside>