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
    <a class="navbar-brand float-left" href="#">
      <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
    </a>
  </nav>
  <div class="enroll">
    <div class="container-fluid outside">
      <div id="tr_space"></div>
      <p class="title-font">註冊</p>
      <div class="border border-secondary rounded inside">
      
      <form action="finish.php" method="post" name="form2" class="needs-validation" novalidate>
          <input type="hidden" name="userName" value="'.$name.'">
          <input type="hidden" name="number" value="'.$number.'">
          <input type="hidden" name="pwd" value="'.$pwd.'">
          <input type="hidden" name="email" value="'.$email.'">
          <input type="hidden" name="gen" value="'.$gen.'">
          <input type="hidden" name="pos" value="'.$pos.'">
        <?php
        $name=$_POST['userName'];
        $number=$_POST['number'];
        $pwd=$_POST['pwd1'];
        $email=$_POST['email'];
        $gen=$_POST['gen'];
        $pos=$_POST['pos'];


        if($pos=='1'){ ?>
                 
                  <div class="form-group">
                    <div style="margin-bottom:1vw; margin-top:1vw;">孩童資料</div>
                    <select class="form-control" name="total" onchange="addKid()">
                      <option>請選擇孩童數量</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>

                  <div class="addkid"></div>
                  <!-- <div id="kidinfo" class="border border-muted rounded" style="padding:2vw; margin-bottom: 5px;">
                    <div class="form-group row">
                      <label for="kidName" class="col-sm-3 col-form-label">孩童姓名</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kidName" required>
                        <div class="invalid-feedback">請務必填寫</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kidGen" class="col-sm-3 col-form-label">孩童性別</label>
                      <div class="col-sm-8">
                        <select class="form-control" name="kidGen" required>
                          <option></option>
                          <option>男</option>
                          <option>女</option>
                        </select>
                        <div class="invalid-feedback">請務必填寫</div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kidAge" class="col-sm-3 col-form-label">孩童年齡</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kidAge" placeholder="eg.2歲5個月，請輸入2.5" required>
                        <div class="invalid-feedback">請務必填寫</div>
                      </div>
                    </div>
                  </div> -->

      <?php }elseif($pos=='2') { ?>
                
                  <div class="form-group">
                    <label for="teaDesc">教學經歷</label>
                    <textarea class="form-control" name="teaDesc" rows="5" placeholder="如果想稍後填寫請填入 無" required></textarea>
                    <div class="invalid-feedback">請務必填寫</div>
                  </div>

      <?php }elseif($pos=='3'){ ?>
                
                  <div class="form-group">
                    <label for="teaDesc">教學經歷</label>
                    <textarea class="form-control" name="teaDesc" rows="5" placeholder="如果想稍後填寫請填入 無" required></textarea>
                    <div class="invalid-feedback">請務必填寫</div>
                  </div>
                  <div class="form-group">
                    <div style="margin-bottom:1vw; margin-top:1vw;">孩童資料</div>
                    <select class="form-control" name="total" onchange="addKid()">
                      <option>請選擇孩童數量</option>
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                    </select>
                  </div>

                  <div class="addkid"></div>

        <?php } ?>
          

          <div class="confirm">
            <input type ="button" class="btn btn-outline-danger" onclick="history.back()" value="上一步"></input>
            <button type="submit" class="btn btn-outline-info">送出</button>
          </div>

        </form>
      </div>
    </div>
  </div>


  <script>
  function addKid(){
    var wrapper = $(".addkid");
    var total = document.form2.total.value;
    var x;

    $(wrapper).empty();
    for (x=0; x < total; x++){
      $(wrapper).append('<div id="kidinfo'+ x +'" class="border border-muted rounded" style="padding:2vw; ' + 
                        'margin-bottom: 5px;">#'+ (x+1) +'<div class="form-group row"><label for="kidName'+ x +'" class="col-sm-3 col-form-label">孩童姓名</label><div class="col-sm-8"><input type="text" class="form-control" name="kidName'+ x +'" required><div class="invalid-feedback">請務必填寫</div></div></div><div class="form-group row"><label for="kidGen'+ x +'" class="col-sm-3 col-form-label">孩童性別</label><div class="col-sm-8"><select class="form-control" name="kidGen'+ x +'" required><option></option><option>男</option><option>女</option></select><div class="invalid-feedback">請務必填寫</div></div></div><div class="form-group row"><label for="kidAge'+ x +'" class="col-sm-3 col-form-label">孩童年齡</label><div class="col-sm-8"><input type="text" class="form-control" name="kidAge'+ x +'" placeholder="eg.2歲5個月，請輸入2.5" required><div class="invalid-feedback">請務必填寫</div></div></div></div>');
    }
  }

  
  </script>
  
  <script>
  (function() {
    'use strict';
    window.addEventListener('load', function() {          
      var forms = document.getElementsByClassName('needs-validation');
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

  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
</body>

</html>