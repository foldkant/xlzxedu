<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	$className = $_GET['class'];
	mysqli_query($conn,"SET NAMES utf8");
    $sql = "SELECT * FROM `student_info` WHERE `class`= $className";
     // echo($sql);
    $result = mysqli_query($conn,$sql);
    $senddata = array();
    while($row = mysqli_fetch_assoc($result)){
  		array_push($senddata, array(
	'id'=>$row['id'],
	'name'=>$row['name'],
	'ip'=>$row['ip_config']
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
