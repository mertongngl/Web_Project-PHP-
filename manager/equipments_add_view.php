<?php
    include "header.php";
    include "sidebar.php";
    $request=mysqli_query($db,"select * from equ_vendor_tbl");
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ekipman Ekle</h3>
            </div>
            <form action="equipments_add.php" method="post" role="form">
                <div class="box-body">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Ekipman Adı</label><br>
                            <input type="text" class="form-control" name="equ_name_txt" placeholder="Adını Giriniz..">
                        </div>
                        <div class="form-group">
                            <label>Ekipman Adet</label><br>
                            <input type="text" class="form-control" name="equ_quantity_txt" placeholder="Adedi Giriniz..">
                        </div>
                        <div class="form-group">
                            <label>Tedarikçi Adı</label><br>
                            <select name="equ_vendor_slc" class="form-control select2" id="select2-jgyj-container">
                                <?php
                                while($response=mysqli_fetch_assoc($request)){
                                    ?>
                                    <option value="<?php echo $response['equ_vendor_id']; ?>"><?php echo $response['equ_vendor_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" name="equ_add_btn" class="pull-right btn btn-primary" style="width:100px;">Ekle</button>
                </div>
            </form>
        </div>
    </section>
</div>


<?php
    include "footer.php";
?>
