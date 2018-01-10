<?php
    include "admin/connection.php";
    include "customFunctions.php";
    if (isset($_POST['mem_add_btn']) && !check_date(filter_sql($db,$_POST['mem_birthdate_txt']))){
        echo "<script type='text/javascript'>alert('Doğum tarihini doğru formatta giriniz');window.location = 'add_user_view.php';</script>";
    }
    if (isset($_POST['mem_add_btn']) && !check_phone(filter_sql($db,$_POST['mem_phone_txt']))){
        echo "<script type='text/javascript'>alert('Telefonu doğru formatta giriniz');window.location = 'add_user_view.php';</script>";
    }
    if (isset($_POST['mem_add_btn'])){
        $imageFileType = pathinfo(filter_sql($db,$_FILES['mem_photo_url']['name']),PATHINFO_EXTENSION);
        $imageName=$_FILES['mem_photo_url']['name'];
        $check = getimagesize(filter_sql($db,$_FILES["mem_photo_url"]["tmp_name"]));
        $random=random_generate(60).".jpg";
        if ($check != false){
            if ($imageFileType == 'jpg'){
                if (move_uploaded_file($_FILES["mem_photo_url"]["tmp_name"],"photos/".$random )){
                    $request=mysqli_query($db,"INSERT INTO members_tbl (mem_identity, mem_name, mem_surname, mem_birthdate, mem_gender, mem_phone, mem_mail, mem_address, mem_photo_url) VALUES ('".filter_sql($db,$_POST['mem_identity_txt'])."','".filter_sql($db,$_POST['mem_name_txt'])."','".filter_sql($db,$_POST['mem_surname_txt'])."','".filter_sql($db,$_POST['mem_birthdate_txt'])."','".filter_sql($db,$_POST['mem_gender_slc'])."','".filter_sql($db,$_POST['mem_phone_txt'])."','".filter_sql($db,$_POST['mem_mail_txt'])."','".filter_sql($db,$_POST['mem_address_txt'])."','".$random."')");
                    if (mysqli_affected_rows($db) == 0){
                        echo "<script type='text/javascript'>alert('Üye Veritabanına Kaydedilemedi!!!');window.location = 'add_user_view.php';</script>";
                    }
                    else{
                        $request_size=mysqli_query($db,"INSERT INTO members_sizes_tbl (mem_id, size_length, size_weight, size_arm, size_chest, size_waist, size_hip, size_leg, size_fat_rate) VALUES ((SELECT mem_id FROM members_tbl WHERE mem_identity='".filter_sql($db,$_POST['mem_identity_txt'])."'),'".filter_sql($db,$_POST['mem_length_txt'])."','".filter_sql($db,$_POST['mem_weight_txt'])."','".filter_sql($db,$_POST['mem_arm_txt'])."','".filter_sql($db,$_POST['mem_chest_txt'])."','".filter_sql($db,$_POST['mem_waist_txt'])."','".filter_sql($db,$_POST['mem_hip_txt'])."','".filter_sql($db,$_POST['mem_leg_txt'])."','".filter_sql($db,$_POST['mem_fat_rate_txt'])."')");
                        if (mysqli_affected_rows($db) != 0){
                            echo "<script type='text/javascript'>alert('Üye başarılı bir şekilde kaydedildi!!!');window.location = 'add_user_view.php';</script>";
                        }
                        else{
                            echo "<script type='text/javascript'>alert('Üye Veritabanına Kaydedilemedi!!!');window.location = 'add_user_view.php';</script>";
                        }
                    }
                }
                else{
                    echo "<script type='text/javascript'>alert('Fotoğraf Yüklenemedi!!!');window.location = 'add_user_view.php';</script>";
                }
            }
            else{
                echo "<script type='text/javascript'>alert('Lütfen .jpg Uzantılı Fotoğraf Yükleyin!!!');window.location = 'add_user_view.php';</script>";
            }
        }
        else{
            echo "<script type='text/javascript'>alert('Lütfen Fotoğraf Yükleyin!!!');window.location = 'add_user_view.php';</script>";
        }
    }
?>