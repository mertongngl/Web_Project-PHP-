<?php
    include "../admin/connection.php";
    include "../customFunctions.php";
    if (isset($_POST['create_contract_btn'])){
        $request=mysqli_query($db,"CALL contract_operations('".filter_sql($db,$_POST['mem_id'])."','".filter_sql($db,$_POST['cont_start_txt'])."','".filter_sql($db,$_POST['cont_finish_txt'])."','".filter_sql($db,$_POST['cont_price_txt'])."','".filter_sql($db,$_POST['cont_ins_quantity_txt'])."');");
        if (mysqli_affected_rows($db) == 0){
            echo "<script type='text/javascript'>alert('Kontrat oluşturulamadı!');window.location = 'create_contract_view.php';</script>";
        }
        else{
            echo "<script type='text/javascript'>alert('Kontrat oluşturuldu!');window.location = 'index.php';</script>";
        }
    }
    /*else{
        header("location:index.php");
    }*/
?>