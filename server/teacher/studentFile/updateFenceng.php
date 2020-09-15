<?php 
header("Content-type:application/json; charset=utf-8");
require_once('../../conn.php');

if($conn){
	//统计所有学生的积分  并更新到学生的信息表中
	$sql = "UPDATE student_info SET student_info.score=(SELECT SUM(attendance+active+task_a+task_b+task_c) FROM `student_study_file` WHERE student_info.id=student_study_file.student_id)";
	mysqli_query($conn,$sql);
	//分层
	//查找班级并遍历操作
	$sql2 = "SELECT `id` FROM `class_info`";
	$result= mysqli_query($conn,$sql2);
	$arr=array();
	while($rows=mysqli_fetch_array($result)){
	   $arr[] = $rows['id'];//把id存放到数组里
	}
	foreach($arr as $key => $value){
		if($value != '0'){
			//班级人数

			$sql = "SELECT COUNT(*) FROM `student_info` WHERE `class` = $value";
			$res = mysqli_fetch_array(mysqli_query($conn,$sql));
			//分三层
			$c2 = $res[0];
			$a = ($res[0]-$res[0]%3)/3;
			$b = 2*$a;			
			$sql1 = "SELECT student_info.id FROM student_info WHERE student_info.class = $value  GROUP BY `score` DESC LIMIT $a";
			$sql2 = "SELECT `id` FROM student_info WHERE `class` = $value  GROUP BY `score` DESC LIMIT $a,$a";
			$sql3 = "SELECT student_info.id,student_info.score,student_info.grade FROM student_info WHERE student_info.class = $value  GROUP BY `score` DESC LIMIT $b,18446744073709551615";
			$result1= mysqli_query($conn,$sql1);
			$result2= mysqli_query($conn,$sql2);
			$result3= mysqli_query($conn,$sql3);
			$arr1=array();
			$arr2=array();
			$arr3=array();
			while($rows=mysqli_fetch_array($result1)){
			   $arr1[] = $rows['id'];//把id存放到数组里
			}
			while($rows=mysqli_fetch_array($result2)){
			   $arr2[] = $rows['id'];//把id存放到数组里
			}
			while($rows=mysqli_fetch_array($result3)){
			   $arr3[] = $rows['id'];//把id存放到数组里
			}
			foreach($arr1 as $key => $v){
				$sql = "UPDATE `student_info` SET `grade` = 'A' WHERE `student_info`.`id` = $v";
				mysqli_query($conn,$sql);
			}
			foreach($arr2 as $key => $v){
				$sql = "UPDATE `student_info` SET `grade` = 'B' WHERE `student_info`.`id` = $v";
				mysqli_query($conn,$sql);
			}
			foreach($arr3 as $key => $v){
				$sql = "UPDATE `student_info` SET `grade` = 'C' WHERE `student_info`.`id` = $v";
				mysqli_query($conn,$sql);
			}
		}
	}
	echo json_encode('success', JSON_UNESCAPED_UNICODE);
}else{
	mysqli_close($conn);
}



 ?>
