<?php
    include "header.php";
    include "sidebar.php";
?>

<div class="content-wrapper">

    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Kayıtlı Olan Üyeler</h3>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <th>Fotoğraf</th>
                                            <th>Çalışan Adı</th>
                                            <th>Çalışan Soyadı</th>
                                            <th>Çalışan E-Posta</th>
                                            <th>Çalışan Telefon</th>
                                            <th>Çalışan Adres</th>
                                            <th>Çalışan TC Kimlik Nu</th>
                                            <th>Çalışan Cinsiyet</th>
                                            <th>Çalışan Doğum Tarihi</th>
                                            <th>Kontrat Oluştur</th>
                                            <th>Ödeme</th>
                                        </tr>
                                        <?php
                                        $request=mysqli_query($db, "select * from members_tbl");
                                        while($response=mysqli_fetch_assoc($request)) {
                                                ?>
                                                <tr>
                                                    <td><img src="../photos/<?php echo $response['mem_photo_url'];?>"
                                                             class="img-circle"
                                                             style="width:100%;max-width: 45px;height: auto;"
                                                        >
                                                    </td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_name']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_surname']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_mail']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_phone']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_address']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_identity']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_gender']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_birthdate']; ?></td>
                                                    <td style="vertical-align: middle;"><a
                                                                href="create_contract_view.php?mi=<?php echo $response['mem_id']; ?>">
                                                            <button style="width: 80px" class="btn btn-primary">
                                                                Oluştur
                                                            </button>
                                                        </a></td>
                                                    <td style="vertical-align: middle;"><a
                                                                href="payment_view.php?mi=<?php echo $response['mem_id']; ?>">
                                                            <button class="btn btn-danger" style="width:80px;">Öde
                                                            </button>
                                                        </a></td>
                                                </tr>
                                                <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<?php
    include "footer.php";
?>
