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
      <p class="title-font">開一門好課</p>
      <div class="border border-secondary rounded inside">
        <form action="#" method="post" name="add" class="needs-validation" novalidate> 
          <div style="margin-bottom:1vw; margin-top:3vw;">課程資料</div>
          <div class="border border-muted rounded" style="padding:2vw;">

            <div class="form-group">
              <label for="cName">課程名稱</label>
              <input type="text" class="form-control" name="cName" placeholder="請輸入課程名稱" required>
              <div class="invalid-feedback">請務必填寫</div>
            </div>

            <div class="form-group">
              <label for="teaDesc">課程介紹</label>
              <textarea class="form-control" name="cDesc" rows="5" placeholder="請輸入課程介紹" required></textarea>
              <div class="invalid-feedback">請務必填寫</div>
            </div>

            <div class="form-group">
              <label for="teaDesc">師資介紹</label>
              <textarea class="form-control" name="cDesc" rows="5" placeholder="請輸入師資介紹" required></textarea>
              <div class="invalid-feedback">請務必填寫</div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="agelower">適讀年齡</label>
                <select name="agelower" class="form-control">
                  <option selected>最小年齡...</option>
                  <option>0.5</option><option>1.0</option>
                  <option>1.5</option><option>2</option>
                  <option>3</option><option>4</option>
                  <option>5</option><option>6</option>
                  <option>7</option><option>8</option>
                  <option>9</option><option>10</option>
                  <option>11</option><option>12</option>
                  <div class="invalid-feedback">請務必填寫</div>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="ageupper">&nbsp;</label>
                <select name="ageupper" class="form-control">
                  <option selected>最大年齡...</option>
                  <option>0.5</option><option>1.0</option>
                  <option>1.5</option><option>2</option>
                  <option>3</option><option>4</option>
                  <option>5</option><option>6</option>
                  <option>7</option><option>8</option>
                  <option>9</option><option>10</option>
                  <option>11</option><option>12</option>
                </select>
                <div class="invalid-feedback">請務必填寫</div>
              </div>
            </div>
            
            <div class="form-group">
              <label for="cAddress">地點</label>
              <input type="text" class="form-control" name="cName" placeholder="請輸入上課地點" required>
              <div class="invalid-feedback">請務必填寫</div>
            </div>

            <div class="form-group">
              <label for="cTime">上課時間</label>
              <select class="form-control" name="cTime" required="">
                <option selected>請選擇時間...</option>
              </select>
              <div class="invalid-feedback">請務必填寫</div>
            </div>

            <div class="form-group">
              <label for="cTotal">人數</label>
              <select class="form-control" name="cTotal" required>
                <option selected="">請選擇人數上限...</option>
              </select>
              <div class="invalid-feedback">請務必填寫</div>
            </div>
          </div>
         
          <div class="confirm">
            <a href="index.php" class="btn btn-outline-secondary" role="button" aria-pressed="true">取消</a>
            <button type="submit" class="btn btn-outline-info">開課</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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
  
  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
</body>

</html>