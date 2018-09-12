<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/enroll.css">
  <title>Playgroup</title>
</head>

<body class="enroll">
  <nav class="navbar navbar-light bg-light header">
    <a class="navbar-brand float-left" href="index.php">
      <img src="pic/title.png" class="header-logo">
    </a>
  </nav>

  <div class="enroll">
    <div class="container-fluid outside">
      <div id="tr_space"></div>
      <p class="title-font">註冊</p>
      <div class="border border-secondary rounded inside">

        <form action="enroll2.php" method="post" name="form1" onsubmit="return finalcheck()" class="needs-validation" novalidate>
          <div class="form-group">
            <label for="userName">姓名</label>
            <input type="text" class="form-control" name="userName" required="required">
            <div class="invalid-feedback">請務必填寫</div>
          </div>
          <div class="form-group">
            <label for="number">手機號碼</label>
            <input type="text" class="form-control" name="number" placeholder="eg. 0912345678" onkeyup="value=value.replace(/[^\d]/g,'')" required>
            <div class="invalid-feedback">請務必填寫</div>
          </div>
          <div class="form-group">
            <label for="pwd">密碼</label>
            <input type="password" class="form-control" name="pwd1" required>
            <div class="invalid-feedback">請務必填寫</div>
          </div>
          <div class="form-group">
            <label for="pwd2">確認密碼</label>
            <input type="password" class="form-control" name="pwd2" onchange="checkpwd()" required>
            <div class="invalid-feedback">請務必填寫</div>
            <div id="msg" style="color:red; font-size:1rem;"></div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="eg. playgroup@playgroup.com" required>
            <div class="invalid-feedback">請務必填寫</div>
          </div>
          <div class="form-group">
            <label for="parGender">性別</label>
            <select class="form-control" name="gen" required>
              <option></option>
              <option>男</option>
              <option>女</option>
            </select>
            <div class="invalid-feedback">請務必填寫</div>
          </div>
          <fieldset class="form-group" required>
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">身份</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="parent" name="pos" value="1" required>
                  <label class="form-check-label" for="parent">
                    家長
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pos" value="2" required>
                  <label class="form-check-label" for="teacher">
                    老師
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pos" value="3" required>
                  <label class="form-check-label" for="parNtea">
                    家長及老師
                  </label>
                </div>
                <div class="invalid-feedback">請務必填寫</div>
              </div>
            </div>
          </fieldset>


          <div class="confirm">
            <a href="index.php" class="btn btn-outline-secondary" role="button" aria-pressed="true">取消</a>
            <button type="submit" class="btn btn-outline-info">下一步</button>
          </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
  function finalcheck(){
    var p1=document.form1.pwd1.value;
    var p2=document.form1.pwd2.value;
    if(p1!=p2){
      alert("兩次密碼不相同");
      document.form1.pwd1.focus();
      return false;
    }
  }
  </script>

  <script type="text/javascript">
  function checkpwd(){
    var p1=document.form1.pwd1.value;//获取密码框的值
    var p2=document.form1.pwd2.value;//获取重新输入的密码值
    if(p1==""){
      alert("請輸入密碼");//检测到密码为空，提醒输入//
      document.form1.pwd1.focus();//焦点放到密码框
      return false;//退出检测函数
    }
  
    if(p1!=p2){//判断两次输入的值是否一致，不一致则显示错误信息
      document.getElementById("msg").innerHTML="兩次密碼不相符，請重新輸入";//在div显示错误信息
      return false;
    }else if(p1==p2){
      document.getElementById("msg").innerHTML="";
      return false;
    }
  }
  </script>

  <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
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