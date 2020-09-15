<?php
  header("Content-type:application/json; charset=utf-8");
  $convertInfo = array();
  require "../../conn.php";
  $sql_row = "SELECT
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
				WHERE user_info.root=0 AND user_info.on_off=1 
				ORDER BY student_info.class,user_info.id";
  $row = mysqli_num_rows(mysqli_query($conn, $sql_row));
  require "../../PHPExcel.php";//引入PHPExcel加载文件
  $obj_PHPExcel = new PHPExcel();//实例化PHPExcel类 等同于新建一个Excel表格
  $obj_Sheet = $obj_PHPExcel->getActiveSheet(); //获得当前活动sheet的活动对象
  $obj_Sheet->setTitle('学生信息');//设置当前活动Sheet名称
  // 传入数组的方式填充
  //第一个数组为第一行，数组的第一个元素为第一列
  $userInfo = [['学生姓名','用户名','密码','班级']];
  for($i = 1; $i <= $row; $i ++){
    $sql_select = "SELECT
    (@i := @i +1) AS i,
    user_info.id,
    user_info.username,
    user_info.password,
    user_info.name,
    class_info.class
FROM
    (
        user_info
    JOIN student_info ON user_info.id = student_info.id
    JOIN class_info ON student_info.class = class_info.id
    ),
    (
SELECT
    @i := 0
) AS it
WHERE
    user_info.root = 0 AND user_info.on_off = 1 AND(@i := @i +1) = $i
ORDER BY
    student_info.class,
    user_info.id";
	// echo $sql_select.'<br>';
    $result = mysqli_query($conn, $sql_select);
    $message = mysqli_fetch_array($result);
    array_push($userInfo, [$message['name'], $message['username'], $message['password'], $message['class']]);
  }
 
  $obj_Sheet->getColumnDimension('A')->setWidth(15);
  $obj_Sheet->getColumnDimension('B')->setWidth(15);
  $obj_Sheet->getColumnDimension('C')->setWidth(15);
  $obj_Sheet->getColumnDimension('D')->setWidth(15);
  $obj_Sheet->getColumnDimension('E')->setWidth(15);

  $objStyleA = $obj_Sheet->getStyle('A');
  $objAlignA = $objStyleA->getAlignment();
  $objAlignA->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  $objStyleB = $obj_Sheet->getStyle('B');
  $objAlignB = $objStyleB->getAlignment();
  $objAlignB->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  $objStyleC = $obj_Sheet->getStyle('C');
  $objAlignC = $objStyleC->getAlignment();
  $objAlignC->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  $objStyleD = $obj_Sheet->getStyle('D');
  $objAlignD = $objStyleD->getAlignment();
  $objAlignD->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  $objStyleE = $obj_Sheet->getStyle('E');
  $objAlignE = $objStyleE->getAlignment();
  $objAlignE->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

  $obj_Sheet->fromArray($userInfo);

  $userInfoFile;
  do{
    $userInfoFile = '../../../download/student/user-info'.date("YmdHis").rand(1000,9999).'.xlsx';
  }while(file_exists($userInfoFile));

  $obj_Writer = PHPExcel_IOFactory::createWriter($obj_PHPExcel, 'Excel2007');//创建工厂对象
  //操作1 保存文件
  $obj_Writer->save($userInfoFile);//执行保存文件
  array_push($convertInfo, array(
    'convertResult' => true,
    'convertURL' => $userInfoFile
  ));
  header( "Content-Disposition:  attachment;  filename=".'student.xlsx'); //告诉浏览器通过附件形式来处理文件
  header('Content-Length:'.filesize($userInfoFile)); //下载文件大小
  readfile($userInfoFile);  //读取文件内容
