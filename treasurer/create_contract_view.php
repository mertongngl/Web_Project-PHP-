<?php
    include "header.php";
    include "sidebar.php";
    if (filter_sql($db,$_GET['mi']) == ""){
        header("location:index.php");
    }
?>
<?php include "customFunctions.php"; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Kontrat Oluştur</h3>
                </div>
                <form action="create_contract.php" method="post" role="form">
                    <div class="box-body">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Başlama Tarihi</label><br>
                                <input type="text" class="form-control" name="cont_start_txt" placeholder="Tarih giriniz">
                            </div>
                            <div class="form-group">
                                <label>Bitiş Tarihi</label><br>
                                <input type="text" class="form-control" name="cont_finish_txt" placeholder="Tarih giriniz">
                            </div>
                            <div class="form-group">
                                <label>Toplam Tutar</label><br>
                                <input type="text" class="form-control" name="cont_price_txt" placeholder="Tarih giriniz">
                            </div>
                            <div class="form-group">
                                <label>Taksit Sayısı</label><br>
                                <input type="text" class="form-control" name="cont_ins_quantity_txt" placeholder="Taksit adedi giriniz">
                            </div>
                        </div>
                    </div>
                    <input type="text" name="mem_id" value="<?php echo filter_sql($db,$_GET['mi']); ?>" style="display: none">
                    <div class="box-footer">
                        <button type="submit" name="create_contract_btn" class="pull-right btn btn-primary" style="width:100px;">Oluştur</button>
                    </div>
                </form>
        </section>
    </div>
<?php
    include "footer.php";
?>
