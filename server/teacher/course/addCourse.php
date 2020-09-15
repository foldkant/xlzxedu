<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	if(isset($_POST['title']) && isset($_POST['img'])&& isset($_POST['introduction'])&& isset($_POST['width'])&& isset($_POST['height'])){
		session_start();
		if($_SESSION['sex']=='男'){
		 $sexPic = '../static/images/pic01.png';
		}else if($_SESSION['sex']=='女'){
		 $sexPic = '../static/images/pic02.png';
		}else{
		 $sexPic = '../static/images/pic01.png';
		}
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$title = $_POST['title'];
		if($_POST['img']==''){
			$img = '../../../upload/coursePic/fly.jpg';
		}else{
			$img = $_POST['img'];
		}
		$width  = $_POST['width'];
		$height  = $_POST['height'];
		$introduction = $_POST['introduction'];
		$sql = "INSERT INTO `course` (`title`,`img`,`width`,`height`,`introduction`,`teacher_id`,`teacher_name`,`teacher_pic`)VALUES('{$title}','{$img}','{$width}','{$height}','{$introduction}','{$id}','{$name}','{$sexPic}')";
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
