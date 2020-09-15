<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../conn.php');

if($conn){
	//执行成功的过程
	mysqli_query($conn,"SET NAMES utf8");
	$lessonId = $_POST['lessonId'];
    $sql = "
    SELECT 
	    exam.id,
	    exam.question,
	    exam.a,
	    exam.b,
	    exam.c,
	    exam.d    
    FROM  
    	exam 
    JOIN 
    	lesson_exam
    ON 
    	exam.id = lesson_exam.exam_id
    WHERE 
    	lesson_exam.lesson_id='{$lessonId}'
    ORDER BY
    	exam.id
    ASC";
    $result = mysqli_query($conn,$sql);
    $senddata = array();
    while($row = mysqli_fetch_assoc($result)){
  		array_push($senddata, array(
			'id'=>$row['id'],
			'question'=>$row['question'],
			'a'=>$row['a'],
			'b'=>$row['b'],
			'c'=>$row['c'],
			'd'=>$row['d']
		));
	}
	echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
