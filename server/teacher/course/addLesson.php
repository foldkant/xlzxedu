<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	if(isset($_POST['title'])&& isset($_POST['courseId'])){
		$title = $_POST['title'];
		$courseId  = $_POST['courseId'];
		if(isset($_POST['fenceng'])){
			$fenceng= 1;
		}else{
			$fenceng= 0;
		}
		$sql1 = "INSERT INTO `lesson` (`title`,`course_id`,`fenceng`)VALUES('{$title}','{$courseId}','{$fenceng}')";
		$sql2 = "update `course` set `lesson_num`=`lesson_num`+1 where `id`=$courseId;";
		$result1 = mysqli_query($conn, $sql1);
		$arr = array();
		$arr['lessonId']= mysqli_insert_id($conn);
		$result2 = mysqli_query($conn, $sql2);
		if (mysqli_affected_rows($conn)) {
			$arr['msg'] = 'success';
		    echo json_encode($arr, JSON_UNESCAPED_UNICODE);
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
