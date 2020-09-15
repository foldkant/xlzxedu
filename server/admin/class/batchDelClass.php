<?php
header("Content-type:application/json; charset=utf-8");
require_once '../../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['data'])){
    	$data = $_POST['data'];
    	$data = json_decode($data);
    	foreach($data as $obj){
	        $id = $obj->id;
	        $sql = "DELETE FROM `class_info`  WHERE `id`={$id}";
	   		$result = mysqli_query($conn, $sql);
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
