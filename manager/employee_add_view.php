<?php
    include "header.php";
    include "sidebar.php";
    $request=mysqli_query($db,"select * from authority_tbl");

?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Çalışan Ekle</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" action="employee_add.php" role="form">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ad</label><br>
                            <input type="text" class="form-control" name="emp_name_txt" placeholder="Adını giriniz">
                        </div>
                        <div class="form-group">
                            <label>Soyad</label><br>
                            <input type="text" class="form-control" name="emp_surname_txt" placeholder="Soyadını giriniz">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label><br>
                            <input type="text" class="form-control" name="emp_phone_txt" id="phone" placeholder="Telefon numarası giriniz">
                        </div>
                        <div class="form-group">
                            <label>E-Posta Adresi</label>
                            <input type="email" class="form-control" name="emp_mail_txt" placeholder="E-Posta adresini giriniz">
                        </div>
                        <div class="form-group">
                            <label>Yetki</label><br>
                            <select name="emp_authority_slc" class="form-control select2" id="select2-jgyj-container">
                                <?php
                                while($response=mysqli_fetch_assoc($request)){
                                    ?>
                                    <option value="<?php echo $response['authority_code'] ?>"><?php echo $response['authority_info'] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adres</label><br>
                            <textarea class="form-control" rows="1" name="emp_address_txt" placeholder="Adres giriniz..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>TC Kimlik Numarası</label><br>
                            <input type="text" class="form-control" name="emp_identity_txt" placeholder="TC Kimlik Numarası giriniz">
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label><br>
                            <select name="emp_gender_slc" class="form-control select2" id="select2-jgyj-container">
                                <option value="E" selected>
                                    Erkek
                                </option>
                                <option value="K">
                                    Kadın
                                </option>
                            </select>
                        </div>
                        <div class="form-group-addon">
                            <label for="emp_birthdate">Doğum Tarihi</label>
                            <input type="text" name="emp_birthdate_txt" class="form-control pull-right" id="datepicker">
                        </div>
                        <div class="form-group">
                            <label for="memberphoto" style="margin-top: 13px;">Çalışan Fotoğrafı</label><br>
                            <input type="file" name="emp_photo_url" id="exampleInputFile" class="btn btn-default">
                            <label >Yalnızca .jpg Uzantılı Fotograf Yükleyiniz.</label>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="emp_add_btn" class="pull-right btn btn-primary" style="width:100px;">Ekle</button>
                </div>
            </form>
        </div>
    </section>
</div>
<?php
    include "footer.php";
?>
