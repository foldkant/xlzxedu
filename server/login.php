<?php
header("Content-type:application/json; charset=utf-8");
session_start();//开启会话模式
if(isset($_POST['username'])&&isset($_POST['password'])){
  require "conn.php";
  mysqli_query($conn,'SET NAMES UTF8');
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($conn){
    $sql_select = "SELECT * FROM `user_info` WHERE `username`= '$username' AND `password` = '$password'";
    $result = mysqli_query($conn,$sql_select);
    $row = mysqli_num_rows($result);
    if($row == 1){
      $message = mysqli_fetch_array($result);
      $_SESSION['id'] = $message[0];
      $_SESSION['username'] = $message[1];
      $_SESSION['name'] = $message[3];
      $_SESSION['root'] = $message[4];
      $_SESSION['on_off'] = $message[5];
      $id = $_SESSION['id'];
      //不同角色获取不同的表和信息。
      if($_SESSION['root']==2){
        echo json_encode('success', JSON_UNESCAPED_UNICODE);
      }else if($_SESSION['root']==1){
        $sql = "SELECT `subject`,`sex` FROM `teacher_info` WHERE `id` = '$id'"; 
        $messageResult = mysqli_query($conn,$sql);
        $messageRow = mysqli_fetch_array($messageResult);
        $_SESSION['sex'] = $messageRow['1'];
        $_SESSION['subject'] = $messageRow['0'];
        echo json_encode('success', JSON_UNESCAPED_UNICODE);
      }else if($_SESSION['root']==0){
        $sql = "SELECT `sex`,`class` FROM `student_info` WHERE `id` = '$id'"; 
        $messageResult = mysqli_query($conn,$sql);
        $messageRow = mysqli_fetch_array($messageResult);
        $_SESSION['sex'] = $messageRow['0'];
        $_SESSION['class'] = $messageRow['1'];
        echo json_encode('success', JSON_UNESCAPED_UNICODE);
      }
    }else{
      echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    }
  }else{
    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
  }
}

