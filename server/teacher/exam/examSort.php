<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
    $sql = "SELECT * FROM  `exam_type`";
     // echo($sql);
    $result = mysqli_query($conn,$sql);
    $senddata = array();
    while($row = mysqli_fetch_assoc($result)){
  		array_push($senddata, array(
			'id'=>$row['id'],
			'sort'=>$row['exam_sort']
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
