<?php
    include "admin/connection.php";
    include "customFunctions.php";
    if (isset($_POST['mem_edit_btn'])) {
        if ($_FILES['mem_photo_url']['name'] != "") {
            $imageFileType = pathinfo(mysqli_real_escape_string($db,trim(htmlspecialchars($_FILES['mem_photo_url']['name']))), PATHINFO_EXTENSION);
            $imageName = $_FILES['mem_photo_url']['name'];
            $check = getimagesize(mysqli_real_escape_string($db,trim(htmlspecialchars($_FILES["mem_photo_url"]["tmp_name"]))));
            $random = random_generate(60) . ".jpg";
            if ($check != false) {
                if ($imageFileType == 'jpg') {
                    $isDelete=unlink(getcwd()."/photos/".$_POST['mem_photo']);
                    if ($isDelete) {
                        if (move_uploaded_file($_FILES["mem_photo_url"]["tmp_name"], "photos/" . $random)) {

                            $request_mem=mysqli_query($db,"update members_tbl set mem_identity='".filter_sql($db,$_POST['mem_identity_txt'])."',mem_name='".filter_sql($db,$_POST['mem_name_txt'])."',mem_surname='".filter_sql($db,$_POST['mem_surname_txt'])."',mem_birthdate='".filter_sql($db,$_POST['mem_birthdate_txt'])."',mem_gender='".filter_sql($db,$_POST['mem_gender_slc'])."',mem_phone='".filter_sql($db,$_POST['mem_phone_txt'])."',mem_mail='".filter_sql($db,$_POST['mem_mail_txt'])."',mem_address='".filter_sql($db,$_POST['mem_address_txt'])."',mem_photo_url='".$random."' where mem_id='".filter_sql($db,$_POST['mem_id'])."'");
                            $request_mem_size=mysqli_query($db,"update members_sizes_tbl set size_length='".filter_sql($db,$_POST['mem_length_txt'])."',size_weight='".filter_sql($db,$_POST['mem_weight_txt'])."',size_arm='".filter_sql($db,$_POST['mem_arm_txt'])."',size_chest='".filter_sql($db,$_POST['mem_chest_txt'])."',size_waist='".filter_sql($db,$_POST['mem_waist_txt'])."',size_hip='".filter_sql($db,$_POST['mem_hip_txt'])."',size_leg='".filter_sql($db,$_POST['mem_leg_txt'])."',size_fat_rate='".filter_sql($db,$_POST['mem_fat_rate_txt'])."' where mem_id='".filter_sql($db,$_POST['mem_id'])."'");
                            if ($request_mem && $request_mem_size ) {
                                echo "<script type='text/javascript'>alert('Bilgiler başarılı bir şekilde güncellendi!');window.location = 'member_edit.php';</script>";
                            }
                            else {
                                echo "<script type='text/javascript'>alert('Bilgiler güncellenemedi!');window.location = 'member_edit.php';</script>";
                            }
                        }
                        else{
                            echo "<script type='text/javascript'>alert('Yeni fotoğraf yüklenemedi!!!');window.location = 'member_edit.php';</script>";
                        }
                    }
                    else {
                        echo "<script type='text/javascript'>alert('Eski fotoğrafınız silinemediğinden hata oluştu!');window.location = 'member_edit.php';</script>";
                    }
                }
                else {
                    echo "<script type='text/javascript'>alert('Lütfen .jpg Uzantılı Fotoğraf Yükleyin!!!');window.location = 'member_edit.php';</script>";
                }
            }
        }
        else{
            $request_mem=mysqli_query($db,"update members_tbl set mem_identity='".filter_sql($db,$_POST['mem_identity_txt'])."',mem_name='".filter_sql($db,$_POST['mem_name_txt'])."',mem_surname='".filter_sql($db,$_POST['mem_surname_txt'])."',mem_birthdate='".filter_sql($db,$_POST['mem_birthdate_txt'])."',mem_gender='".filter_sql($db,$_POST['mem_gender_slc'])."',mem_phone='".filter_sql($db,$_POST['mem_phone_txt'])."',mem_mail='".filter_sql($db,$_POST['mem_mail_txt'])."',mem_address='".filter_sql($db,$_POST['mem_address_txt'])."' where mem_id='".filter_sql($db,$_POST['mem_id'])."'");
            $request_mem_size=mysqli_query($db,"update members_sizes_tbl set size_length='".filter_sql($db,$_POST['mem_length_txt'])."',size_weight='".filter_sql($db,$_POST['mem_weight_txt'])."',size_arm='".filter_sql($db,$_POST['mem_arm_txt'])."',size_chest='".filter_sql($db,$_POST['mem_chest_txt'])."',size_waist='".filter_sql($db,$_POST['mem_waist_txt'])."',size_hip='".filter_sql($db,$_POST['mem_hip_txt'])."',size_leg='".filter_sql($db,$_POST['mem_leg_txt'])."',size_fat_rate='".filter_sql($db,$_POST['mem_fat_rate_txt'])."' where mem_id='".filter_sql($db,$_POST['mem_id'])."'");
            if ($request_mem && $request_mem_size) {
                echo "<script type='text/javascript'>alert('Bilgiler başarılı bir şekilde güncellendi!');window.location = 'member_edit.php';</script>";
            } else {
                echo "<script type='text/javascript'>alert('Bilgiler güncellenemedi!');window.location = 'member_edit.php';</script>";
            }
        }
    }
?>