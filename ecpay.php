<?php
/**
*    Credit信用卡付款產生訂單範例
*/
    include 'config.php';
    $orderNo = $_POST['MerchantTradeNo'];
    $NEWorderNo =  $_POST['MerchantTradeNo'];
    $sqla = "SELECT orderNo,courseNo,cellphone FROM enroll WHERE orderNo = '$orderNo'";
    $stmta = sqlsrv_query( $conn, $sqla );
    $rowa = sqlsrv_fetch_array( $stmta, SQLSRV_FETCH_NUMERIC);
    if(sqlsrv_has_rows($stmta)){
        $NEWorderNo = (int)$orderNo + time();
        $sql = "UPDATE enroll SET orderNo = '$NEWorderNo' WHERE courseNo = $rowa[1] AND cellphone = '$rowa[2]'";
        $params = array(1, "some data");
        $stmt = sqlsrv_query( $conn, $sql, $params);
    }else{
        require_once 'enrollFinish.php';
        $NEWorderNo = $orderNo;
    }
    //載入SDK(路徑可依系統規劃自行調整)
    include('ECPay.Payment.Integration.php');
    try {
        
        $obj = new ECPay_AllInOne();
   
        //服務參數
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
        $obj->MerchantID  = '2000214';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
        $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密
        //基本參數(請依系統規劃自行調整)
        $MerchantTradeNo = "Test".time() ;
        $obj->Send['ReturnURL']         = $_POST['ReturnURL'] ;    //付款完成通知回傳的網址
        $obj->Send['OrderResultURL']    = $_POST['ReturnURL'] ;
        $obj->Send['MerchantTradeNo']   = $NEWorderNo;                          //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
        $obj->Send['TotalAmount']       = $_POST['TotalAmount'];                                      //交易金額
        $obj->Send['TradeDesc']         = $_POST['TradeDesc'];                         //交易描述
        $obj->Send['ChoosePayment']     = ECPay_PaymentMethod::Credit ;              //付款方式:Credit
        //訂單的商品資料
        array_push($obj->Send['Items'], array('Name' =>  $_POST['ItemName'], 'Price' =>  $_POST['Price'],
                   'Currency' => "元", 'Quantity' =>  $_POST['Quantity'], 'URL' => "dedwed"));
        //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
        //以下參數不可以跟信用卡定期定額參數一起設定
        $obj->SendExtend['CreditInstallment'] = '' ;    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24
        $obj->SendExtend['Redeem'] = false ;           //是否使用紅利折抵，預設false
        $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

        //產生訂單(auto submit至ECPay)
        $obj->CheckOut();
    
    } catch (Exception $e) {
        echo $e->getMessage();
    } 
 
?>