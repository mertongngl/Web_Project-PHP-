<?php
    include "header.php";
    include "sidebar.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Üye Ekle</h3>
            </div>
            <form method="POST" enctype="multipart/form-data" action="add_user.php" role="form">
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ad</label><br>
                            <input type="text" class="form-control" name="mem_name_txt" placeholder="Adını giriniz">
                        </div>
                        <div class="form-group">
                            <label>Soyad</label><br>
                            <input type="text" class="form-control" name="mem_surname_txt" placeholder="Soyadını giriniz">
                        </div>
                        <div class="form-group">
                            <label>Telefon</label><br>
                            <input type="text" class="form-control" name="mem_phone_txt" id="phone" placeholder="Telefon numarası giriniz">
                        </div>
                        <div class="form-group">
                            <label>E-Posta Adresi</label>
                            <input type="email" class="form-control" name="mem_mail_txt" placeholder="E-Posta adresini giriniz">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Adres</label><br>
                            <textarea class="form-control" rows="1" name="mem_address_txt" placeholder="Adres giriniz..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>TC Kimlik Numaras</label><br>
                            <input type="text" class="form-control" name="mem_identity_txt" placeholder="TC Kimlik Numarası giriniz">
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label><br>
                            <select name="mem_gender_slc" class="form-control select2" id="select2-jgyj-container">
                                <option value="E" selected>
                                    Erkek
                                </option>
                                <option value="K">
                                    Kadın
                                </option>
                            </select>
                        </div>
                        <div class="form-group-addon">
                            <label for="mem_birthdate">Doğum Tarihi</label>
                            <input type="text" name="mem_birthdate_txt" class="form-control pull-right" id="datepicker">
                        </div>
                        <div class="form-group">
                            <label for="memberphoto">Üye Fotoğrafı</label><br>
                            <input type="file" name="mem_photo_url" id="exampleInputFile" class="btn btn-default">
                            <label >Yalnızca .jpg Uzantılı Fotograf Yükleyiniz.</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Boy</label><br>
                            <input type="text" class="form-control" name="mem_length_txt" placeholder=" (cm) ">
                        </div>
                        <div class="form-group">
                            <label>Kilo</label><br>
                            <input type="text" class="form-control" name="mem_weight_txt" placeholder=" (kg) ">
                        </div>
                        <div class="form-group">
                            <label>Omuz</label><br>
                            <input type="text" class="form-control" name="mem_arm_txt" placeholder=" (cm) ">
                        </div>
                        <div class="form-group">
                            <label>Göğüs</label><br>
                            <input type="text" class="form-control" name="mem_chest_txt" placeholder=" (cm) ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Bel</label><br>
                            <input type="text" class="form-control" name="mem_waist_txt" placeholder=" (cm) ">
                        </div>
                        <div class="form-group">
                            <label>Kalça</label><br>
                            <input type="text" class="form-control" name="mem_hip_txt" placeholder=" (cm) ">
                        </div>
                        <div class="form-group">
                            <label>Bacak</label><br>
                            <input type="text" class="form-control" name="mem_leg_txt" placeholder=" (cm) ">
                        </div>
                        <div class="form-group">
                            <label>Yağ Oranı(%)</label><br>
                            <input type="text" class="form-control" name="mem_fat_rate_txt" placeholder=" (%) ">
                        </div>
                    </div>


                </div>
                <div class="box-footer">
                    <button type="submit" name="mem_add_btn" class="pull-right btn btn-primary" style="width:100px;">Ekle</button>
                </div>
            </form>
        </div>
    </section>
</div>
<script type="text/javascript">
    $(function(){

        $("#phone").mask("(999)-999-9999");


        $("#phone").on("blur", function() {
            var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

            if( last.length == 5 ) {
                var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );

                var lastfour = last.substr(1,4);

                var first = $(this).val().substr( 0, 9 );

                $(this).val( first + move + '-' + lastfour );
            }
        });
    });
    <?php
    include "footer.php";
?>
