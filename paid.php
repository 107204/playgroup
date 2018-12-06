<!DOCTYPE html>
<html lang="zh-tw">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/login.css">
      <title>Playgroup</title>
    </head>
    <?php
        // 付款結果通知
        require('ECPay.Payment.Integration.php');
        try {
            // 收到綠界科技的付款結果訊息，並判斷檢查碼是否相符
            $AL = new ECPay_AllInOne();
            $AL->MerchantID = '2000214';
            $AL->HashKey = '5294y06JbISpM5x9';
            $AL->HashIV = 'v77hoKGq4kWxNNIS';
            // $AL->encryptType = ECPay_EncryptType::ENC_MD5; // MD5
            $AL->EncryptType = ECPay_EncryptType::ENC_SHA256; // SHA256
            $AL->CheckOutFeedback();

             // 在網頁端回應 1|OK

            include 'config.php';
            $orderNo = $_POST['MerchantTradeNo'];
            $sql = "UPDATE enroll SET paid = 1 WHERE orderNo = '$orderNo'";
            $params = array(1, "some data");
            $stmt = sqlsrv_query( $conn, $sql, $params);

            $sql1 = "SELECT cookie FROM account INNER JOIN enroll ON account.cellphone = enroll.cellphone
                     WHERE orderNo = '$orderNo'";
            $stmt1 = sqlsrv_query( $conn, $sql1 );
            $row1 = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_NUMERIC);
            $refer = base64_encode($row1[0]);
            ?>
            <body class="login">
              <nav class="navbar navbar-light bg-light header">
                <a class="navbar-brand float-left" href="index.php">
                  <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
                </a>
              </nav>
              <meta http-equiv="refresh" content="3;url=http://140.131.114.155/playgroup/myApply.php?refer=<?php echo $refer; ?>" />
              <div class="enroll">
                <div class="container-fluid">
                  <div id="tr_space"></div>
                  <p class="title-font"></p>
                  <div class="rounded inside">
                    <div class="text-center">
                      <img src="http://140.131.114.155/playgroup/pic/logo.png" class="logo">
                      <p class="trade">交易完成</p>
                      <br>
                      <p class="info">3秒後將自動跳轉，如果網頁沒有自動跳轉請點此</p>
                      <a href="index.php?refer=<?php echo $refer; ?>" role="button" class="btn btn-outline-danger">回首頁</a>
                    </div>
                  </div>
                </div>
              </div>
            </body>
    <?php
        } catch(Exception $e) {
            echo '0|' . $e->getMessage();
        }
    ?>

      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js " integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo " crossorigin="anonymous "></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js " integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49 " crossorigin="anonymous "></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js " integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T " crossorigin="anonymous "></script>
    </body>

</html>