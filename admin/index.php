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
                                            <th>Üye Adı</th>
                                            <th>Üye Soyadı</th>
                                            <th>Üye E-Posta</th>
                                            <th>Üye Telefon</th>
                                            <th>Üye Adres</th>
                                            <th>Üye TC Kimlik Nu</th>
                                            <th>Üye Cinsiyet</th>
                                            <th>Üye Doğum Tarihi</th>
                                        </tr>
                                        <?php
                                        $request=mysqli_query($db, "select * from members_tbl");
                                        while($response=mysqli_fetch_assoc($request))
                                        {
                                            ?>
                                            <tr>
                                                <td><img class="img-circle" style="width:100%;max-width: 45px;height: auto;" src="../photos/<?php echo $response['mem_photo_url']; ?>"></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_name']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_surname']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_mail']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_phone']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_address']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_identity']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_gender']; ?></td>
                                                <td style="vertical-align: middle;"><?php echo $response['mem_birthdate']; ?></td>
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

    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="tab-pane active">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Kayıtlı Olan Çalışan</h3>
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
                                            <th>Çalışan Yetki</th>
                                            <th>Çalışan Doğum Tarihi</th>
                                        </tr>
                                        <?php
                                        $request=mysqli_query($db, "select * from employees_tbl");
                                        while($response=mysqli_fetch_assoc($request)) {
                                            if ($response['emp_id'] != $_SESSION['emp_id']) {
                                                ?>
                                                <tr>
                                                    <td><img src="../photos/<?php echo $response['emp_photo_url'];?>"
                                                             class="img-circle"
                                                             style="width:100%;max-width: 45px;height: auto;"
                                                        >
                                                    </td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_name']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_surname']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_mail']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_phone']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_address']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_identity']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_gender']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['authority_code']; ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $response['emp_birthdate']; ?></td>
                                                </tr>
                                                <?php
                                            }
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
