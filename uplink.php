<?php
include("conn.php");
$postdata = file_get_contents('php://input');
$jObj = json_decode($postdata);
$data = $jObj ->data;
$data1 = bin2hex(base64_decode($data));
$devEUI = $jObj ->devEUI;
$gw_mac = $jObj ->rxInfo[0]->gatewayID;
$rssi = $jObj ->rxInfo[0]->rssi;
$loRaSNR = $jObj ->rxInfo[0]->loRaSNR;
$Freq = $jObj ->txInfo->frequency;
$Modulation = $jObj ->applicationName;;
$Data_Rate = $jObj ->txInfo->dr;
date_default_timezone_set('Asia/kolkata');
$downlink_time=date('Y-m-d H:i:s');
switch ($Data_Rate) {
                case '0':       $Data_Rate=12;  break;
                case '1':       $Data_Rate=11;  break;
                case '2':       $Data_Rate=10;  break;
                case '3':       $Data_Rate=9;   break;
                case '4':       $Data_Rate=8;   break;
                case '5':       $Data_Rate=7;   break;
                default:        $Data_Rate=$Data_Rate;  break;
}
$fcnt =$jObj->fCnt;
date_default_timezone_set('Asia/Kolkata');
$Time=  date("Y-m-d H:i:s");
$sql = "INSERT INTO SSTPL_UP_Data(Address,MAC,Time,freq,Modulation,Data_Rate,Code_Rate,RSSI,LORA_SNR,PAYLOAD) VALUES ('$devEUI','$gw_mac','$Time','$Freq','$Modulation','$Data_Rate','$fcnt','$rssi','$loRaSNR','$data1')";
if ($connection->query($sql) === TRUE)
 {    
    $output "New record created successfully";
}
else {    
    $output "Error: " . $sql . "<br>" . $conn->error;
  }
file_put_contents('tempdata.txt',$sql.' | '.$output);
?>