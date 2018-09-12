<!DOCTYPE html>
<html lang="zh-tw">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <title>Playgroup</title>
</head>

<body class="login">
  <nav class="navbar navbar-light bg-light header">
    <a class="navbar-brand float-left" href="index.php">
      <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
    </a>
  </nav>

  <div class="enroll">
    <div class="container-fluid">
      <div id="tr_space"></div>
      <p class="title-font">登入</p>
      <div class="border border-secondary rounded inside">

        <?php 
        $old_url = $_SERVER["REQUEST_URI"];
        $check = strpos($old_url, '?');
        if($check !== false){
            if(substr($old_url, $check+1) == ''){
              echo '';
          }else{
              if($_GET['refer']==md5('nologin')){
                echo '<div class="alert alert-danger" role="alert">帳號密碼輸入錯誤！</div>';
              }
          }
        }
        ?>

      	<form action="actionlogin.php" method="post" name="login"  class="needs-validation" novalidate>
          <div class="form-group row">
            <label for="number" class="col-sm-2 col-form-label">帳號</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="number" placeholder="請輸入手機號碼" onkeyup="value=value.replace(/[^\d]/g,'') " required>
              <div class="invalid-feedback">尚未輸入</div>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="pwd" class="col-sm-2 col-form-label">密碼</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="pwd" required>
              <div class="invalid-feedback">尚未輸入</div>
            </div>
          </div>

          <input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>">

          <div class="modal-footer form-font">
            <a href="enroll1.php" class="text-muted mr-auto" style="font-size: 0.9rem;">還沒有註冊嗎？</a>
            <a href="index.php" class="btn btn-outline-secondary" role="button" aria-pressed="true">取消</a>
            <button type="submit" class="btn btn-outline-info">登入</button>
          </div>
      	</form>

      </div>

  	</div>
  </div>

</body>

  <script type="text/javascript">
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
</body>

</html>