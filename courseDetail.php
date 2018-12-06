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
          <img src="http://140.131.114.155/playgroup/pic/Oval.png" class="img-fluid">
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
  }  ?>

  
  <?php
    require 'config.php';
    $cNo=$_GET['cNo'];
      
    $sql = "SELECT course.courseNo, course, city, district, address, agelower, ageupper, courseDesc, 
            price, dueday, userName, teacher.teaName, teaDesc, coursePic FROM account INNER JOIN (course INNER JOIN teacher 
            ON course.teaNo = teacher.teaNo) ON account.cellphone = course.cellphone WHERE course.courseNo = '".$cNo."'";
    $stmt = sqlsrv_query( $conn, $sql );
    $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
  ?>
  

  <!--Carousel-->
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 headerPic" src="<?php echo $row[13]; ?>" alt="First slide">
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
          <span><?php echo $row[10]; ?></span>
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
          $sql1 = "SELECT courseDate, startTime, endTime, enLimit, enSum, DATEPART(hh, startTime), RIGHT('0' + CAST(DATEPART(n, startTime) AS VARCHAR),2), DATEPART(hh, endTime), RIGHT('0' + CAST(DATEPART(n, endTime) AS VARCHAR),2) FROM courseTime WHERE courseNo = '$cNo'";
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
          <span><?php echo $row[11]; ?></span>
        </div>
      </div>

      <div id="tr_space"></div>

      <div class="infodetail">
        <p><?php echo $row[12]; ?></p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="hframe border">
        <div class="row">
          <div class="applyl">
            <span>價格</span>
          </div>
          <div class="applyr">
            <span id="twd">TWD</span>
            <span id="price"><?php echo $row[8]; ?></span>
          </div>
        </div>
        <div id="hf_space"></div> 
        <?php 
        $old_url = $_SERVER["REQUEST_URI"];
        $check = strpos($old_url, '?');
        if($check !== false){
          $refer=$_GET['refer']; 
          ?>
          <form action="#" method="post" name="applyl">
            <input type="hidden" name="cNo" value="<?php echo $cNo; ?>">
            <input type="hidden" name="refer" value="<?php echo $refer; ?>">
            <button type="submit" class="btn btn-outline-info btn-block pricebtn">完成課程</button>
          </form>

            <form action="student.php" method="post" name="student"> 
              <input type="hidden" name="cNo" value="<?php echo $cNo; ?>">
              <input type="hidden" name="refer" value="<?php echo $refer; ?>">
              <button type="submit" class="btn btn-outline-danger collectbtn">學生資訊</button>
            </form>
        <?php } ?>
        
      </div>
    </div>
  </div>

  <div class="footer">
    <img src="pic/about/4.png" class="img-fluid" alt="Responsive image">
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
</body>

</html>