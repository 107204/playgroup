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

  $cNo = $_POST['cNo'];
  $refer = base64_decode($_POST['refer']);
  if($refer =='nolog'){
    header('Location: login.php');
  } else {
  ?>
  <div class="rounded inside">
    <form action="#" method="post" name="add"> 
      <?php 
      $sql = "SELECT course, city, district, price, agelower, ageupper FROM course WHERE courseNo = '$cNo'";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);

      $sqla = "SELECT userNo, userName, cellphone FROM account WHERE account.cookie = '$refer'";
      $stmta = sqlsrv_query( $conn, $sqla );
      $rowa = sqlsrv_fetch_array( $stmta, SQLSRV_FETCH_NUMERIC);

      ?>
      <input type="hidden" name="cNo" value="<?php echo $cNo; ?>">
      <input type="hidden" name="refer" value="<?php echo $refer; ?>">
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
          <input type="text" class="form-control" name="cName" value="<?php echo $rowa[2];?>" readonly>
        </div>

        <div class="form-group">
          <label for="agelower">上課場次</label>
          <select name="agelower" class="form-control" required>
            <option selected>請選擇上課場次</option>
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
                  ON account.userNo = kid.userNo WHERE account.userNo = $rowa[0]";
          $stmtk = sqlsrv_query( $conn, $sqlk );
          while($rowk = sqlsrv_fetch_array( $stmtk, SQLSRV_FETCH_NUMERIC)){
            $age = round($rowk[2]/12);
          ?>
          <div>
            <input type="checkbox" id="child" name="child[]" value="<?php echo $rowk[0] ?>" onclick="check(this);" />
            <label for="child[]"><?php echo $rowk[1]; ?>&nbsp;&nbsp;<?php echo $age; ?>歲</label>
          </div>
          <?php
          } ?>

        </div>

        <div class="form-group">
          <label for="Note">備註</label>
          <input type="text" class="form-control" name="cName" placeholder="備註需求">
        </div>
        <br>
            
        <div class="form-group">
          <h5 class="pull-left">總金額</h5>
          <div class="pull-right">
            <p align=right>
              <span id="twd">TWD</span>
              <span id="tPrice">200</span>
            </p>
          </div>
        </div>

        <div class="confirm">
          <input type="button" class="btn btn-outline-danger" onclick="history.back()" value="取消">
          <button class="btn btn-outline-info" onclick="checkOut('CREDIT')">付款(下一步)</button>
        </div>
        
        </div>
      </form>
    </div>
  <?php } ?>

  <script>
  function check(elememt){
    var total = 0;
    var price = document.getElementById("price");
    if(element.checked){
      total += price;
      document.getElementById("tPrice").innerHTML = total;
    }
  }
  </script>

  <script src="https://payment-stage.ecpay.com.tw/Scripts/SP/ECPayPayment_1.0.0.js"
   data-MerchantID="2000132"
   data-SPToken="749E6D776D8D42B3ACE8F5462BB806BF "
   data-PaymentType="CREDIT"
   data-PaymentName="信用卡"
   data-CustomerBtn="1" >
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