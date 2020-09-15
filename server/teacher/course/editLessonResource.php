<?php 
if(isset($_GET['lessonId'])){
  require_once('../../conn.php');
  $lessonId = $_GET['lessonId'];
  //上传文件目录获取
  define('BASE_PATH',str_replace('\\','/',realpath(dirname(__FILE__).'/'))."/");
  $dir = "../../../upload/lessonResource/";
  //初始化返回数组
  $arr = array(
  'code' => 0,
  'msg'=> '',
  );
  $file_info = $_FILES['file'];
  $file_error = $file_info['error'];
  if(!is_dir($dir))//判断目录是否存在
  {
      mkdir ($dir,0777,true);//如果目录不存在则创建目录
  };
  $file = $dir.$_FILES["file"]["name"];
  if(!file_exists($file)){
    if($file_error == 0){
      $a = "../../../upload/lessonResource/". $_FILES["file"]["name"];
      if(move_uploaded_file($_FILES["file"]["tmp_name"],$dir. $_FILES["file"]["name"])){
        $sql = "INSERT INTO `lesson_resource` (`title`,`lesson_id`,`src`)VALUES('{$_FILES["file"]["name"]}','{$lessonId}','{$a}')";
        $result = mysqli_query($conn, $sql);
       if (mysqli_affected_rows($conn)){
          $arr['msg'] ="上传成功";
          $arr['filename'] = $a;
       }else{
         $arr['msg'] = "上传失败";
       }
      }else{
         $arr['msg'] = "上传失败";
      }
    }else{
      switch($file_error){
          case 1:
         $arr['msg'] ='上传文件超过了PHP配置文件中upload_max_filesize选项的值';
              break;
          case 2:
            $arr['msg'] ='超过了表单max_file_size限制的大小';
              break;
          case 3:
             $arr['msg'] ='文件部分被上传';
              break;
          case 4:
            $arr['msg'] ='没有选择上传文件';
              break;
          case 6:
              $arr['msg'] ='没有找到临时文件';
              break;
          case 7:
          case 8:
             $arr['msg'] = '系统错误';
              break;
      }
    }
  }else{
    //如果文件已经存在则重命名
    $newfilename = rand(1,100).$_FILES["file"]["name"];
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$dir. $newfilename)){
	   if($conn){
		   $a = "../../../upload/lessonResource/".$newfilename;
		   $sql = "INSERT INTO `lesson_resource` (`title`,`lesson_id`,`src`)VALUES('{$_FILES["file"]["name"]}','{$lessonId}','{$a}')";
		   $result = mysqli_query($conn, $sql);
		   if (mysqli_affected_rows($conn)) {
		      $arr['msg'] ="上传成功";
		      $arr['filename'] = $a;
		   }else{
		      $arr['msg'] = "上传失败";
		   }
		   
	   }else{
		   $arr['msg'] = "上传失败";
	   }
    }else{
       $arr['msg'] = "上传失败";
    }
  }
  echo json_encode($arr);
}

 ?>