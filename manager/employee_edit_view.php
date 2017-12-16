<?php
    include "header.php";
    include "sidebar.php";
    include "../customFunctions.php";
    if (!isset($_GET['ei'])){
        header("Location:index.php");
    }
    $request=mysqli_query($db,"select * from authority_tbl");
    $request_emp=mysqli_query($db,"select * from employees_tbl where emp_id='".filter_sql($db,$_GET['ei'])."'");
    $response_emp=mysqli_fetch_assoc($request_emp);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Çalışan Düzenle</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" action="../operations.php" role="form">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ad</label><br>
                            <input type="text" class="form-control" name="emp_name_txt" value="<?php echo $response_emp['emp_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Soyad</label><br>
                            <input type="text" class="form-control" name="emp_surname_txt" value="<?php echo $response_emp['emp_surname'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label><br>
                            <input type="text" class="form-control" name="emp_phone_txt" id="phone" value="<?php echo $response_emp['emp_phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label>E-Posta Adresi</label>
                            <input type="email" class="form-control" name="emp_mail_txt" value="<?php echo $response_emp['emp_mail'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Yetki</label><br>
                            <select name="emp_authority_slc" class="form-control select2" id="select2-jgyj-container">
                                <?php
                                while($response=mysqli_fetch_assoc($request)) {
                                    if ($response['authority_code'] == $response_emp['authority_code']) {
                                        ?>
                                        <option value="<?php echo $response['authority_code']; ?>" selected><?php echo $response['authority_info'] ?></option>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <option value="<?php echo $response['authority_code']; ?>"><?php echo $response['authority_info']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adres</label><br>
                            <textarea class="form-control" rows="1" name="emp_address_txt"><?php echo $response_emp['emp_address'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>TC Kimlik Numarası</label><br>
                            <input type="text" class="form-control" name="emp_identity_txt" value="<?php echo $response_emp['emp_identity'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label><br>
                            <select name="emp_gender_slc" class="form-control select2" id="select2-jgyj-container">
                                <?php
                                    if ($response_emp['emp_gender'] == 'E') {
                                        ?>
                                        <option value="E" selected>
                                            Erkek
                                        </option>
                                        <option value="K">
                                            Kadın
                                        </option>
                                        <?php
                                    }
                                    else {
                                        ?>
                                        <option value="E">
                                            Erkek
                                        </option>
                                        <option value="K" selected>
                                            Kadın
                                        </option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group-addon">
                            <label for="emp_birthdate">Doğum Tarihi</label>
                            <input type="text" name="emp_birthdate_txt" class="form-control pull-right" value="<?php echo $response_emp['emp_birthdate'] ?>" id="datepicker">
                        </div>
                        <div class="form-group">
                            <label for="memberphoto" style="margin-top: 13px;">Çalışan Fotoğrafı</label><br>
                            <input type="file" name="emp_photo_url" id="exampleInputFile" class="btn btn-default">
                            <label >Yalnızca .jpg Uzantılı Fotograf Yükleyiniz.[Fotoğrafı güncellemek istemiyorsanız boş bırakınız.]</label>
                        </div>
                    </div>
                </div>
                <input type="text" name="emp_id" value="<?php echo $response_emp['emp_id']; ?>" style="display: none">
                <input type="text" name="emp_photo" value="<?php echo $response_emp['emp_photo_url']; ?>" style="display: none">
                <div class="box-footer">
                    <button type="submit" name="emp_edit_btn" class="pull-right btn btn-primary" style="width:100px;">Düzenle</button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php
    include "footer.php";
?>
