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
      <p class="title-font"></p>
    </div>
  </div>

  <?php
  require 'config.php';

  $cNo = $_POST['cNo'];
  $cellphone = $_POST['cellphone'];
  $refer = $_POST['refer'];
  $total = $_POST['total'];
  $time = $_POST['courseTime'];
  $child = $_POST['child'];
  $c_num = count($child);
  $orderNo = (int)$refer +(int)$cNo+time();
  if(empty($_POST['note'])){
    $note = '無備註';
  }else{
    $note = $_POST['note'];
  }

  ?>
  <div class="rounded inside">
    <form id="idFormAioCheckOut" method="post" action="ecpay.php"> 
      <?php 
      $sql = "SELECT course, city, district, price FROM course WHERE courseNo = '$cNo'";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);

      $sqla = "SELECT cellphone, userName FROM account WHERE account.cookie = '$refer'";
      $stmta = sqlsrv_query( $conn, $sqla );
      $rowa = sqlsrv_fetch_array( $stmta, SQLSRV_FETCH_NUMERIC);

      $sqlp = "SELECT courseDate, startTime, endTime, DATEPART(hh, startTime), RIGHT('0' + CAST(
               DATEPART(n, startTime) AS VARCHAR),2), DATEPART(hh, endTime), RIGHT('0' + CAST(DATEPART(n, endTime) 
               AS VARCHAR),2) FROM courseTime WHERE timeNo = '$time'";
      $stmtp = sqlsrv_query( $conn, $sqlp );
      $rowp = sqlsrv_fetch_array( $stmtp, SQLSRV_FETCH_NUMERIC);

      for($i = 0; $i < $c_num; $i++){
        ${'k'.$i} = $child[$i];
        echo '<input type="hidden" name="child[]" value="'.${'k'.$i}.'">';
      }
      
      ?>
      <input type="hidden" name="cNo" value ="<?php echo $cNo; ?>">
      <input type="hidden" name="cellphone" value ="<?php echo $cellphone; ?>">
      <input type="hidden" name="ItemName" value="<?php echo $row[0]; ?>">
      <input type="hidden" name="TotalAmount" value="<?php echo $total; ?>">
      <input type="hidden" name="MerchantTradeNo" value="<?php echo $orderNo; ?>">
      <input type="hidden" name="time" value="<?php echo $time; ?>">
      <input type="hidden" name="Price" value="<?php echo $row[3]; ?>">
      <input type="hidden" name="TradeDesc" value="<?php echo $note; ?>">
      <input type="hidden" name="Quantity" value="<?php echo $c_num; ?>">
      <input type="hidden" name="ReturnURL" value="http://140.131.114.155/playgroup/paid.php">


      <!-- <div class="container-fluid"> -->
      <h1>確認資料</h1>
      
      <div class="table-responsive">
        <table class="table">
          <tbody>
            <tr>
              <th scope="row">課程名稱</th>
              <td><?php echo $row[0];?></td>
            </tr>
            <tr>
              <th scope="row">價格</th>
              <td><?php echo $row[3]; ?></td>
            </tr>
            <tr>
              <th scope="row">報名家長</th>
              <td><?php echo $rowa[1]; ?></td>
            </tr>
            <tr>
              <th scope="row">連絡電話</th>
              <td><?php echo $rowa[0]; ?></td>
            </tr>
            <tr>
              <th scope="row">報名場次</th>
              <td><?php echo $rowp[0].' '.$rowp[3].':'.$rowp[4].'-'.$rowp[5].':'.$rowp[6]; ?></td>
            </tr>
            <tr>
              <th scope="row">報名人數</th>
              <td><?php echo $c_num; ?></td>
            </tr>
            <tr>
              <th scope="row">報名孩童</th>
              <td>
                <?php for($i = 0; $i < $c_num; $i++){
                $sqlk = "SELECT kidName FROM kid WHERE kidNo = '$child[$i]'";
                $stmtk = sqlsrv_query( $conn, $sqlk );
                $rowk = sqlsrv_fetch_array( $stmtk, SQLSRV_FETCH_NUMERIC);
                ${'k'.$i} = $rowk[0];?>
                <?php echo ${'k'.$i}.'<br>'; ?>
                <?php } ?>
              </td>
            </tr>
            <tr>
              <th scope="row">總金額</th>
              <td style="color: #20B2AA;font-weight: 1000;font-size:1.3rem;"><?php echo $total; ?></td>
            </tr>
          </tbody>
        </table>
        <hr/>
      </div>


      

      <div class="confirm">
        <input type="button" class="btn btn-outline-danger" onclick="history.back()" value="上一步">
        <button class="btn btn-outline-info">確認付款</button>
      </div>
        
      </div>
    </form>
  </div>

  <script>
  function ask(){
   if(confirm("確定報名嗎？按下確認即完成報名")){}
  }
  </script>


  <!--script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
</body>

</html>