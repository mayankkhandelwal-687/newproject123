
<html>
<head>
<title>All Devices</title>
<link rel="stylesheet" href="next.css" type="text/css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src='https://code.jquery.com/jquery-3.5.1.js'></script>
<script src='https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js'></script>
<script>

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</head>
<body>

<?php
include("conn.php");
    $str=$_GET['alldevice'];
	$fdate=$_GET['from-date'];
      $tdate=$_GET['to-date'];
     $hj="00:00:00";
    $Time1=array();
if($str=="All devices")
{
	echo "<form action='#' method='post'>
	<input type='submit' class='btn' style='background-color: DodgerBlue; margin-left: 650px; ' name='download' value='Download '>
	</form>";



session_start();
error_reporting(E_ERROR | E_PARSE);

    
	$dev=array('506f9800000003fa','506f980000003425','506f980000003812','506f980000003fa9');
	for($j=0;$j<count($dev);$j++)
	{
	$sql="select address,payload,Time from SSTPL_UP_Data where address ='$dev[$j]'  and Time between '$fdate $hj' and '$tdate $hj' and payload like '%fefefe681013%' order by time desc ";
	
	 $result = mysqli_query($connection,$sql);
	  
	 $rowcount= mysqli_num_rows($result);
	 while($row= $result->fetch_assoc()):
	 

	 $Time1[]=$row['address'];
	 $payload[]=$row['payload'];
	 $pay[]=$row['Time'];
	 endwhile ;
	  }
	  ?>
	  <?php
	  
	 $display123="";
if($Time1[$i] == $_SESSION['editable_field'])
	$border_variable = "2px solid white"; 
else 
{
	$border_variable = "none" ;
	$display123="disabled";
}
     
      $finaldata[$i]="";
	 
	$temp[$i]=""; 
 
 for($i=0; $i < count($Time1); $i++) {
 
	
	 if(substr($payload[$i],34,2)=="2b"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 
		 $finaldata[$i]=  $finaldata[$i]*0.1;
		 "$finaldata[$i]" ."<span>L</span>";
		
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2c"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]=$temp3[$i].$temp2[$i].$temp1[$i].$temp[$i];
		 
		 $finaldata[$i]=  $finaldata[$i]*1;
		 $finaldata[$i]= "$finaldata[$i]" ."<span>L</span>";
		  
		 
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2d"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],44,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*10;
		 $finaldata[$i]= "$finaldata[$i] "."<span>L</span>";
		 
		 
		
		
	 }
	 elseif(substr($payload[$i],34,2)=="2e"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*0.1;
		 $finaldata[$i]= "$finaldata[$i]"."<span>&#13221;</span>";
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2f"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*1;
		 $finaldata[$i]= "$finaldata[$i]"."<span>&#13221;</span>";
		 
		 
		
		
	 }
	 
	 if(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp14[$i].$temp13[$i].$temp12[$i].$temp11[$i]);
		 $finaldata1[$i]=  $finaldata1[$i]*0.1;
		 $finaldata1[$i]= "$finaldata1[$i]" ."<span>L/H</span>";
		
		 
		 
		
		
	 }elseif(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata1[$i]=  $finaldata[$i]*1;
		  $finaldata1[$i]= "$finaldata1[$i]" ."<span>L/H</span>";
		  
		 
		 
		 
		
		
	 }elseif(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata1[$i]=  $finaldata[$i]*10;
		 $finaldata1[$i]="$finaldata1[$i]" ."<span>L/H</span>";
		 
		 
		
		
	 }
 }
