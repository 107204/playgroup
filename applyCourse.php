<!DOCTYPE html>
<html lang="zh-tw">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/enroll.css">
  <link rel="stylesheet" type="text/css" href="css/apply.css">
  <title>Playgroup</title>
</head>

<body class="enroll">
  <nav class="navbar navbar-light bg-light header">
    <a class="navbar-brand float-left" href="index.php">
      <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
    </a>
  </nav>

  <div class="enroll">
    <div class="container-fluid outside">
      <div id="tr_space"></div>
      <p class="title-font">報名課程</p>
    </div>
  </div>

  <?php
  require 'config.php';

  $k = 1;
  $price = 0;
  $cNo = $_POST['cNo'];
  $refer = base64_decode($_POST['refer']);
  if($refer =='nolog'){
    header('Location: login.php');
  } else {
  ?>
  <div class="rounded inside">
    <form action="checkApply.php" method="post" name="add"> 
      <?php 
      $sql = "SELECT course, city, district, price, agelower, ageupper FROM course WHERE courseNo = '$cNo'";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
      $price = $row[3];

      $sqla = "SELECT cellphone, userName, cellphone FROM account WHERE account.cookie = '$refer'";
      $stmta = sqlsrv_query( $conn, $sqla );
      $rowa = sqlsrv_fetch_array( $stmta, SQLSRV_FETCH_NUMERIC);

      ?>
      <input type="hidden" name="cNo" value="<?php echo $cNo; ?>">
      <input type="hidden" name="refer" value="<?php echo $refer; ?>">
      <input type="hidden" id="total" name="total" value="0">
      <input type="hidden" name="cellphone" value="<?php echo $rowa[2]; ?>">

      <div class="container-fluid">
        <div class="card-deck">
          <div class="card-body">
            <h3><?php echo $row[0];?></h3>
            <div id="DIV1">
              <i class="fas fa-map-marker-alt" width="18" height="18" style="color: #33D4C6;"></i>
            </div>
            <p id="city"><?php echo $row[1];?>&nbsp;<?php echo $row[2];?></p>
            <p align=right>
              <span id="twd">TWD</span>
              <span id="price"><?php echo $row[3];?></span>
            </p>
          </div>
        </div>

        <div class="form-group">
          <label for="pName">家長名稱</label>
          <p>
            <span id="parentsImg"><img src="pic/Oval.png" width="50"></span>
            <span id="parents"><?php echo $rowa[1];?></span>
          </p>
        </div>

        <div class="form-group">
          <label for="pPhone">聯絡電話</label>
          <input type="text" class="form-control" name="cName" value="<?php echo $rowa[2];?>">
        </div>

        <div class="form-group">
          <label for="courseTime">上課場次</label>
          <select name="courseTime" class="form-control" required>
            <?php
            $sqlp = "SELECT courseDate, startTime, endTime, enLimit, enSum, DATEPART(hh, startTime), RIGHT('0' + CAST(
                     DATEPART(n, startTime) AS VARCHAR),2), DATEPART(hh, endTime), RIGHT('0' + CAST(DATEPART(n, endTime) 
                     AS VARCHAR),2), timeNo FROM courseTime WHERE courseNo = '$cNo'";
            $stmtp = sqlsrv_query( $conn, $sqlp );
            while( $rowp = sqlsrv_fetch_array( $stmtp, SQLSRV_FETCH_NUMERIC) ){ 
              if($rowp[3] != $rowp[4]){
            ?>
                <option value="<?php echo $rowp[9]; ?>">
                <?php echo $rowp[0].' '.$rowp[5].':'.$rowp[6].'-'.$rowp[7].':'.$rowp[8].'    人數:'.$rowp[4].'/'.$rowp[3];
              } 
            }?></option>
          </select>
        </div>

        <div class="form-group">
          <label for="pTotal">上課孩童</label>
          
          <?php
          $sqlk = "SELECT kidNo, kidName, DATEDIFF (MONTH , kidBirth, GETDATE())FROM account INNER JOIN kid 
                  ON account.cellphone = kid.cellphone WHERE account.cellphone = $rowa[0]";
          $stmtk = sqlsrv_query( $conn, $sqlk );
          
          while($rowk = sqlsrv_fetch_array( $stmtk, SQLSRV_FETCH_NUMERIC)){
            $age = round($rowk[2]/12);
          ?>
          <div>
            <input type="checkbox" id="child<?php echo $k;?>" name="child[]" value="<?php echo $rowk[0]; ?>" onclick="myFunction()">
            <label for="child[]"><?php echo $rowk[1]; ?>&nbsp;&nbsp;<?php echo $age; ?>歲</label>
          </div>
          <?php
          $k++;
           } ?>

        </div>

        <div class="form-group">
          <label for="note">備註</label>
          <input type="text" class="form-control" name="note" placeholder="備註需求" >
        </div>
        <br>
            
        <div class="form-group">
          <h5 class="pull-left">總金額</h5>
          <div class="pull-right">
            <p align=right>
              <span id="twd">TWD</span>
              <span id="tPrice">0</span>
            </p>
          </div>
        </div>

        <div class="confirm">
          <input type="button" class="btn btn-outline-danger" onclick="history.back()" value="取消">
          <button type="submit" class="btn btn-outline-info">下一步</button>
        </div>
        
        </div>
      </form>
    </div>
  <?php } ?>

  <script>
  function myFunction() {
    var h = <?php echo $k; ?>;
    var price = parseInt(<?php echo $price; ?>);
    var total= 0;
    var count = 0;
    // var total= parseInt(document.getElementById("tPrice").textContent);
    
    s1 = document.getElementById("child1");
    s2 = document.getElementById("child2");
    s3 = document.getElementById("child3");
    
    if (s1.checked ){
      if(s2.checked){
        count = 2;
      }else if(!s2.checked){
        count = 1;
      }
    }else if(!s1.checked){
      if(s2.checked){
       count = 1;
      }else if(!s2.checked){
        count = 0;
      }
    }
      total = total+count*price;
      document.getElementById("tPrice").innerHTML = total;
      document.getElementById("total").value = total;
    
  }
  </script>

  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
  <script>
  function ask(){
   if(confirm("要取消報名嗎？")){}
  }
  </script>
</body>

</html>