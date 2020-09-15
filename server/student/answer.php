<?php
header("Content-type:application/json; charset=utf-8");
require_once '../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['data']) &&isset($_GET['lessonId'])){
    	$id = $_SESSION['id'];
        $name = $_SESSION['name'];
    	$classId = $_SESSION['class'];
    	$data = json_encode($_POST['data'], JSON_UNESCAPED_UNICODE);;
    	$lessonId = $_GET['lessonId'];
        $score = 0;
    	//若已经已经答过该课时的题目，则不能再答卷
    	$sql1 = "SELECT * FROM `student_exam` WHERE `student_id`= '{$id}' AND `lesson_id`='{$lessonId}'";
    	$result1 = mysqli_query($conn,$sql1);
        $row1 = mysqli_num_rows($result1);
		// echo $row1;
        if($row1 >=1){
            echo json_encode('exist', JSON_UNESCAPED_UNICODE);
        }else{
            //插入
            $sql2 = "INSERT INTO `student_exam` (`student_id`,`student_name`,`class_id`,`lesson_id`,`answer`)VALUES('{$id}','{$name}','{$classId}','{$lessonId}','{$data}')";
            mysqli_query($conn,$sql2);
            //以下为实现答题的得分情况功能
            //其中前测问卷30分  前测试卷70分
            //公式： 
            // 问卷：分数 = 30/题目数*比重/4  其中比重设置为1,2,3,4 4个档次
            // 测试：分数 = 70/题目数*回答正确题目数
            //1、判读是调查问卷还是测试题
            if($lessonId == -1){//前测问卷
                //获取问卷得分比重
                $sql3 ="SELECT * FROM `pre_exam_proportion`";
                $result3 = mysqli_query($conn,$sql3);
                $proportion = array();
                while($row = mysqli_fetch_assoc($result3)){
                    array_push($proportion, array(
                        'exam_id'=>$row['exam_id'],
                        'A'=>$row['proportion_a'],
                        'B'=>$row['proportion_b'],
                        'C'=>$row['proportion_c'],
                        'D'=>$row['proportion_d']
                    ));
                }
                foreach($_POST['data'] as $key => $value){
                    for ($i=0; $i <count($proportion) ; $i++) { 
                        if($key == $proportion[$i]['exam_id']){
                            $score = $score+30/count($proportion)*($proportion[$i][$value])/4;
                        }
                    }  
                }
                $sql4 = "INSERT INTO `student_study_record` (`student_id`,`student_name`,`lesson_id`,`item`,`score`)VALUES('{$id}','{$name}','{$lessonId}','前测问卷基础分','{$score}')";
                mysqli_query($conn,$sql4);
                //判断学生档案表中是否有这个数据 没有则insert 有则update
                $sql5 = "SELECT * FROM `student_study_file` WHERE student_id = '{$id}' AND `lesson_id` = '{$lessonId}'";
                $result5 = mysqli_query($conn,$sql5);
                if(mysqli_num_rows($result5)>0){
                    $sql6 = "UPDATE `student_study_file` SET `active`=`active`+$score WHERE student_id = '{$id}' AND `lesson_id` = '{$lessonId}'";
                    mysqli_query($conn,$sql6);
                }else{
                    $sql6 = "INSERT INTO `student_study_file` (`student_id`,`student_name`,`lesson_id`,`active`)VALUES('{$id}','{$name}','{$lessonId}','{$score}')";
                    mysqli_query($conn,$sql6);
                }
                if (mysqli_affected_rows($conn)) {
                    echo json_encode('success', JSON_UNESCAPED_UNICODE);
                }else{
                    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
                }
            }else if($lessonId == -2){//前测测试
                //获取答案
                $sql7 = "
                    SELECT 
                        exam.id,
                        exam.answer    
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
                $result7 = mysqli_query($conn,$sql7);
                $answer = array();
                while($row = mysqli_fetch_assoc($result7)){
                    array_push($answer, array(
                        'id'=>$row['id'],
                        'answer'=>$row['answer']
                    ));
                }
                
                foreach($_POST['data'] as $key => $value){
                    for ($i=0; $i <count($answer) ; $i++) { 
                        if($key == $answer[$i]['id']){
                           if($value == $answer[$i]['answer']){
                                $score = $score+70/count($answer);
                           }
                        }
                    }  
                }
                 $sql4 = "INSERT INTO `student_study_record` (`student_id`,`student_name`,`lesson_id`,`item`,`score`)VALUES('{$id}','{$name}','{$lessonId}','前测测试基础分','{$score}')";
                mysqli_query($conn,$sql4);
                //判断学生档案表中是否有这个数据 没有则insert 有则update
                $sql5 = "SELECT * FROM `student_study_file` WHERE student_id = '{$id}' AND `lesson_id` = '{$lessonId}'";
                $result5 = mysqli_query($conn,$sql5);
                if(mysqli_num_rows($result5)>0){
                    $sql6 = "UPDATE `student_study_file` SET `active`=`active`+$score WHERE student_id = '{$id}' AND `lesson_id` = '{$lessonId}'";
                    mysqli_query($conn,$sql6);
                }else{
                    $sql6 = "INSERT INTO `student_study_file` (`student_id`,`student_name`,`lesson_id`,`active`)VALUES('{$id}','{$name}','{$lessonId}','{$score}')";
                    mysqli_query($conn,$sql6);
                }
                if (mysqli_affected_rows($conn)) {
                    echo json_encode('success', JSON_UNESCAPED_UNICODE);
                }else{
                    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
                }
            }
        }
        
    }else{
    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    }
    

} else {
    mysqli_close($conn);
}
?>
