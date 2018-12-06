<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="css/sidenav.css">
  <link rel="stylesheet" type="text/css" href="css/myInfo.css">
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
  $refer = base64_decode($_GET['refer']);
  if($refer =='nolog'){
    header('Location: login.php');
  } 

  $sql = "SELECT cellphone, userName, cellphone, email, userPic, pos FROM account WHERE cookie = '$refer'";
  $stmt = sqlsrv_query( $conn, $sql );
  $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
  ?>
   
  <div class="sttngs">
    <h2>會員專區</h2>
    <div class="tabordion">
      <section id="section1">
        <input class="t" type="radio" name="sections" id="option1" checked>
        <label for="option1" class="trr">個人資訊</label>
        <article>
  
          <div class="frm">     
          
            <div id='profile-upload'>
              <!-----更換頭像 
              <div class="hvr-profile-img">
                <input type="file" name="logo" id="getval" class="upload">
              </div>
              !---->
              <p>
                <span id="parentsImg"><img src="<?php echo $row[4] ?>" width="230"></span>
              </p>
            </div>

            <div class="tr">
    	       <label class="label" for="input">姓名</label>
    	       <input class="input" type="text"  name="name" value="<?php echo $row[1] ?>">
    	
    		      <label class="label" for="input">聯絡電話</label>	
              <input class="input" type="text" name="cellphone" value="<?php echo $row[2] ?>">

              <label class="label" for="input">email</label>  
              <input class="input" type="text" name="email" value="<?php echo $row[3] ?>">

              <label class="label" for="input">身份</label> 
              <?php if($row[5]=='1'){ ?>
                <input class="input" type="text" name="pos" value="<?php echo '家長' ?>" readonly>
              <?php }elseif($row[5]=='2'){ ?>
                <input class="input" type="text" name="pos" value="<?php echo '教師' ?>" readonly>
              <?php }elseif($row[5]=='3'){ ?>
                <input class="input" type="text" name="pos" value="<?php echo '家長及教師' ?>" readonly>
              <?php } ?>

              <label class="label" for="input">密碼</label>
              <input class="btn btn-outline-secondary" role="button" value="更改密碼"></button> 
            </div>

            <div class="tr wwq">
              <!-- <label class="label" for="input">current Password</label> 
              <input class="input e" type="password" id="input">

              <label class="label" for="input">new password</label> 
              <input class="input e" type="password" id="input">
                  
              <label class="label" for="input">repeat password</label>  
              <input class="input e" type="password" id="input"> -->

            </div> 	
    	
        	  <!--textarea class="textarea" id="textarea"></textarea--> 	
          
            <!--div class="social">
          	  <label class="label" for="input">WEBSITE</label>	
        	    <input class="input e" type="text" id="input">
            </div-->
            
            <button class="btn-outline-info">更新</button> 
          </div>
        </article>
      </section>

      <?php if($row[5]=='1'){ ?>
        <section id="section2">   
        <input class="t" type="radio" name="sections" id="option2">
        <label for="option2" class="trr"> 小孩資訊</label>
        <article>
        <?php
        $sqlk = "SELECT kidNo, kidName, kidBirth FROM account INNER JOIN kid 
                ON account.cellphone = kid.cellphone WHERE account.cellphone = $row[0]";
        $stmtk = sqlsrv_query( $conn, $sqlk );
        while($rowk = sqlsrv_fetch_array( $stmtk, SQLSRV_FETCH_NUMERIC)){
        ?>
          <div class="frm">
            <div class="tr">
              <input type="hidden" name="kidNo" value="<?php echo $rowk[0]; ?>">

              <label class="label" for="input">小孩姓名</label> 
              <input class="input" type="text" id="kidname" value="<?php echo $rowk[1]; ?>">

              <label class="label" for="input">小孩生日</label> 
              <input class="input" type="birth" id="kidbirth" value="<?php echo $rowk[2]; ?>">
            </div>

          <?php } ?>
            <button class="btn-outline-info">更新</button>
          </div>
        </article>
      </section>

      <?php 
      }elseif($row[5]=='2'){ ?>

        <section id="section2">
        <input class="t" type="radio" name="sections" id="option3">
        <label for="option3" class="trr">教師資訊</label>
        <article>
          <div class="frm">
            <div class="tr">
              <label class="label" for="textarea">教學經歷 <p id="count">500 character left</p></label> 
              <textarea class="textarea e" rows="7" cols="25" id="bio" maxlength="500" ></textarea>
            </div>
            <button class="btn-outline-info">更新</button>
          </div>
        </article>
      </section>

      <?php }elseif($row[5]=='3'){ ?>

        <section id="section2">   
          <input class="t" type="radio" name="sections" id="option2">
          <label for="option2" class="trr"> 小孩資訊</label>
          <article>
            <div class="frm">
              <div class="tr">
                <label class="label" for="input">小孩姓名</label> 
                <input class="input" type="text" id="kidname"  value="Andy">

                <label class="label" for="input">小孩生日</label> 
                <input class="input" type="birth" id="kidbirth" value="2005.05.05">
              </div>
              <button class="btn-outline-info">更新</button>
            </div>
          </article>
        </section>

        <section id="section3">
          <input class="t" type="radio" name="sections" id="option3">
          <label for="option3" class="trr">教師資訊</label>
          <article>
            <div class="frm">
              <div class="tr">
                <label class="label" for="textarea">教學經歷 <p id="count">500 character left</p></label> 
                <textarea class="textarea e" rows="7" cols="25" id="bio" maxlength="500" ></textarea>
              </div>
              <button>更新</button>
            </div>
          </article>
        </section>

      <?php } ?>


      <section id="section4">
        <input class="t" type="radio" name="sections" id="option4">
        <label for="option4" class="trr">我的收藏</label>
        <article>
          <!-- <div class="frm"> -->
            <div class="tr">
              <div class="card-deck">
              <?php
              $sqlc = "SELECT course.courseNo, course, city, district, price, coursePic FROM course 
                       INNER JOIN collection ON course.courseNo = collection.courseNo WHERE collection.cellphone = $row[0]";
              $stmtc = sqlsrv_query( $conn, $sqlc );
              if(sqlsrv_has_rows($stmtc)){
                while($rowc = sqlsrv_fetch_array( $stmtc, SQLSRV_FETCH_NUMERIC)){;?>

                  <div class="col-xs-12 col-md-6 col-lg-6 courseitem">
                    <a href="course.php?refer='.$refer.'&cNo='.$row[0].'">
                      <div class="card">
                        <img class="card-img-top" src="<?php echo $rowc[5]; ?>" alt="Card image cap">
                        <div class="card-body">
                          <h3><?php echo $rowc[1]; ?></h3>
                          <div id="DIV1">
                            <i class="fas fa-map-marker-alt" width="18" height="18" style="color: #33D4C6;"></i>
                          </div>
                          <p id="city"><?php echo $rowc[2]; ?> &nbsp; <?php echo $rowc[3]; ?></p>
                          <p align=right>
                            <span id="twd">TWD</span> 
                            <span id="price"><?php echo $rowc[4]; ?></span>
                          </p>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php }
              }else{ ?>
                <div class="noresult">
                  <i class="fas fa-exclamation-circle"></i>
                  尚未收藏課程
                </div>
              <?php } ?>
            </div>
          </div>
          <!-- </div> -->
        </article>
      </section>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filterlLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">篩選</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?php
        $old_url = $_SERVER["REQUEST_URI"];
        $check = strpos($old_url, '?');
        if($check !== false){

          $refer=$_GET['refer']; ?>
            <form action="filter.php?refer=<?php echo $refer; ?>" method="POST">
              <div class="modal-body">
                <div class="btn-group-toggle" data-toggle="buttons">
                  <p>縣市</p>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="keelung" autocomplete="off" value="基隆市">基隆市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="taipei" autocomplete="off" value="台北市">台北市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="newtaipei" autocomplete="off" value="新北市">新北市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="桃園縣">桃園縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="新竹市">新竹市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="新竹縣">新竹縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="苗栗縣">苗栗縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="臺中市">臺中市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="彰化縣">彰化縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="南投縣">南投縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="雲林縣">雲林縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="嘉義市">嘉義市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="嘉義縣">嘉義縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="臺南市">臺南市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="高雄市">高雄市
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="屏東縣">屏東縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="臺東縣">臺東縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="花蓮縣">花蓮縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="宜蘭縣">宜蘭縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="澎湖縣">澎湖縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="金門縣">金門縣
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="radio" name="city" id="option3" autocomplete="off" value="連江縣">連江縣
                  </label>
                </div>

                <hr/>

                <p>價格</p>
                <div class="form-row">
                  <div class="form-group col-5">
                    <input type="text" class="form-control" name="lower" placeholder="最低價格">
                  </div>
                  <span style="text-align: center;"> - </span>
                  <div class="form-group col-5">
                    <input type="text" class="form-control" name="higher" placeholder="最高價格">
                  </div>
                  <span id="dol"> 元 </span>
                </div>

                <hr/>

                <div class="btn-group-toggle" data-toggle="buttons">
                  <p>課程主題</p>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="語文">語文
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="音樂">音樂
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="體育">體育
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="美術">美術
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="舞蹈">舞蹈
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="科學">科學
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="手作">手作
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="遊戲">遊戲
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" id="option3" autocomplete="off" value="家政">家政
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="聚會">聚會
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="戶外活動">戶外活動
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="程式設計">程式設計
                  </label>
                  <label class="btn btn-outline-secondary">
                    <input type="checkbox" name="cate[]" autocomplete="off" value="其他">其他
                  </label>
                </div>
                
                <div id="tr_space"></div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">尋找</button>
              </div>
          </form>
        <?php } ?>
      </div>
    </div>
  </div>


  <script>
  $("document").ready(function () {
    var textmax=500;
    $("#count").text(textmax + ' character left');
    $("#bio").keyup(function(){
      var userlenght= $("#bio").val().length;
      var remain= textmax - userlenght ;
      $("#count").text(remain + ' characters left');   
    });  
  });


  document.getElementById('getval').addEventListener('change', readURL, true);
  function readURL(){
      var file = document.getElementById("getval").files[0];
      var reader = new FileReader();
      reader.onloadend = function(){
          document.getElementById('profile-upload').style.backgroundImage = "url(" + reader.result + ")";        
      }
      if(file){
          reader.readAsDataURL(file);
      }else{
    }
  }

  $(function () {
    var $text = $('#texte');
    var $input = $('.texte');
    $input.on('keydown', function () {
      setTimeout(function () {
        $text.html($input.val());
      }, 0);
    });
  })

  
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



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</body>

</html>
