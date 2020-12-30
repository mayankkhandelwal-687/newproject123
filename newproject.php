<html>
<head>
<title>Water Meter</title>
<link rel="stylesheet" href="newproject.css" type="text/css">
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css'>
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
<div class="top">
<body style=" ">
<?php
include("conn.php");
session_start();
error_reporting(E_ERROR | E_PARSE);

   
	$Time1=array();
	
	$dev=array('506f9800000003fa','506f980000003425','506f980000003812','506f980000003fa9');
	for($j=0;$j<count($dev);$j++)
	{
	$sql="select address,payload ,Time from SSTPL_UP_Data where address ='$dev[$j]' and payload like '%fefefe681013%' order by Time limit 1";
	
	 $result = mysqli_query($connection,$sql);
	  
	 $rowcount= mysqli_num_rows($result);
	 while($row= $result->fetch_assoc()):
	 

	 $Time1[]=$row['address'];
	 $payload[]=$row['payload'];
	 $pay[]=$row['Time'];
	
	 endwhile ;
	  
	 
	}
     
	 ?>
<div style='height: 90px; width: 1430px;  background-color: white;'class="top">
<img style='height: 80px; width: 90px;' id="img1" src="logo12.png" alt="SSTPL-IMG">
<img style='height: 60px; width: 200px; float: right;' id="img4" src="paltak.png" alt="SSTPL">

</div>
<div style='height: 50px; width: 500px; margin-left: 400px;  margin-bottom: 60px;'>
<form action="next.php" method="get">
<?php echo  "<span style='color: white;'>From </span><input style='margin-top: 10%;' type='date' name='from-date'> <span style='color: white;'>To </span> <input type='date' name='to-date'><br>"?>
<input type="submit"  style='margin-top: -6%; margin-left: 450px;' class="btn btn-primary btn-lg" name="alldevice" value='All devices'>


</div>

<span style='color: white; margin-top: 200px; margin-left: 390px;'>Deveui</span><input style='background-color: white; color: white; margin-top: 30px; margin-left: 5px;' type='text' placeholder="Enter Deveui" name="abcd"  value="">
<input type="submit" style=' margin-left: 100px;' class="btn btn-primary btn-lg"  name="alldevice" value='device'>

</form>
<table id="example" class="table table-striped table-bordered" style="width:100%;">
  <thead>
    <tr>
      <th style='color: white;' scope='col'>S.No</th>
      <th style='color: white;' scope='col'>Deveui</th>
	  <th style='color: white;' scope='col'>Time</th>
      <th  style='color: white;' scope='col'>Total Reading</th>
      <th style='color: white;' scope='col'>Total Flow</th>
	  <th  style='color: white;' scope='col'>Meter ID</th>
	  <th style='color: white;' scope='col'>Address</th>
    </tr> 
  </thead>
  <tbody>
  
   <?php
$finaldata[$i]="";
	 
	$temp[$i]="";   
     for($i=0;$i<count($Time1);$i++)
	 {
		 
		
		 $display123="";
if($Time1[$i] == $_SESSION['editable_field'])
	$border_variable = "2px solid white"; 
else 
{
	$border_variable = "none" ;
	$display123="disabled";
}
     
      
 
 
 
	
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
	 
	 
	  
		 

   echo "
	<tr style='color: white;'>
	<th scope='row'>$i</th>
	 <td>$Time1[$i]</td>
	 <td>$pay[$i] </td>
      <td>$finaldata[$i]</td>
	 
      <td>$finaldata1[$i]</td>
	  <td>
	  <form action='#' method='post'>
	  <input type='hidden'  name='ah[]' style='border: none;' Placeholder='Enter Address' value='$Time1[$i]'/>
	  <input type='text'  name='add4[]' style='border: ".$border_variable."' id='kjm' Placeholder='Enter Meter-ID' $display123/>
      <button type='submit' class='btn-primary btn-sm' id='kl' name='edit123' value='<?php echo $Time1[$i]?>' ><i class='far fa-edit'></i></button>
	  <button class='btn-primary btn-sm' id='kl_upper' name='save_upper' value='<?php echo $Time1[$i]?>'><i class='fa fa-save'></i></button></td>
	  </form>
	  </td>
	  <td>
	  <form action='#' method='post'>

	  <input type='hidden'  name='ah[]' style='border: none;' Placeholder='Enter Address' value='$Time1[$i]'/>
	  <input type='text'  name='address4[]' style='border: ".$border_variable."' id='kjm' Placeholder='Enter Address' $display123/>
	  <button type='submit' class='btn-primary btn-sm' id='kl' name='edit' value='<?php echo $Time1[$i]?>' ><i class='far fa-edit'></i></button>
	  <button type='submit' class='btn-primary btn-sm' name='save' value='<?php echo $Time1[$i]?>'><i class='fa fa-save'></i></button>
	  </form>
	  </td>
    </tr>";
	
	 }
	 
	?>
  </tbody>
