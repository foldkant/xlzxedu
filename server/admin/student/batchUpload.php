<?php
$filePath = '../../../upload/admin/student.xlsx';
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
   ); 

  //在这儿，你可以连接，你的数据库，写入数据库了 
  // echo '<br />'; 

  mysqli_set_charset($conn, "utf8");
    if($info['word1']!=''||$info['word2']!=''){
       $insertSql = "INSERT INTO `user_info` (`username`,`name`,`password`) VALUES ('{$info['word1']}','{$info['word2']}','123456')";
        mysqli_query($conn,$insertSql);
        $id = $conn->insert_id;
        $insertsql2 = "INSERT INTO `student_info` (`id`,`name`,`class`)VALUES('{$id}','{$info['word2']}','0')";
        mysqli_query($conn,$insertsql2);
       // print($insertSql.'<br>'); 
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

 ?>