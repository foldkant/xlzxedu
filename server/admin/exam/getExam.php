<?php 
header("Content-type:application/json; charset=utf-8");
if(isset($_POST['sort'])){
	require_once('../../conn.php');
	if($conn){
		//执行成功的过程
		mysqli_query($conn,"SET NAMES utf8");
		$sort = $_POST['sort'];
		$sql = "SELECT * FROM `exam` WHERE `type` = '$sort'";
		 // echo($sql);
		$result = mysqli_query($conn,$sql);
		$senddata = array();
		while($row = mysqli_fetch_assoc($result)){
		  	array_push($senddata, array(
				'examId'=>$row['id'],
				'question'=>$row['question']
			));
		}
		echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
	}else{
		mysqli_close($conn);
	}
}else{
	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
}




 ?>
