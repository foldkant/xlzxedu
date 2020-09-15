<?php
header("Content-type:application/json; charset=utf-8");
require_once '../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['subject']) && isset($_POST['sex'])){
    	$id = $_SESSION['id'];
    	$username = $_POST['username'];
    	$name = $_POST['name'];
    	$password = $_POST['password'];
    	$subject = $_POST['subject'];
    	$sex = $_POST['sex'];
    	
    	//更新user_info的信息
    	$sql1 = "UPDATE `user_info`  SET `password`='$password',`on_off`=2 WHERE `id`= '$id'";
    	mysqli_query($conn,$sql1);
    	//删除teacher_info里存在的相同数据
    	$sql2 ="DELETE FROM `teacher_info` WHERE `id`= '$id'";
    	mysqli_query($conn,$sql2);
    	//插入student_info
    	$sql3 = "INSERT INTO `teacher_info` (`id`,`name`,`sex`,`subject`)VALUES('{$id}','{$name}','{$sex}','{$subject}')";
    	mysqli_query($conn,$sql3);
    	if (mysqli_affected_rows($conn)) {
    			$_SESSION['subject'] = $subject;
                $_SESSION['sex'] = $sex;
                $_SESSION['on_off'] = 2;
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
