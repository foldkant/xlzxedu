<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
    $sql = "SELECT * FROM `class_info` WHERE `id` !=0";
     // echo($sql);
    $result = mysqli_query($conn,$sql);
    $senddata = array();
    while($row = mysqli_fetch_assoc($result)){
  		array_push($senddata, array(
	'classId'=>$row['id'],
	'className'=>$row['class'],
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
