<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	if(isset($_POST['content'])){
		session_start();
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$content = $_POST['content'];
		//判断是否存在
    	$delSelect = "DELETE FROM `notice` WHERE `teacher_id`= '$id'";
		$sql = "INSERT INTO `notice` (`teacher_id`,`teacher`,`content`)VALUES('{$id}','{$name}','{$content}')";
		mysqli_query($conn, $delSelect);
		$result = mysqli_query($conn, $sql);
		// echo $sql;	
		if (mysqli_affected_rows($conn)) {
		    echo json_encode('success', JSON_UNESCAPED_UNICODE);
		}else{
		    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
		}
	}else{
		echo json_encode('fail', JSON_UNESCAPED_UNICODE);
	}
}else{
	mysqli_close($conn);
}



 ?>
