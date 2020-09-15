<?php
$sort = $_POST['sort'];
if($sort == ''){
	$msg=['code'=>0,'msg'=>"exist"];
  	echo json_encode($msg, JSON_UNESCAPED_UNICODE);
}else{
	$filePath = '../../../upload/teacher/exam.xlsx';
	if(move_uploaded_file($_FILES['file']['tmp_name'],$filePath)){
	  include '../../PHPExcel/IOFactory.php'; 
	//$inputFileType = 'Excel5'; //这个是读 xls的 
	$inputFileType = 'Excel2007';//这个是计xlsx的 
	//$inputFileName = './sampleData/example2.xls'; 
	$inputFileName = $filePath;

	// echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory with a defined reader type of ',$inputFileType,'<br />'; 
	$objReader = PHPExcel_IOFactory::createReader($inputFileType); 
	$objPHPExcel = $objReader->load($inputFileName); 
	/* 
	$sheet = $objPHPExcel->getSheet(0); 
	$highestRow = $sheet->getHighestRow(); //取得总行数 
	$highestColumn = $sheet->getHighestColumn(); //取得总列 
	*/ 
	$objWorksheet = $objPHPExcel->getActiveSheet();//取得总行数 
	$highestRow = $objWorksheet->getHighestRow();//取得总列数 

	// echo 'highestRow='.$highestRow; 
	// echo "<br>"; 
	$highestColumn = $objWorksheet->getHighestColumn(); 
	$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数 
	// echo 'highestColumnIndex='.$highestColumnIndex; 
	// echo "<br />";
	//***导入前清空数据表***
	require "../../conn.php";
	if($conn){
	//   $delSql ="TRUNCATE TABLE `user_info`";
	// mysqli_query($conn,$delSql);
	$headtitle=array();
	for ($row = 2;$row <= $highestRow;$row++) { 
	  $strs=array(); 
	  //注意highestColumnIndex的列数索引从0开始 
	  for ($col = 0;$col < $highestColumnIndex;$col++){ 
	  $strs[$col] =$objWorksheet->getCellByColumnAndRow($col, $row)->getValue(); 
	  } 
	  $info = array( 
	   'word1'=>"$strs[0]", 
	   'word2'=>"$strs[1]", 
	   'word3'=>"$strs[2]", 
	   'word4'=>"$strs[3]", 
	   'word5'=>"$strs[4]", 
	   'word6'=>"$strs[5]", 
	   ); 

	  //在这儿，你可以连接，你的数据库，写入数据库了 
	  // echo '<br />'; 

	  mysqli_set_charset($conn, "utf8");
	  if($info['word1']!=''){
	  	$insertSql = "INSERT INTO `exam` (`type`,`question`,`a`,`b`,`c`,`d`,`answer`) VALUES ('{$sort}','{$info['word1']}','{$info['word2']}','{$info['word3']}','{$info['word4']}','{$info['word5']}','{$info['word6']}')";
	  	mysqli_query($conn,$insertSql);
	  }
	 
	 
	   
	  }
	  // unlink($inputFileName);
	  $msg=['code'=>1,'msg'=>"上传成功"];

	  echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	}else{
	  $msg=['code'=>0,'msg'=>"上传失败"];

	  echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	}
	}else{
	  $msg=['code'=>0,'msg'=>"上传失败"];

	  echo json_encode($msg, JSON_UNESCAPED_UNICODE);
	}

	}

 ?>