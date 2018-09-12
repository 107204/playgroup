<script type="text/javascript">
  function check1(){
    var kidName=document.form2.kidName.value;
    var KidAge=document.form2.kidAge.value;
    var kidGen=document.form2.kidGen.value;
    if(kidName==""){
      alert("請輸入孩童姓名");
      document.form2.userName.focus();
      return false;
    }else if(kidAge==""){
      alert("請輸入孩童年齡");
      document.form2.kidAge.focus();
      return false;
    }else if(kidGen==""){
      alert("請選擇孩童性別");
      document.form2.kidGen.focus();
      return false;
    }
  }
  </script>

  <script type="text/javascript">
  function check2(){
    var teaDesc=document.form2.teaDesc.value;
    if(teaDesc==""){
      alert("請輸入教師經歷");
      document.form2.teaDesc.focus();
      return false;
    }
  }
  </script>

  <script type="text/javascript">
  function check3(){
    var teaDesc=document.form2.teaDesc.value;
    var kidName=document.form2.kidName.value;
    var KidAge=document.form2.kidAge.value;
    var kidGen=document.form2.kidGen.value;
    if(teaDesc==""){
      alert("請輸入教師經歷");
      document.form2.teaDesc.focus();
      return false;
    }else if(kidName==""){
      alert("請輸入孩童姓名");
      document.form2.kidName.focus();
      return false;
    }else if(kidAge==""){
      alert("請輸入孩童年齡");
      document.form2.kidAge.focus();
      return false;
    }else if(kidGen==""){
      alert("請選擇孩童性別");
      document.form2.kidGen.focus();
      return false;
    }
  }
  </script>