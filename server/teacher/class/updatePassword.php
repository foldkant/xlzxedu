<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	$id = $_POST['id'];
	$password = $_POST['password'];
	$sql = "UPDATE `user_info` SET `password`='$password' WHERE `id`= '$id'";
	mysqli_query($conn,$sql);
	echo json_encode('success', JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
