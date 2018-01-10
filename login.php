<?php include "admin/connection.php" ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Spor Merkezi Yönetimi</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .mySlides {display:none;}
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php" style="margin-bottom: 100px;"><b><font color="#3f8be4">SPOR</font> <font color="#fe256b">MERKEZİ</font></a>
  </div>
  <div class="login-box-body">
    <form action="logged.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="user_name_txt">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Parola" name="user_password_txt">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8"></div>
        <div class="col-xs-4">
          <button type="submit" name="login_btn" class="btn btn-primary btn-block btn-flat">Giriş</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="w3-content w3-section" style="max-width:750px">
    <img class="mySlides" src="photos/ad1.jpg" style="width:100%">
    <img class="mySlides" src="photos/ad2.jpg" style="width:100%">
    <img class="mySlides" src="photos/ad3.jpg" style="width:100%">
</div>

<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
<center>
    <img src="photos/github.jpg" usemap="#image-map">

    <map name="image-map">
        <area target="" alt="mertongngl" title="mertongngl" href="https://www.github.com/mertongngl" coords="92,26,278,183" shape="rect">
        <area target="" alt="oznshn1" title="oznshn1" href="https://www.github.com/mertongngl/oznshn1" coords="504,32,256" shape="circle">
    </map>
</center>



<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%'
        });
    });
</script>
</body>
</html>
