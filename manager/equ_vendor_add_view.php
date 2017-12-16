<?php
    include "header.php";
    include "sidebar.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tedarikçi Ekle</h3>
            </div>
            <form action="equ_vendor_add.php" method="post" role="form">
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Tedarikçi Adı</label><br>
                            <input type="text" class="form-control" name="equ_vendor_name_txt" placeholder="Adını giriniz">
                        </div>
                        <div class="form-group">
                            <label>Tedarikçi Telefonu</label><br>
                            <input type="text" class="form-control" name="equ_vendor_phone_txt" placeholder="Telefon giriniz">
                        </div>
                        <div class="form-group">
                            <label>Tedarikçi Adresi</label><br>
                            <textarea class="form-control" rows="3" name="equ_vendor_address_txt" placeholder="Adres giriniz..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="equ_vendor_add_btn" class="pull-right btn btn-primary" style="width:100px;">Ekle</button>
                </div>
            </form>
    </section>
</div>


<?php
    include "footer.php";
?>
