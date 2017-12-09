<?php
    include "admin/connection.php";
    include "header.php";
    include "sidebar.php";
    if (!isset($_GET['mi'])){
        header("Location:index.php");
    }
    $mem_id=strip_tags($_GET['mi']);
    $request=mysqli_query($db,"select * from members_tbl inner join members_sizes_tbl m on members_tbl.mem_id = m.mem_id");//uye ve uye olculerını cek inputlara bas
$response=mysqli_fetch_assoc($request);
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Üye Ekle</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" action="operations.php" role="form">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ad</label><br>
                            <input type="text" class="form-control" name="mem_name_txt" value="<?php echo $response['mem_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Soyad</label><br>
                            <input type="text" class="form-control" name="mem_surname_txt" value="<?php echo $response['mem_surname']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label><br>
                            <input type="text" class="form-control" name="mem_phone_txt" id="phone" value="<?php echo $response['mem_phone'];?>">
                        </div>
                        <div class="form-group">
                            <label>E-Posta Adresi</label>
                            <input type="email" class="form-control" name="mem_mail_txt" value="<?php echo $response['mem_mail'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adres</label><br>
                            <textarea class="form-control" rows="1" name="mem_address_txt"><?php echo $response['mem_address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>TC Kimlik Numaras</label><br>
                            <input type="text" class="form-control" name="mem_identity_txt" value="<?php echo $response['mem_identity']?>">
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label><br>
                            <select name="mem_gender_slc" class="form-control select2" id="select2-jgyj-container">
                                <?php if ($response['mem_gender'] == 'E') {
                                    ?>
                                    <option value="E" selected>
                                        Erkek
                                    </option>
                                    <option value="K">
                                        Kadın
                                    </option>
                                    <?php
                                }
                                else{
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
                            <label for="mem_birthdate">Doğum Tarihi</label>
                            <input type="text" name="mem_birthdate_txt" class="form-control pull-right" value="<?php echo $response['mem_birthdate'];?>" id="datepicker">
                        </div>
                        <div class="form-group">
                            <label for="memberphoto">Üye Fotoğrafı</label><br>
                            <input type="file" name="mem_photo_url" id="exampleInputFile" class="btn btn-default">
                            <label >Yalnızca .jpg Uzantılı Fotograf Yükleyiniz.[Fotoğrafı güncellemek istemiyorsanız boş bırakınız]</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Boy</label><br>
                            <input type="text" class="form-control" name="mem_length_txt" value="<?php echo $response['size_length'];?>">
                        </div>
                        <div class="form-group">
                            <label>Kilo</label><br>
                            <input type="text" class="form-control" name="mem_weight_txt" value="<?php echo $response['size_weight'];?>">
                        </div>
                        <div class="form-group">
                            <label>Omuz</label><br>
                            <input type="text" class="form-control" name="mem_arm_txt" value="<?php echo $response['size_arm'];?>">
                        </div>
                        <div class="form-group">
                            <label>Göğüs</label><br>
                            <input type="text" class="form-control" name="mem_chest_txt" value="<?php echo $response['size_chest'];?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bel</label><br>
                            <input type="text" class="form-control" name="mem_waist_txt" value="<?php echo $response['size_waist'];?>">
                        </div>
                        <div class="form-group">
                            <label>Kalça</label><br>
                            <input type="text" class="form-control" name="mem_hip_txt" value="<?php echo $response['size_hip'];?>">
                        </div>
                        <div class="form-group">
                            <label>Bacak</label><br>
                            <input type="text" class="form-control" name="mem_leg_txt" value="<?php echo $response['size_leg'];?>">
                        </div>
                        <div class="form-group">
                            <label>Yağ Oranı(%)</label><br>
                            <input type="text" class="form-control" name="mem_fat_rate_txt" value=<?php echo $response['size_fat_rate'];?>>
                        </div>
                    </div>
                </div>
                <input type="text" name="mem_photo" value="<?php echo $response['mem_photo_url']; ?>" style="display: none">
                <input type="text" name="mem_id" value="<?php echo $response['mem_id']; ?>" style="display: none">
                <div class="box-footer">
                    <button type="submit" name="mem_edit_btn" class="pull-right btn btn-primary" style="width:100px;">Güncelle</button>
                </div>
            </form>
        </div>
    </section>
<?php
    include "footer.php";
?>
