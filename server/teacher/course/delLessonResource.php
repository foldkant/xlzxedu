<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['id'])&&isset($_POST['src'])){
    	$id = $_POST['id'];
	    $sql = "DELETE FROM `lesson_resource` WHERE `id`={$id}";
	    $result = mysqli_query($conn, $sql);
	    unlink($_POST['src']);
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
