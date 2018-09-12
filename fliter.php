<html lang="zh-tw">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384- WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/filter1.css">
    <link rel="stylesheet" type="text/css" href="css/sidenav.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="jquery.ui.touch-punch.js"></script>


 <!--價格-->
	<script>
	$( function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 500,
			values: [ 75, 300 ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
			" - $" + $( "#slider-range" ).slider( "values", 1 ) );
	} );
	</script>
    <title>Playgroup</title>
</head>
<body>
    <nav class="navbar navbar-light header-font bg-light">
                        <a class="navbar-brand float-left" href="index.php">
                          <img src="http://140.131.114.155/playgroup/pic/title.png" class="header-logo">
                        </a>
                        <a role="button" class="rounded-circle data-toggle=" collapse"="" data-target="#collapsibleNavbar" onclick="openNav()">
                          <span class="fa-stack fa-lg">
                            <i class="fa fa-circle fa-stack-2x"></i>
                            <i class="fa fa-user fa-stack-1x fa-inverse"></i>
                          </span>
                        </a>
                        <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                          <ul class="list-group list-group-flush">
                          
                            <form class="form-inline">
                              <div class="input-group">
                                <input type="text" class="form-control" placeholder="搜尋" aria-label="search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                  <button class="btn btn-outline-info" type="submit"><span class="fa fa-search"></span></button>
                                </div>
                              </div>
                            </form>

                            <li class="list-group-item">
                              <a href="login.php" class="nav-link">
                                <span class="fa fa-user">
                                <span class="header-font">會員專區</span>
                              </span></a>
                            </li>
                            <li class="list-group-item">
                              <a href="#" class="nav-link">
                                <span class="fa fa-book">
                                <span class="header-font">已開課程</span>
                              </span></a>
                            </li>
                            <li class="list-group-item">
                              <a href="#" class="nav-link">
                                <span class="fa fa-calendar-check-o">
                                <span class="header-font">已報課程</span>
                              </span></a>
                            </li>
                            <li class="list-group-item">
                              <a href="#" class="nav-link">
                                <span class="fa fa-filter">
                                <span class="header-font">篩選</span>
                              </span></a>
                            </li>
                            <li class="list-group-item">
                              <a href="logout.php" class="nav-link">
                                <span class="fa fa-sign-out">
                                <span class="header-font">登出</span>
                              </span></a>
                            </li>
                          </ul>
                        </div>

                      </nav>
	<!--懸浮表頭區塊-->
	<div class="fixedHeader">
		
			<!--篩選器-->
		<form class="sideBar">
        <span class="filterTitle">條件篩選</span>
        <div class="locationFilter">
          <label class="locationFilterTitle">地點</label>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="keelung" value="keelung">
            <label for="keelung">基隆市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="taipei" value="taipei">
            <label for="taipei">臺北市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="newtaipei" value="newtaipei">
            <label for="newtaipei">新北市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="taoyuan" value="taoyuan">
            <label for="taoyuan">桃園縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="hsinchu" value="hsinchu">
            <label for="hsinchu">新竹市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="hsinchucounty" value="hsinchucounty">
            <label for="hsinchucounty">新竹縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="miaoli" value="miaoli">
            <label for="miaoli">苗栗縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="taichung" value="taichung">
            <label for="taichung">臺中市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="changhua" value="changhua">
            <label for="changhua">彰化縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="nantou" value="nantou">
            <label for="nantou">南投縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="yunlin" value="yunlin">
            <label for="yunlin">雲林縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="chiayi" value="chiayi">
            <label for="chiayi">嘉義市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="chiayicounty" value="chiayicounty">
            <label for="chiayicounty">嘉義縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="tainan" value="tainan">
            <label for="tainan">臺南市</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="kaohsiung" value="kaohsiung">
            <label for="kaohsiung">高雄市</label>
          </div>        
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="pingtung" value="pingtung">
            <label for="pingtung">屏東縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="taitung" value="taitung">
            <label for="taitung">臺東縣</label>
          </div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="hualien" value="hualien">
            <label for="hualien">花蓮縣</label>
          </div>
          <div class="clearfix"></div>                         
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="yilan" value="yilan">
            <label for="yilan">宜蘭縣</label>
          </div>
          <div class="clearfix"></div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="penghu" value="penghu">
            <label for="penghu">澎湖縣</label>
          </div>
          <div class="clearfix"></div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="kinmen" value="kinmen">
            <label for="kinmen">金門縣</label>
          </div>
          <div class="clearfix"></div>
          <div class="locationRadioBox">
            <input type="Radio" class="locationRadio" name="guideClass" id="lienchiang" value="lienchiang">
            <label for="lienchiang">連江縣</label>
          </div>
                              
		</div>
        <div class="priceFilter">
          <label class="priceFilterTitle">價格(單堂)</label>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price1" value="price1">
            <label for="price1">100元以下</label>
          </div>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price2" value="price2">
            <label for="price2">101~200元</label>
          </div>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price3" value="price3">
            <label for="price3">201~300元</label>
          </div>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price4" value="price4">
            <label for="price4">301~400元</label>
          </div>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price5" value="price5">
            <label for="price5">401~500元</label>
          </div>
          <div class="priceRadioBox">
            <input type="Radio" class="priceRadio" name="guidePriceClass" id="price6" value="price6">
            <label for="price6">500元以上</label>
          </div>                     
        </div>                        
    <div class="courseFilter">
          <label class="courseFilterTitle">課程</label>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="language" value="language">
            <label for="language">語文</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="music" value="music">
            <label for="music">音樂</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="sport" value="sport">
            <label for="sport">體育</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="art" value="art">
            <label for="art">美術</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="dance" value="dance">
            <label for="dance">舞蹈</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="science" value="science">
            <label for="science">科學</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="handmade" value="handmade">
            <label for="handmade">手作</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="game" value="game">
            <label for="game">遊戲</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="homeEconomic" value="homeEconomic">
            <label for="homeEconomic">家政</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="together" value="together">
            <label for="together">聚會</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="outdoor" value="outdoor">
            <label for="outdoor">戶外活動</label>
          </div>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="programming" value="programming">
            <label for="programming">程式設計</label>
          </div></a>
          <div class="courseCheckBox">
            <input type="checkbox" class="courseCheck" name="guidecourseClass" id="otherCourse" value="otherCourse">
            <label for="otherCourse">其他</label>
          </div>
          <div class="clearfix"></div>
        </div>                                                         
  
   </form>	
</div>	                         
                            
                            
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("fab").style.display = "none";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("fab").style.display = "block";
  }
  </script>


 
</body>
</html>