if(isset($_POST['download']))
{
	$mkl=date("Y/m/d");
	$dev=array('506f9800000003fa','506f980000003425','506f980000003812','506f980000003fa9');
	for($j=0;$j<count($dev);$j++)
	{
	$sql="select * from SSTPL_UP_Data where address ='$dev[$j]'  and payload like '%fefefe681013%' order by time desc INTO OUTFILE 'test.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '|' ESCAPED BY '|'
LINES TERMINATED BY '\r\n';";
	
	 $result = mysqli_query($connection,$sql);
	  
	 $rowcount= mysqli_num_rows($result);
	 
}
echo "done";
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=$mkl.xls"); 
}	
?>	
<div id="table-div" style="margin-top: 100px;">
<table id="example" class="table table-striped table-bordered" style="width:100%; ">
  <thead>
    <tr>
      <th style='color: black;' class="btn-primary" scope='col'>S.No</th>
      <th style='color: black;' class="btn-primary" scope='col'>Deveui</th>
	  <th style='color: black;' class="btn-primary" scope='col'>Time</th>
      <th  style='color: black;' class="btn-primary" scope='col'>Total Reading</th>
      <th style='color: black;' class="btn-primary" scope='col'>Total Flow</th>
	  <th  style='color: black;' class="btn-primary"  scope='col'>Meter ID</th>
	  <th style='color: black;' class="btn-primary" scope='col'>Address</th>
    </tr> 
  </thead>
  <tbody>
 <?php
 
 for($i=0;$i<count($Time1);$i++)
	 {
	echo "	 <tr style='color: black;'>
	<th scope='row'>$i</th>
	 <td>$Time1[$i]</td>
	 <td>$pay[$i] </td>
      <td>$finaldata[$i]</td>
      <td>$finaldata1[$i]</td>
	  <td></td>
	  <td></td>
    </tr>";
	 }
}
elseif($str=="device"){
	$neha=$_GET['abcd'];
	echo "<form action='#' method='post'>
	<input type='submit' class='btn' style='background-color: DodgerBlue; margin-left: 650px;' name='download' value='Download '>
	</form>";
if(isset($_POST['download']))
{ 
require_once("conn.php");
error_reporting(E_ERROR | E_PARSE);
	$mkl=date("Y/m/d");
	
	$sql="select * from SSTPL_UP_Data where address ='$neha' and Time between '$fdate $hj' and '$tdate $hj' and payload like '%fefefe681013%' order by time desc INTO OUTFILE 'test.csv' FIELDS TERMINATED BY ',' ENCLOSED BY '|' ESCAPED BY '|'
LINES TERMINATED BY '\r\n';";
	
	 $result = mysqli_query($connection,$sql);
	  
	 $rowcount= mysqli_num_rows($result);
	 

echo "done";
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=$mkl.xls"); 
}	

	
	$sql1="select address,payload,Time from SSTPL_UP_Data where address ='$neha' and Time between '$fdate $hj' and '$tdate $hj' and payload like '%fefefe681013%' order by Time desc";
	
	 $result1 = mysqli_query($connection,$sql1);
	  
	 $rowcount1= mysqli_num_rows($result1);
	 while($row1= $result1->fetch_assoc()):
	 

	 $Time1[]=$row1['address'];
	 $payload[]=$row1['payload'];
	 $pay[]=$row1['Time'];
	
	 endwhile ;
	  
	  ?>
	  <?php
	  
	 $display123="";

     
      $finaldata[]="";
	 
	$temp[]=""; 
 
 for($i=0; $i < count($Time1); $i++) {
 
	
	 if(substr($payload[$i],34,2)=="2b"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 
		 $finaldata[$i]=  $finaldata[$i]*0.1;
		 "$finaldata[$i]" ."<span>L</span>";
		
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2c"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]=$temp3[$i].$temp2[$i].$temp1[$i].$temp[$i];
		 
		 $finaldata[$i]=  $finaldata[$i]*1;
		 $finaldata[$i]= "$finaldata[$i]" ."<span>L</span>";
		  
		 
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2d"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],44,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*10;
		 $finaldata[$i]= "$finaldata[$i] "."<span>L</span>";
		 
		 
		
		
	 }
	 elseif(substr($payload[$i],34,2)=="2e"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*0.1;
		 $finaldata[$i]= "$finaldata[$i]"."<span>&#13221;</span>";
		 
		 
		
		
	 }elseif(substr($payload[$i],34,2)=="2f"){
		 
		 $temp[$i]=substr($payload[$i],36,2);
		 $temp1[$i]=substr($payload[$i],38,2);
		 $temp2[$i]=substr($payload[$i],40,2);
		 $temp3[$i]=substr($payload[$i],42,2);
		 $finaldata[$i]= number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata[$i]=  $finaldata[$i]*1;
		 $finaldata[$i]= "$finaldata[$i]"."<span>&#13221;</span>";
		 
		 
		
		
	 }
	 
	 if(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp14[$i].$temp13[$i].$temp12[$i].$temp11[$i]);
		 $finaldata1[$i]=  $finaldata1[$i]*0.1;
		 $finaldata1[$i]= "$finaldata1[$i]" ."<span>L/H</span>";
		
		 
		 
		
		
	 }elseif(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata1[$i]=  $finaldata[$i]*1;
		  $finaldata1[$i]= "$finaldata1[$i]" ."<span>L/H</span>";
		  
		 
		 
		 
		
		
	 }elseif(substr($payload[$i],44,2)=="35"){
		 
		 $temp11[$i]=substr($payload[$i],46,2);
		 $temp12[$i]=substr($payload[$i],48,2);
		 $temp13[$i]=substr($payload[$i],50,2);
		 $temp14[$i]=substr($payload[$i],52,2);
		 $finaldata1[$i]=number_format($temp3[$i].$temp2[$i].$temp1[$i].$temp[$i]);
		 $finaldata1[$i]=  $finaldata[$i]*10;
		  $finaldata1[$i]="$finaldata1[$i]" ."<span>L/H</span>";
		 
		 
		
		
	 }
 }
	







	 ?>
	 
	 <div id="table-div" style="margin-top: 100px;">
<table id="example" class="table table-striped table-bordered" style="width:100%; ">
  <thead>
    <tr>
      <th style='color: black;' class="btn-primary" scope='col'>S.No</th>
      <th style='color: black;' class="btn-primary" scope='col'>Deveui</th>
	  <th style='color: black;' class="btn-primary" scope='col'>Time</th>
      <th  style='color: black;' class="btn-primary" scope='col'>Total Reading</th>
      <th style='color: black;' class="btn-primary" scope='col'>Total Flow</th>
	  <th  style='color: black;' class="btn-primary"  scope='col'>Meter ID</th>
	  <th style='color: black;' class="btn-primary" scope='col'>Address</th>
    </tr> 
  </thead>
  <tbody>
 <?php
 
 for($i=0;$i<count($Time1);$i++)
	 {
	echo "<tr style='color: black;'>
	<th scope='row'>$i</th>
	 <td>$Time1[$i]</td>
	 <td>$pay[$i]</td>
      <td>$finaldata[$i]</td>
      <td>$finaldata1[$i]</td>
	  <td></td>
	  <td></td>
    </tr>";
	 }
}
?>
 
     
	</div>
</body>
</html>