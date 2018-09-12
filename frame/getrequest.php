<?php 
        $old_url = $_SERVER["REQUEST_URI"];
        $check = strpos($old_url, '?');
        if($check !== false){
            if(substr($old_url, $check+1) == ''){
              echo '';
          }else{
              if($_GET['refer']=='nologin'){
                echo '<div class="alert alert-danger" role="alert">帳號密碼輸入錯誤</div>';
              }
          }
        }else{
          echo '';
        }

?>
