<?php
include "connect.php";

$username = $_POST['up_userame'];
$password = $_POST['reenterpassword'];
$email = $_POST['up_email'];
$address = $_POST['up_address'];
$tel = $_POST['up_tel'];

if ($username){
	$sql2 =  "UPDATE employee SET username='$username' WHERE E_nic= '916191197v'";
		if(mysql_query($sql2)){
			echo "yeahhh";
		} else{
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error();
		}
}else if($password){ 
	$sql2 =  "UPDATE employee SET password='$password' WHERE E_nic= '916191197v'";
	
		if(mysql_query($sql2)){
			echo "yeahhh";
		} else{
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error();
		}
}else if($email){  
	$sql2 =  "UPDATE employee SET email='$email' WHERE E_nic= '916191197v'";
		if(mysql_query($sql2)){
			echo "yeahhh";
		} else{
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error();
		}
}else if($address){
	$sql2 =  "UPDATE employee SET address='$address' WHERE E_nic= '916191197v'";
		if(mysql_query($sql2)){
			echo "yeahhh";
		} else{
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error();
		}
}else{
	$sql2 =  "UPDATE employee SET tel='$tel' WHERE E_nic= '916191197v'";
		if(mysql_query($sql2)){
			echo "yeahhh";
		} else{
			echo "ERROR: Could not able to execute $sql2. " . mysqli_error();
		}
}
	
// close connection
mysql_close();
?>