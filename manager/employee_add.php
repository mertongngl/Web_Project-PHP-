<?php
include "../admin/connection.php";
include "../customFunctions.php";
if (isset($_POST['emp_add_btn']) && !check_date(filter_sql($db,$_POST['mem_birthdate_txt']))){
    echo "<script type='text/javascript'>alert('Doğum tarihini doğru formatta giriniz');window.location = 'employee_add_view.php';</script>";
}
if (isset($_POST['emp_add_btn']) && !check_phone(filter_sql($db,$_POST['mem_phone_txt']))){
    echo "<script type='text/javascript'>alert('Telefonu doğru formatta giriniz');window.location = 'employee_add_view.php';</script>";
}
if(isset($_FILES['emp_photo_url']) && $_FILES['emp_photo_url']['name'] != ""){
    if (isset($_POST['emp_add_btn'])){
        $imageFileType = pathinfo(filter_sql($db,$_FILES['emp_photo_url']['name']),PATHINFO_EXTENSION);
        $imageName=$_FILES['emp_photo_url']['name'];
        $check = getimagesize(filter_sql($db,$_FILES["emp_photo_url"]["tmp_name"]));
        $random=random_generate(60).".jpg";
        if ($check != false){
            if ($imageFileType == 'jpg'){
                if (move_uploaded_file($_FILES["emp_photo_url"]["tmp_name"],"../photos/".$random )){
                    //chmod(getcwd()."/photos/" . $random,0755);
                    $request=mysqli_query($db,"insert into employees_tbl (emp_identity, emp_name, emp_surname, emp_birthdate, emp_gender, emp_phone, emp_mail, emp_address, authority_code, emp_photo_url) values ('".filter_sql($db,$_POST['emp_identity_txt'])."','".filter_sql($db,$_POST['emp_name_txt'])."','".filter_sql($db,$_POST['emp_surname_txt'])."','".filter_sql($db,$_POST['emp_birthdate_txt'])."','".filter_sql($db,$_POST['emp_gender_slc'])."','".filter_sql($db,$_POST['emp_phone_txt'])."','".filter_sql($db,$_POST['emp_mail_txt'])."','".filter_sql($db,$_POST['emp_address_txt'])."','".filter_sql($db,$_POST['emp_authority_slc'])."','".$random."')");
                    if (mysqli_affected_rows($db) == 0){
                        echo "<script type='text/javascript'>alert('Çalışan Veritabanına Kaydedilemedi!!!');window.location = 'employee_add_view.php';</script>";
                    }
                    else{
                        $request_select=mysqli_query($db,"select * from employees_tbl where emp_identity='".filter_sql($db,$_POST['emp_identity_txt'])."'");
                        $response_select=mysqli_fetch_assoc($request_select);
                        $request_2=mysqli_query($db,"insert into users_tbl (emp_id,user_name, user_password) values ('".filter_sql($db,$response_select['emp_id'])."','".filter_sql($db,$_POST['emp_identity_txt'])."','".md5(filter_sql($db,"123456"))."')");
                        echo "<script type='text/javascript'>alert('Çalışan başarılı bir şekilde kaydedildi!!!');window.location = 'employee_add_view.php';</script>";
                        }
                    }
                }
                else{
                    echo "<script type='text/javascript'>alert('Fotoğraf Yüklenemedi!!!');window.location = 'employee_add_view.php';</script>";
                }
            }
            else{
                    echo "<script type='text/javascript'>alert('Lütfen .jpg Uzantılı Fotoğraf Yükleyin!!!');window.location = 'employee_add_view.php';</script>";
            }
        }
    }
    else{
        echo "<script type='text/javascript'>alert('Lütfen Fotoğraf Yükleyin!!!');window.location = 'employee_add_view.php';</script>";
    }

?>