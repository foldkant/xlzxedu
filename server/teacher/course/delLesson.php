<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_GET['id'])&&isset($_GET['courseId'])){
    	$id = $_GET['id'];
		$courseId = $_GET['courseId'];
	    $sql1 = "DELETE FROM `lesson` WHERE `id`={$id}";
		$sql2 = "update `course` set `lesson_num`=`lesson_num`-1 where `id`= $courseId;";
	    $result1 = mysqli_query($conn, $sql1);
		$result2 = mysqli_query($conn, $sql2);
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
