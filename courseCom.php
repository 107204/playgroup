<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/course.css">
  <link rel="stylesheet" type="text/css" href="css/sidenav.css">
  <link rel="stylesheet" type="text/css" href="css/comment.css">
  <title>Playgroup</title>
</head>

<body>
    <?php
    require 'config.php';
    $old_url = $_SERVER["REQUEST_URI"];
    $check = strpos($old_url, '?');
    if($check !== false){
      $refer=base64_decode($_GET['refer']);
      if($refer== 'nolog'){ ?>
              
        <nav class="navbar navbar-expand-xl navbar-light header-font">
        <a class="navbar-brand float-left" href="index.php">
          <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
          <form action="search.php?refer=<?php echo base64_encode($refer); ?>" method="POST" class="form-inline mr-auto ml-lg-5">
            <div class="input-group">
              <input type="text" class="form-control" name="keyword" placeholder="搜尋" aria-label="search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-info" type="submit"><span class="fas fa-search"/></button>
              </div>
            </div>
          </form>

          <ul class="navbar-nav">
            <li class="nav-item ml-auto">
              <a href="about.php?refer=<?php echo base64_encode($refer); ?>" class="nav-link">
                <i class="fas fa-exclamation-circle"></i>
                <span class="header-font">親子共學</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a href="play.php?refer=<?php echo base64_encode($refer); ?>" class="nav-link">
                <i class="fas fa-paper-plane"></i>
                <span class="header-font">親子共遊</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a href="place.php?refer=<?php echo base64_encode($refer); ?>" class="nav-link">
                <i class="fas fa-map-marker-alt"></i>
                <span class="header-font">場地資訊</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#filter">
                <i class="fas fa-filter"></i>
                <span class="header-font">篩選</span>
              </a>
            </li>
            <li class="nav-item ml-auto">
              <a href="login.php" class="nav-link">
                <i class="fas fa-sign-in-alt"></i>
                <span class="header-font">註冊/登入</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

    <?php 
    }elseif($refer != 'nolog'){ 
      $sql = "SELECT cookie, userPic FROM account WHERE cookie = '$refer'";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC); 
      $user = urlencode($row[0]); 
      $uid = base64_encode($refer); ?>
      <nav class="navbar navbar-light header-font">
        <a class="navbar-brand float-left" href="index.php">
          <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
        </a>
        <a role="button" class="rounded-circle" data-toggle="collapse" data-target="#collapsibleNavbar" onclick="openNav()">
          <img src="<?php echo $row[1]; ?>" class="img-fluid">
        </a>
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <ul class="list-group list-group-flush">
                         
            <form action="search.php?refer=<?php echo $uid; ?>" method="POST" class="form-inline">
              <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="搜尋" aria-label="search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                  <button class="btn btn-outline-info" type="submit"><span class="fas fa-search"/></button>
                </div>
              </div>
            </form>

            <li class="list-group-item">
              <a href="myInfo.php?refer=<?php echo $uid; ?>" class="nav-link">
                <i class="fas fa-user"></i>
                <span class="header-font">會員專區</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="about.php?refer=<?php echo $uid; ?>" class="nav-link">
                <i class="fas fa-exclamation-circle"></i>
                <span class="header-font">親子共學</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="play.php?refer=<?php echo $uid; ?>" class="nav-link">
                <i class="fas fa-paper-plane"></i>
                <span class="header-font">親子共遊</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="place.php?refer=<?php echo base64_encode($refer); ?>" class="nav-link">
                <i class="fas fa-map-marker-alt"></i>
                <span class="header-font">場地資訊</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="#" class="nav-link" data-toggle="modal" data-target="#filter">
                <i class="fas fa-filter"></i>
                <span class="header-font">篩選</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="myOpen.php?refer=<?php echo $uid; ?>" class="nav-link">
                <i class="fas fa-book"></i>
                <span class="header-font">已開課程</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="myApply.php?refer=<?php echo $uid; ?>" class="nav-link">
                <i class="far fa-calendar-check"></i>
                <span class="header-font">已報課程</span>
              </a>
            </li>
            <li class="list-group-item">
              <a href="logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span class="header-font">登出</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
                  
    <?php 
      } 
    }else{
      require 'insession.php';
    } ?>


    <?php
      require 'config.php';
      $cNo=$_GET['cNo'];
      
      $sql = "SELECT course.courseNo, course, city, district, address, agelower, ageupper, courseDesc, 
              price, dueday, coursePic, userName, teacher.teaName, teaDesc FROM account INNER JOIN (course INNER JOIN 
              teacher ON course.teaNo = teacher.teaNo) ON account.userNo = course.userNo WHERE course.courseNo = $cNo";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100 headerPic" src="<?php echo $row[10]; ?>" alt="First slide">
        </div>
      </div>
    </div>
  
    <div class="row">
      <div class="col-md-8 corseinfo">
        <h1 class="title-font"><?php echo $row[1]; ?></h1>
        <div id="bi_space"></div>

        <div class="infodetail">
          <div class="col-sm-8 cfont">
            <i class="fas fa-user"></i>
            開課家長：
            <span><?php echo $row[11]; ?></span>
          </div>
        </div>

        <div class="infodetail">
          <div class="col-sm-8 cfont">
            <i class="fas fa-child"></i>
            適讀年齡：
            <span><?php echo $row[5].'歲 - '.$row[6].'歲'; ?></span>
          </div>
        </div>

        <div class="infodetail">
          <div class="col-sm-8 cfont">
            <i class="fas fa-map-marker-alt"></i>
            上課地點：
            <span><?php echo $row[2].$row[3].$row[4]; ?></span>
          </div>
        </div>

        <div class="infodetail">
          <div class="col-sm-8 cfont">
            
            <?php
            $sql1 = "SELECT courseDate, startTime, endTime, enLimit, enSum, DATEPART(hh, startTime), RIGHT('0' + CAST(DATEPART(n, startTime) AS VARCHAR),2), DATEPART(hh, endTime), RIGHT('0' + CAST(DATEPART(n, endTime) AS VARCHAR),2) FROM courseTime WHERE courseNo = '".$cNo."'";
            $stmt1 = sqlsrv_query( $conn, $sql1 );
            while( $row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_NUMERIC) ){ ?>
            <i class="fas fa-calendar-alt"></i>
            上課場次：
            <span><?php echo $row1[0].' '.$row1[5].':'.$row1[6].'-'.$row1[7].':'.$row1[8]; ?></span>
            <span>&nbsp;人數：<?php echo $row1[4].'/'.$row1[3]; ?></span><br/>
            <?php } ?>
          </div>
        </div>

        <div id="bi_space"></div>

        <div class="infodetail">
          <p><?php echo $row[7]; ?></p>
        </div>

        <hr />
        <div id="tr_space"></div>

        <p class="subtitle-font">教師資訊</p>
        
        <div class="infodetail">
          <div class="col-sm-8 cfont">
            <i class="fas fa-chalkboard-teacher"></i>
            教師：
            <span><?php echo $row[12]; ?></span>
          </div>
        </div>

        <div id="tr_space"></div>

        <div class="infodetail">
          <p><?php echo $row[13]; ?></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="hframe border">
          <div class="row">
            <div class="applyl">
              <span>評分</span>
            </div>
          </div>
          <div id="hf_space"></div> 

          
          <?php
           $cNo=$_GET['cNo'];
           $refer=base64_decode($_GET['refer']);
      
            $sqlc = "SELECT score, comment FROM (score INNER JOIN account ON score.userNo = account.userNo) INNER JOIN 
                     course ON score.courseNo = course.courseNo WHERE course.courseNo = $cNo AND cookie = '$refer'";
            $stmtc = sqlsrv_query( $conn, $sqlc );
            if(sqlsrv_has_rows($stmtc)){
              $rowc = sqlsrv_fetch_array( $stmtc, SQLSRV_FETCH_NUMERIC);
              ?>
              <p id="price"><?php echo $rowc[0]; ?></p>
              <div class="form-group">
                <label for="teaDesc">評論</label>
                <textarea class="form-control" name="comment" rows="3" readonly><?php echo $rowc[1]; ?></textarea>
              </div>
            <?php
            }else{
            ?> 
          <form action="inComment.php" method="POST">
            <div class="star-rating">
              <input id="star-5" type="radio" name="rating" value="5" required>
              <label for="star-5" title="5 stars">
                  <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-4" type="radio" name="rating" value="4" required>
              <label for="star-4" title="4 stars">
                  <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-3" type="radio" name="rating" value="3" required>
              <label for="star-3" title="3 stars">
                  <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-3" type="radio" name="rating" value="3" required>
              <label for="star-3" title="3 stars">
                  <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
              <input id="star-1" type="radio" name="rating" value="1" required>
              <label for="star-1" title="1 star">
                  <i class="active fa fa-star" aria-hidden="true"></i>
              </label>
            </div>
            <div class="form-group">
              <label for="teaDesc">評論</label>
              <textarea class="form-control" name="comment" rows="3" placeholder="請輸入評論"></textarea>
            </div>
            <?php
            $sqlu = "SELECT userNo FROM account WHERE cookie = '$refer'";
            $stmtu = sqlsrv_query( $conn, $sqlu );
            $rowu = sqlsrv_fetch_array( $stmtu, SQLSRV_FETCH_NUMERIC) or die('no');
            ?>

            <input type="hidden" name="cNo" value="<?php echo $cNo; ?>">
            <input type="hidden" name="userNo" value="<?php echo $rowu[0]; ?>">
            <input type="hidden" name="refer" value="<?php echo $refer; ?>">
            <button type="submit" class="btn btn-outline-info btn-block pricebtn">評論</button>
            <?php
            }
            ?>
          </form>
        </div>
      </div>
    </div>

  
  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("fab").style.visibility = "hidden";
    document.getElementById("cindicators").style.visibility = "hidden";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("fab").style.visibility = "visible";
    document.getElementById("cindicators").style.visibility = "visible";
  }
  </script>

  

  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  <script src='//static.codepen.io/assets/common/stopExecutionOnTimeout-41c52890748cd7143004e05d3c5f786c66b19939c4500ce446314d1748483e13.js'></script><script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script src='//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

  <script type="text/javascript">
