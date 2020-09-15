<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['data']) && isset($_GET['lessonId'])){
    	$data = $_POST['data'];
    	$lessonId = $_GET['lessonId'];
    	// echo $lessonId;
    	$data = json_decode($data);
        if($lessonId == -1){//如果是调查问卷则，在比重表中新增相应的试题数据
            $sql = "TRUNCATE `pre_exam_proportion`";
            mysqli_query($conn, $sql);
            foreach($data as $obj){
                $id = $obj->value;
                $sql = "INSERT INTO `pre_exam_proportion` (`exam_id`)VALUES('{$id}')";
                $result = mysqli_query($conn, $sql);
                // echo $sql;
            }   
        }else{
            $sql = "DELETE FROM `lesson_exam` WHERE `lesson_id` = '{$lessonId}'";
            // echo $sql;
            mysqli_query($conn, $sql);
            foreach($data as $obj){
                $id = $obj->value;
                $sql = "INSERT INTO `lesson_exam` (`lesson_id`,`exam_id`)VALUES('{$lessonId}','{$id}')";
                $result = mysqli_query($conn, $sql);
                // echo $sql;
            }    
        }
    	  
	    if (mysqli_affected_rows($conn)) {
	        echo json_encode('success', JSON_UNESCAPED_UNICODE);
	    }else{
	    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
	    }
    }else{
    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    }
    

} else {
    mysqli_close($conn);
}
?>
