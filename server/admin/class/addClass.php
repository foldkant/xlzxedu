<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_GET['class']) && isset($_GET['grade'])){
    	$className = $_GET['class'];
    	$grade = $_GET['grade'];
        $name = '高'.$grade.'（'.$className.'）班';
        $ifsql = "SELECT * FROM `class_info` WHERE `class` = '{$name}'";
        $ifresult = mysqli_query($conn, $ifsql);
        if(mysqli_num_rows($ifresult) != 0){
            echo json_encode('exist', JSON_UNESCAPED_UNICODE);
        }else{
            $sql = "INSERT INTO `class_info` (`class`)VALUES('{$name}')";
            $result = mysqli_query($conn, $sql);
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
