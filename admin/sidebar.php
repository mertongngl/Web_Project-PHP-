<?php
include "../admin/connection.php";

$request=mysqli_query($db,"select * from admin_tbl where adm_id='".$_SESSION['emp_id']."'");
$response=mysqli_fetch_assoc($request);

?>

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../photos/images.jpeg" class="img-circle" alt="Admin Image">
            </div>
            <div class="pull-left info">
                <p>Merhaba <?php echo " ".$response['adm_name']?>!</p>
                <center style="font-size: small;color: #3f8be4"><b>( ADMIN )</b></center>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="create_member_pdf.php">
                    <span>Üye Rapor</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="create_employee_pdf.php">
                    <span>Çalışan Rapor</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
            <li class="treeview">
                <a href="logout.php">
                     <span>Çıkış Yap</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
        </ul>
    </section>
</aside>