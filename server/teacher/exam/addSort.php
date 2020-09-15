<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	if(isset($_POST['sort'])&&isset($_POST['exam-type'])){
		$sort = $_POST['sort'];
		$exam_type = $_POST['exam-type'];
		$sql = "SELECT * FROM `exam_type` WHERE `exam_sort` = '$sort'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_num_rows($result);
		// echo $sql;
		if($row>=1){
			echo json_encode('exist', JSON_UNESCAPED_UNICODE);
		}else{
			$sql = "INSERT INTO `exam_type` (`exam_sort`,`exam_type`)VALUES('{$sort}','{$exam_type}')";
			$result = mysqli_query($conn, $sql);
			if (mysqli_affected_rows($conn)) {
			    echo json_encode('success', JSON_UNESCAPED_UNICODE);
			}else{
			    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
			}
		}
		
	}else{
		echo json_encode('fail', JSON_UNESCAPED_UNICODE);
	}
}else{
	mysqli_close($conn);
}



 ?>
