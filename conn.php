<?php

    $servername = "testing.siotel.in";
	$username ="root";
	$password ="Alyr!020";
	$databasename ="SSTPL_UPLINK";
	
	$connection = mysqli_connect($servername,$username,$password,$databasename);
	
	if(!$connection)
	{
		die("connection Unsuccessfull:".mysqli_connect_error());
	}


	
	?>