
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

  <?php
  require 'config.php';

  $cNo = $_POST['cNo'];
  $refer = base64_decode($_POST['refer']);
  if($refer =='nolog'){
    header('Location: login.php');
  } 
  ?>

  <?php 
      $sql = "SELECT course FROM course WHERE courseNo = '$cNo'";
      $stmt = sqlsrv_query( $conn, $sql );
      $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
  ?>
  <div class="enroll">
    <div class="container-fluid outside">
      <div id="tr_space"></div>
      <p class="title-font"><?php echo $row[0]; ?>&nbsp;學生名單</p>
    </div>
  </div>

  <div class="rounded inside">
      <table border="1" width="680">
　       <tr>
           <td>孩童姓名</td>
           <td>孩童年齡</td>
           <td>家長姓名</td>
           <td>家長Email</td>
         </tr>
    <?php
      $sqla = "SELECT kidName, DATEDIFF (MONTH , kidBirth, GETDATE()), userName, email FROM enroll INNER JOIN (kid 
               INNER JOIN account ON kid.cellphone = account.cellphone) ON enroll.kidNo = kid.kidNo WHERE enroll.courseNo = '$cNo'
               AND cookie = '$refer';";
      $stmta = sqlsrv_query( $conn, $sqla );
      while($rowa = sqlsrv_fetch_array( $stmta, SQLSRV_FETCH_NUMERIC)){
        $age = round($rowa[1]/12);
      ?>
      <tr>
      <td><?php echo $rowa[0]; ?></td>
      <td><?php echo $age; ?></td>
      <td><?php echo $rowa[2]; ?></td>
      <td><?php echo $rowa[3]; ?></td>
      </tr>

　    <?php } ?>
　       
      </table>


      

        <div class="confirm">
          <a href="#" class="btn btn-outline-secondary" role="button"  onclick="history.back()">返回</a>
        </div>

      </form>
    </div>

  <script>
  function check(elememt){
    var total = 0;
    var price = document.getElementById("price");
    if(element.checked){
      total += price;
      document.getElementById("tPrice").innerHTML = 'total';
    }
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