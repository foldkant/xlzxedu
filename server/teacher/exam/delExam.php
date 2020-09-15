<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_GET['id'])){
    	$id = $_GET['id'];
	    $sql = "DELETE FROM `exam` WHERE `id`={$id}";
	    $result = mysqli_query($conn, $sql);
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
