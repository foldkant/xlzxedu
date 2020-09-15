	<?php 
	header("Content-type:application/json; charset=utf-8");
	require_once('../../conn.php');

	if($conn){
		//执行成功的过程
		mysqli_query($conn,"SET NAMES utf8");
		session_start();
		if(isset($_GET['classId'])){
			$classId = $_GET['classId'];
			$countSql = "SELECT
				COUNT(*)
            FROM
                user_info
            JOIN student_info ON user_info.id = student_info.id
            JOIN class_info ON student_info.class = class_info.id
            WHERE
                user_info.root = 0 AND user_info.on_off != 0 AND student_info.class='$classId'
            ORDER BY
                student_info.class,user_info.id";
            }else{
            	$countSql = "SELECT
				COUNT(*)
            FROM
                user_info
            JOIN student_info ON user_info.id = student_info.id
            JOIN class_info ON student_info.class = class_info.id
            WHERE
                user_info.root = 0 AND user_info.on_off != 0
            ORDER BY
                student_info.class,user_info.id";
            }
		
		$countResult = mysqli_query($conn,$countSql);
		$countRow = mysqli_fetch_array($countResult);
		$count = $countRow[0];
		
		$pageNum = isset($_GET['limit'])?$_GET['limit']:10; //接收每页显示多少条记录
		$page = ceil($count/$pageNum);//总页数，ceil向上取整
		$page = isset($_GET['page'])?$_GET['page']:1;//当前是第几页
		$startpos = ($page-1)*$pageNum;//开始位置，默认从0开始
		if(isset($_GET['classId'])){
			$classId = $_GET['classId'];
			$sql = "SELECT
                user_info.id,
                user_info.username,
                user_info.password,
                user_info.name,
                student_info.sex,
                class_info.class
            FROM
                user_info
            JOIN student_info ON user_info.id = student_info.id
            JOIN class_info ON student_info.class = class_info.id
            WHERE
                user_info.root = 0 AND user_info.on_off != 0 AND student_info.class='$classId'
            ORDER BY
                student_info.class,user_info.id
            LIMIT $startpos,$pageNum";
		}else{
			$sql = "SELECT
                user_info.id,
                user_info.username,
                user_info.password,
                user_info.name,
                student_info.sex,
                class_info.class
            FROM
                user_info
            JOIN student_info ON user_info.id = student_info.id
            JOIN class_info ON student_info.class = class_info.id
            WHERE
                user_info.root = 0 AND user_info.on_off != 0
            ORDER BY
                student_info.class,user_info.id
            LIMIT $startpos,$pageNum";
		}
		
		$result = mysqli_query($conn,$sql);
		$senddata = array();
		$senddata['code']=0;
		$senddata['msg']='';
		$senddata['count']=$count;
		while($row = mysqli_fetch_assoc($result)){
			$senddata['data'][]=$row;
		}
		
		echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
	}else{
		mysqli_close($conn);
	}



	 ?>
