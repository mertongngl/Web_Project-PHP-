<?php
    include "../admin/connection.php";
    include "../customFunctions.php";

    if (isset($_POST['pay_btn'])){
        $request=mysqli_query($db,"delete from installment_tbl where mem_id='".filter_sql($db,$_POST['mem_id'])."' and ins_date='".filter_sql($db,$_POST['ins_date_slc'])."'");

        if (mysqli_affected_rows($db) == 0){
            echo "<script type='text/javascript'>alert('Ödeme Alınamadı!');window.location = 'payment_view.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Ödeme Alındı!');window.location = 'index.php';</script>";
        }
    }
?>