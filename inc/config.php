<?php
//connect to db
$dbname='dbpantiasuhan' ;


$con = mysqli_connect("localhost","root","",$dbname);

// Check connection
if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL : " . mysqli_connect_error();
	}
?>