<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');
if($conn){
	//执行成功的过程
	$lessonId = $_GET['lessonId'];
	mysqli_query($conn,"SET NAMES utf8");
	$sql = "SELECT * FROM `lesson_exam` WHERE `lesson_id` = '{$lessonId}'";
	 // echo($sql);
	$result = mysqli_query($conn,$sql);
	$senddata = array();
	while($row = mysqli_fetch_assoc($result)){
	  	array_push($senddata, array(
			'exam_id'=>$row['exam_id']
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}

 ?>