</table>

</body>
</div>
<script>
function myFunction(){
	  document.getElementById("kjm").style.border="none";
}
</script>
<?php
  if(isset($_POST['save_upper']))
	{
	  $abc5=$_POST['ah'];
	  $devEUi5=$_POST['save_upper'];
	  $address5=$_POST['add4'];
         echo "$add4";
         $val5=$_POST['ah'];

$data=0;
         for ($i=0; $i < count($val5); $i++) { 
           $data5= $val5[$i];
		   echo $add4[$i];
		 $sql1="update paltak_local set Meter_id='$address5[$i]' where DevEui='$val5[$i]'"; 
         echo "$address5[$i]"."$val5[$i]";
		 
		 }
		$_SESSION['editable_field']=0;
		 
	  
	 
	 $result1 = mysqli_query($connection,$sql1);
	  
	 $rowcount1= mysqli_num_rows($result1);
	 if(mysqli_query($connection,$sql1))
	 {
		 echo "update success fully";
	 }
	 else{
		 echo "update not  success fully";
		 
	 }
	 
	 header("Refresh:0");
	
	}
	
  	  if(isset($_POST['edit']))
	{
		
	 $abc6=$_POST['ah'];
	  $devEUi6=$_POST['edit'];
	  $address6=$_POST['add4'];
         
         $val6=$_POST['ah'];
       
         
		  for ($i=0; $i < count($val6); $i++) { 
           $editfliedis = $val6[$i];
		   
         }
	  $_SESSION['editable_field']=$editfliedis;
	   
	  header("Refresh:0");
	}

if(isset($_POST['save']))
	{
	  $abc=$_POST['ah'];
	  $devEUi=$_POST['save'];
	  $address=$_POST['address4'];
         echo "$address4";
         $val=$_POST['ah'];

$data=0;
         for ($i=0; $i < count($val); $i++) { 
           $data= $val[$i];
		   echo $address[$i];
		 $sql1="update paltak_local set address='$address[$i]' where DevEui='$val[$i]'"; 
         echo "$address4[$i]"."$val[$i]";
		 
		 }
		$_SESSION['editable_field']=0;
		 
	  
	 
	 $result1 = mysqli_query($connection,$sql1);
	  
	 $rowcount1= mysqli_num_rows($result1);
	 if(mysqli_query($connection,$sql1))
	 {
		 echo "update success fully";
	 }
	 else{
		 echo "update not  success fully";
		 
	 }
	 
	 header("Refresh:0");
	
	}
	
  	  if(isset($_POST['edit']))
	{
		
	 $abc1=$_POST['ah'];
	  $devEUi1=$_POST['edit'];
	  $address1=$_POST['address4'];
         
         $val1=$_POST['ah'];
       
         
		  for ($i=0; $i < count($val1); $i++) { 
           $editfliedis = $val1[$i];
		   
         }
	  $_SESSION['editable_field']=$editfliedis;
	   
	  header("Refresh:0");
	}
	
  
?>



</htmL>