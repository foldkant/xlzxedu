<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	session_start();
	$id = $_SESSION['id'];
    $sql = "SELECT class_info.id,class_info.class FROM  
		teacher_class
		JOIN class_info ON teacher_class.class_id =  class_info.id
     WHERE teacher_class.teacher_id = $id";
     // echo($sql);
    $result = mysqli_query($conn,$sql);
    $senddata = array();
    while($row = mysqli_fetch_assoc($result)){
  		array_push($senddata, array(
	'classId'=>$row['id'],
	'class'=>$row['class'],
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
