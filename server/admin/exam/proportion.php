<?php 
$data = json_decode($_POST['data']);
require_once('../../conn.php');
mysqli_query($conn,"SET NAMES utf8");
if ($conn) {
	foreach($data as $obj){
	    $examId = $obj->exam_id;
	    $a = $obj->proportion_a;
	    $b = $obj->proportion_b;
	    $c = $obj->proportion_c;
	    $d = $obj->proportion_d;
	    $sql1 = "DELETE FROM `pre_exam_proportion` WHERE `exam_id`='{$examId}'";
	    $sql2 = "INSERT INTO `pre_exam_proportion`(`exam_id`, `proportion_a`, `proportion_b`, `proportion_c`, `proportion_d`) VALUES ('{$examId}','{$a}','{$b}','{$c}','{$d}')";
	    mysqli_query($conn,$sql1);
	    mysqli_query($conn,$sql2);

	}
	if (mysqli_affected_rows($conn)) {
	        echo json_encode('success', JSON_UNESCAPED_UNICODE);
	    }else{
	    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
	}
}else{
	mysqli_close($conn);
}


?>

