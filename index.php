<?php include "header.php" ?>
<?php include "sidebar.php" ?>
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
                                                <th>Üye Adı</th>
                                                <th>Üye Soyadı</th>
                                                <th>Üye E-Posta</th>
                                                <th>Üye Telefon</th>
                                                <th>Üye Adres</th>
                                                <th>Üye TC Kimlik Nu</th>
                                                <th>Üye Cinsiyet</th>
                                                <th>Üye Doğum Tarihi</th>
                                                <th>Düzenle</th>
                                                <th>Sil</th>
                                            </tr>
                                            <?php
                                            $request=mysqli_query($db, "select * from members_tbl");
                                            while($response=mysqli_fetch_assoc($request))
                                            {
                                                ?>
                                                <tr>
                                                    <td><img class="img-circle" style="width:100%;max-width: 45px;height: auto;" src="photos/<?php echo $response['mem_photo_url']; ?>"></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_name']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_surname']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_mail']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_phone']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_address']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_identity']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_gender']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['mem_birthdate']; ?></td>
                                                    <td style="vertical-align: middle;"><a href="member_edit.php?mi=<?php echo $response['mem_id']; ?>"><button style="width: 80px" class="btn btn-primary">Düzenle</button></a></td>
                                                    <td style="vertical-align: middle;"><a href="member_delete.php?mi=<?php echo $response['mem_id']."&mp=".$response['mem_photo_url']; ?>"><button class="btn btn-danger" style="width:80px;">Sil</button></a></td>
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
<?php include "footer.php" ?>