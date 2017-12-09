<?php
include "admin/connection.php";
include "customFunctions.php";

if (isset($_GET['mi'])){
    $request=mysqli_query($db,"delete from members_tbl where mem_id='".filter_sql($db,$_GET['mi'])."'");
    if (mysqli_affected_rows($db)){
        unlink(getcwd()."/photos/".filter_sql($db,$_GET['mp']));
        echo "<script type='text/javascript'>alert('Üye silindi!!!');window.location = 'index.php';</script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Üye silinemedi!!!');window.location = 'index.php';</script>";
    }
}
?>