<?php
    include "../customFunctions.php";
    include "../admin/connection.php";
if (isset($_POST['equ_vendor_add_btn']) && !check_phone(filter_sql($db,$_POST['mem_phone_txt']))){
    echo "<script type='text/javascript'>alert('Telefonu doğru formatta giriniz');window.location = 'equ_vendor_add_view.php';</script>";
}
    if (isset($_POST['equ_vendor_add_btn'])){
        $request=mysqli_query($db,"insert into equ_vendor_tbl (equ_vendor_name, equ_vendor_phone, equ_vendor_address) values ('".filter_sql($db,$_POST['equ_vendor_name_txt'])."','".filter_sql($db,$_POST['equ_vendor_phone_txt'])."','".filter_sql($db,$_POST['equ_vendor_address_txt'])."')");
        if (mysqli_affected_rows($db) == 0){
            echo "<script type='text/javascript'>alert('Tedarikçi Eklenemedi!!');window.location='equ_vendor_add_view.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Tedarikçi başırılı bir şekilde eklendi!!');window.location='index.php';</script>";
        }
    }
?>