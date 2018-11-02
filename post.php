<?php
 echo "檔案名稱：" . $_FILES["image"]["name"] . "<BR>";
      echo "檔案大小：" . $_FILES["image"]["size"] . "<BR>";
      echo "檔案類型：" . $_FILES["image"]["type"] . "<BR>";
      echo "暫存檔名：" . $_FILES["image"]["tmp_name"] . "<BR>";

     //  if ( $_FILES["image"]["size"] > 0 ) 
     //    {
     //     //開啟圖片檔
     //     $file = fopen($_FILES["image"]["tmp_name"], "rb");
     //     // 讀入圖片檔資料
     //     $fileContents = fread($file, filesize($_FILES["image"]["tmp_name"])); 
     //     //關閉圖片檔
     //     fclose($file);

     //     // 圖片檔案資料編碼
     //     $fileContents = base64_encode($fileContents);
     // }

?>