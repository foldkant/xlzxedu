<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	session_start();
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM `course` WHERE `teacher_id`='$id' ORDER BY `id` DESC LIMIT 3";
	$result = mysqli_query($conn,$sql);
	$senddata = array();
	while($row = mysqli_fetch_assoc($result)){
		array_push($senddata,array(
			'id' => $row['id'],
			'title' => $row['title'],
			'img' => $row['img'],
			'width' => $row['width'],
			'height' => $row['height'],
			'introduction' => $row['introduction'],
			'teacherName' => $row['teacher_name'],
			'teacherPic' => $row['teacher_pic'],
			'lessonNum' => $row['lesson_num'],
			'createTime' => $row['create_time']
		));
	}
	echo json_encode($senddata,JSON_UNESCAPED_UNICODE);	
}else{
	mysqli_close($conn);
}



 ?>
