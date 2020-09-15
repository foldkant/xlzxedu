<?php
header("Content-type:application/json; charset=utf-8");
require_once '../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['data'])){
    	$id = rand(1,1000);
    	$name = '测试学生';
    	$data = $_POST['data'];
    	$lessonId = -2;
    	//若已经已经答过该课时的题目，则不能再答卷
    	$sql1 = "SELECT * FROM `student_exam` WHERE `student_id`= '{$id}' AND `lesson_id`='{$lessonId}'";
    	$result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_num_rows($result1);
		// echo $row1;
        if($row1 >=1){
            echo json_encode('exist', JSON_UNESCAPED_UNICODE);
        }else{
            //插入
            $sql3 = "INSERT INTO `student_exam` (`student_id`,`student_name`,`class_id`,`lesson_id`,`answer`)VALUES('{$id}','{$name}','{classId}','{$lessonId}','{$data}')";
            mysqli_query($conn,$sql3);
			echo $sql3;
            if (mysqli_affected_rows($conn)) {
                echo json_encode('success', JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode('fail', JSON_UNESCAPED_UNICODE);
            }
        }
    	
    	
    }else{
    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    }
    

} else {
    mysqli_close($conn);
}
?>
