<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <title>Playgroup</title>
</head>

<body>
<!-- Login -->
  <div class="modal fade" id="userLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title title-font" id="exampleModalLongTitle"> 
            <span class="fa fa-sign-in"/> 
            <span class="title-font">登入/註冊</span>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body form-font">
          <div id="msg" style="color:red; font-size:0.8rem;"></div>
          <form name="login" onsubmit="return login()">
            <div class="form-group row">
              <label for="number" class="col-sm-2 col-form-label">帳號</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="number" placeholder="請輸入手機號碼" onkeyup="value=value.replace(/[^\d]/g,'') ">
              </div>
            </div>
            <div class="form-group row">
              <label for="pwd" class="col-sm-2 col-form-label">密碼</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" name="pwd">
              </div>
            </div>
          </div>
          <div class="modal-footer form-font">
            <a href="enroll1.php" class="text-muted mr-auto" style="font-size: 0.9rem;">還沒有註冊嗎？</a>
            <!-- <button type="button" class="btn btn-outline-info mr-auto" data-dismiss="modal">註冊</button> -->
            <button type="button" class="btn btn-outline-info">登入</button>
          </div>
          <input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ? $_GET['refer'] : 'index.php'; ?>">
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  function login(){
    var num=document.login.number.value;//获取密码框的值
    var pwd=document.login.pwd.value;//获取重新输入的密码值
    if(num==""){
      alert("未輸入帳號");
      document.login.number.focus();
      return false;
    }else if(pwd=""){
      alert("未輸入密碼");
      document.login.pwd.focus();
      return false;
    }else{

    }
  }
  
    // if(p1!=p2){//判断两次输入的值是否一致，不一致则显示错误信息
    //   document.getElementById("msg").innerHTML="兩次密碼不相符，請重新輸入";//在div显示错误信息
    //   return false;
    // }
  
  </script>

  <

  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>

</html>