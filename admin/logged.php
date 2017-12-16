<?php
    include "connection.php";
    include "../customFunctions.php";
    if (isset($_POST['login_btn'])){
        $request=mysqli_query($db,"select * from admin_tbl where adm_name='".filter_sql($db,$_POST['adm_name_txt'])."' and adm_password='".md5(filter_sql($db,$_POST['adm_password_txt']))."'");
        if (mysqli_num_rows($request) == 0){
            echo "<script type='text/javascript'>alert('Kullanici Adi veya Parola Hatali!');window.location = 'login.php';</script>";
        }
        else{
            $response=mysqli_fetch_assoc($request);
            $_SESSION['adm_id']=$response['adm_id'];
            $_SESSION['adm_name']=$response['adm_name'];
            header("location:index.php");
        }
    }
?>