<?php
    include "header.php";
    include "sidebar.php";
    if (filter_sql($db,$_GET['mi']) == ""){
        header("location:index.php");
    }
?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ödeme</h3>
                </div>
            </div>
            <form action="pay.php" method="post" role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label>Taksit Tarihi</label><br>
                        <select name="ins_date_slc" class="form-control select2" id="select2-jgyj-container">
                            <?php
                                $request=mysqli_query($db,"select * from installment_tbl where mem_id='".filter_sql($db,$_GET['mi'])."'");
                                while($response=mysqli_fetch_assoc($request)) {
                                    ?>
                                    <option value="<?php echo $response['ins_date'] ?>"><?php echo $response['ins_date'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <input type="text" value="<?php echo filter_sql($db,$_GET['mi']); ?>" name="mem_id" style="display: none;">
                <div class="box-footer">
                    <?php
                    $request=mysqli_query($db,"select * from installment_tbl where mem_id='".filter_sql($db,$_GET['mi'])."'");
                    $response=mysqli_fetch_assoc($request);
                    ?>
                    <button type="submit" name="pay_btn" class="pull-right btn btn-primary" style="width:100px;">Öde <?php echo $response['ins_price']." (tl)"; ?></button>
                </div>
            </form>


        </section>
    </div>
<?php
    include "footer.php";
?>