$(document).ready(function(){
  $(".editor-header a").click(function(e){
    e.preventDefault();

    var _val = $(this).data("role"),
        _sizeValIn = parseInt($(this).data("size-val") + 1),
        _sizeValRe = parseInt($(this).data("size-val") - 1),
        _size = $(this).data("size");
    if(_size == "in-size"){
      document.execCommand(_val, false, _sizeValIn + "px");
    } else{
      document.execCommand(_val, false, _sizeValRe + "px");
    }
  });
});

$(document).ready(function(){
  var $text = $("#text"),
      $submit = $("input[type='submit']"),
      $listComment = $(".list-comments"),
      $loading = $(".loading"),
      _data,
      $totalCom = $(".total-comment");

  $totalCom.text($(".list-comments > div").length);

  $($submit).click(function(){
    if($text.html() == ""){
      alert("Plesea write a comment!");
      $text.focus();
    } else{
      _data = $text.html();
      $.ajax({
        type: "POST",
        url: window.local,
        data: _data,
        cache: false,
        success: function(html){
          $loading.show().fadeOut(300);
          $listComment.append("<div>"+_data+"</div>");
          $text.html("");
          $totalCom.text($(".list-comments > div").length);
        }
      });
      return false;
    }
  });
});
  </script>
</body>

</html>