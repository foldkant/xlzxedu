<?php 
if(isset($_POST['id']) && isset($_POST['title'])){
    require_once('../../conn.php');
    if($conn){
        //转码
        $id = $_POST['id'];
        $title = $_POST['title'];
        //partA
		if(isset($_POST['goalA'])){
			$goalA= $_POST['goalA'];
		}else{
			$goalA= '';
		}
		if(isset($_POST['contentA'])){
			$contentA= $_POST['contentA'];
		}else{
			$contentA= '';
		}
		if(isset($_POST['taskA'])){
			$taskA= $_POST['taskA'];
		}else{
			$taskA= '';
		}

		//partB
		if(isset($_POST['goalB'])){
			$goalB= $_POST['goalB'];
		}else{
			$goalB= '';
		}
		if(isset($_POST['contentB'])){
			$contentB= $_POST['contentB'];
		}else{
			$contentB= '';
		}
		if(isset($_POST['taskB'])){
			$taskB= $_POST['taskB'];
		}else{
			$taskB= '';
		}


		//partC
		if(isset($_POST['goalC'])){
			$goalC= $_POST['goalC'];
		}else{
			$goalC= '';
		}
		if(isset($_POST['contentC'])){
			$contentC= $_POST['contentC'];
		}else{
			$contentC= '';
		}
		if(isset($_POST['taskC'])){
			$taskC= $_POST['taskC'];
		}else{
			$taskC= '';
		}

        $sql = "UPDATE `lesson`  
        		SET 
        			`title`='{$title}',
        			`goal_a`='{$goalA}',
        			`content_a`='{$contentA}',
        			`task_a`='{$taskA}',
        			`goal_b`='{$goalB}',
        			`content_b`='{$contentB}',
        			`task_b`='{$taskB}',
        			`goal_c`='{$goalC}',
        			`content_c`='{$contentC}',
        			`task_c`='{$taskC}'
        		WHERE `id`={$id}";
        // echo $sql;		
        mysqli_query($conn,$sql);
        if (mysqli_affected_rows($conn)) {
            echo json_encode('success', JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode('fail', JSON_UNESCAPED_UNICODE);
        }
     }else{
        echo json_encode('fail', JSON_UNESCAPED_UNICODE);
        mysqli_close($conn); 
    }
}else{
    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
}

 ?>
