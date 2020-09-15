	<?php 
	header("Content-type:application/json; charset=utf-8");
	require_once('../../conn.php');

	if($conn){
		//执行成功的过程
		mysqli_query($conn,"SET NAMES utf8");
		session_start();
		$lessonId = $_GET['lessonId'];
		if(isset($_GET['lessonInfo'])){
			$sql = "SELECT * FROM `lesson_resource` WHERE `lesson_id`='$lessonId'";
			$result = mysqli_query($conn,$sql);
			$senddata = array();
			while($row = mysqli_fetch_assoc($result)){
				array_push($senddata,array(
					'id' => $row['id'],
					'title' => $row['title'],
					'src' => $row['src']
				));
			}
			echo json_encode($senddata,JSON_UNESCAPED_UNICODE);	
		}else{
			$countSql = "SELECT COUNT(*) FROM `lesson_resource` WHERE `lesson_id`= $lessonId";
			$countResult = mysqli_query($conn,$countSql);
			$countRow = mysqli_fetch_array($countResult);
			$count = $countRow[0];
			
			$pageNum = isset($_GET['limit'])?$_GET['limit']:10; //接收每页显示多少条记录
			$page = ceil($count/$pageNum);//总页数，ceil向上取整
			$page = isset($_GET['page'])?$_GET['page']:1;//当前是第几页
			$startpos = ($page-1)*$pageNum;//开始位置，默认从0开始
			$sql = "SELECT * FROM `lesson_resource` WHERE `lesson_id`= $lessonId LIMIT $startpos,$pageNum";
			 // echo($sql);
			$result = mysqli_query($conn,$sql);
			$senddata = array();
			$senddata['code']=0;
			$senddata['msg']='';
			$senddata['count']=$count;
			while($row = mysqli_fetch_assoc($result)){
				$senddata['data'][]=$row;
			}
			
			echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
		}
	}else{
		mysqli_close($conn);
	}



	 ?>
