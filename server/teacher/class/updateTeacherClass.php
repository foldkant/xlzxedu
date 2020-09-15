<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	$class = $_GET['class'];
	//清除该老师的任教班级
	session_start();
	$id = $_SESSION['id'];
	$sql = "DELETE FROM `teacher_class` WHERE `teacher_id`= '$id'";
	// echo $sql;
	mysqli_query($conn,$sql);
	foreach ($class as $key => $value) {
	    $insertSql = "INSERT INTO `teacher_class` (`teacher_id`,`class_id`) VALUES ('$id','$value')";	
		mysqli_query($conn,$insertSql);
		// echo $insertSql.'<br>';
	}
	echo json_encode('success', JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
