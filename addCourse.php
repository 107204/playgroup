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
  <nav class="navbar navbar-expand-xl navbar-light header-font">
    <a href="index.php" class="navbar-brand float-left">
      <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
    </a>
  </nav>

  <div class="enroll">
    <div class="container-fluid outside">
      <div id="tr_space"></div>
      <p class="title-font">開一門好課</p>
      
      <div class="rounded inside">
        <form action="post.php" method="post" name="add" class="add" enctype="multipart/form-data">

            <?php $uid = base64_decode($_GET['refer']); ?> 
            <input type="hidden" name="uid" value="<?php echo $uid; ?>">

            <div class="form-group">
              <label for="cName">課程名稱</label>
              <input type="text" class="form-control" name="cName" placeholder="請輸入課程名稱" required>
            </div>

            <div class="form-group">
              <label for="price">價格</label>
              <input type="number" class="form-control" name="price" placeholder="請輸入價格" required>
            </div>

            <div class="form-group">
              <label for="cDesc">課程介紹</label>
              <textarea class="form-control" name="cDesc" rows="5" placeholder="請輸入課程介紹" required></textarea>
            </div>

            <div class="form-group">
              <label for="tName">教師</label>
              <input type="text" class="form-control" name="tName" placeholder="請輸入教師姓名">
            </div>

            <div class="form-group">
              <label for="tCellphone">教師連絡電話</label>
              <input type="text" class="form-control" name="tCellphone" placeholder="請輸入教師姓名">
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="agelower">適讀年齡</label>
                <select name="agelower" class="form-control" required>
                  <option selected>最小年齡...</option>
                  <option>0.5</option><option>1.0</option>
                  <option>1.5</option><option>2</option>
                  <option>3</option><option>4</option>
                  <option>5</option><option>6</option>
                  <option>7</option><option>8</option>
                  <option>9</option><option>10</option>
                  <option>11</option><option>12</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="ageupper">&nbsp;</label>
                <select name="ageupper" class="form-control" onchange="checkage()"required>
                  <option selected>最大年齡...</option>
                  <option>0</option><option>1</option>
                  <option>2</option>
                  <option>3</option><option>4</option>
                  <option>5</option><option>6</option>
                  <option>7</option><option>8</option>
                  <option>9</option><option>10</option>
                  <option>11</option><option>12</option>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="city">上課地點</label>
                <input type="text" class="form-control" name="city" placeholder="縣市" required>
              </div>
              <div class="form-group col-md-6">
                <label for="district">&nbsp;</label>
                <input type="text" class="form-control" name="district" placeholder="鄉鎮市區" required>
              </div>
              <div class="form-group col-md-12">
                <label for="address">&nbsp;</label>
                <input type="text" class="form-control" name="address" placeholder="街道路名" required>
              </div>
            </div>
            

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="cDate">上課場次</label>
                <input type="date" class="form-control" name="cDate" placeholder="上課日期" required>
              </div>
              <div class="form-group col-md-4">
                <label for="sTime">上課時間</label>
                <input type="time" class="form-control" name="sTime" required>
              </div>
              <div class="form-group col-md-4">
                <label for="etime">下課時間</label>
                <input type="time" class="form-control" name="eTime" required>
              </div>
            </div>

            <div class="form-group">
              <label for="cTotal">人數</label>
              <input type="number" class="form-control" name="price" placeholder="請輸入人數上限" required>
            </div>

            <div class="form-group">
              <label for="due">報名期限</label>
              <input type="date" class="form-control" name="due" required>
            </div>
              
            <div class="form-group">
              <label for="image">上傳圖片</label>
              <input type="file" id="file" name="image" onchange="openFile(event)" multiple>
              <div id="result"></div>
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
  function openFile(event){
    var result=document.getElementById("result"); 
    var input = event.target; //取得上傳檔案

    for(i = 0; i< input.files.length; i ++) {
        var reader = new FileReader();  //建立FileReader物件  
        reader.readAsDataURL(input.files[i]); //以.readAsDataURL將上傳檔案轉換為base64字串 
        reader.onload=function(e){
          result.innerHTML = result.innerHTML + '<img src="' + this.result +'" class="img" alt="" />';  
        }
    }
  }
  </script>

  <script>
  function checkage(){
    var p1=document.form1.pwd1.value;
    var p2=document.form1.pwd2.value;

    if(p1!=p2){
      alert("兩次密碼不相符，請重新輸入");
      document.form1.pwd1.focus();
      return false;
    }
  }
  </script>

  
  
  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
</body>

</html>