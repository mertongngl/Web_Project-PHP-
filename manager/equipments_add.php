<?php
    include "../admin/connection.php";
    include "../customFunctions.php";
    if (isset($_POST['equ_add_btn'])){
        $request=mysqli_query($db,"insert into equipments_tbl (equ_name, equ_quantity, equ_vendor_id) values ('".filter_sql($db,$_POST['equ_name_txt'])."','".filter_sql($db,$_POST['equ_quantity_txt'])."','".filter_sql($db,$_POST['equ_vendor_slc'])."')");

        if (mysqli_affected_rows($db) == 0){
            echo "<script type='text/javascript'>alert('Ekipman Eklenemedi!!');window.location='equipments_add_view.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Ekipman başırılı bir şekilde eklendi!!');window.location='index.php';</script>";
        }
    }
?>