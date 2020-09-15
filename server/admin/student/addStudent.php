<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) ){
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	$name = $_POST['name'];
        //验证用户是否存在
        $sql = "SELECT * FROM `user_info` WHERE `username` = '{$username}'";
         $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) != 0){
            echo json_encode('exist', JSON_UNESCAPED_UNICODE);
        }else{
            $sql = "INSERT INTO `user_info` (`username`,`password`,`name`,`root`)VALUES('{$username}','{$password}','{$name}','0')";
            $result = mysqli_query($conn, $sql);
            $id = $conn->insert_id;
            $sql2 = "INSERT INTO `student_info` (`id`,`name`,`class`)VALUES('{$id}','{$name}','0')";
            mysqli_query($conn, $sql2);
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
