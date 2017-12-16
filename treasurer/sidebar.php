<?php
include "../admin/connection.php";
include "../customFunctions.php";

$request=mysqli_query($db,"select * from employees_tbl where emp_id='".filter_sql($db,$_SESSION['emp_id'])."'");
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
            </div>
        </div>
        <ul class="sidebar-menu">

            <li class="treeview">
                <a href="../admin/logout.php">
                    <i class="fa fa-dashboard"></i> <span>Çıkış Yap</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
            </li>
        </ul>
    </section>
</aside>