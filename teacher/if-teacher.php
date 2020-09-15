<?php 
session_start();
if(isset($_SESSION['root'])){
  if(($_SESSION['root']) == 2){
     header('Location: ../admin');
  }else if(($_SESSION['root']) == 1){
  	if($_SESSION['on_off']==1){
    	header('Location: first-login.php');
	}
  }else if(($_SESSION['root']) == 0){
  	header('Location: ../student');
  }else{
    header('Location: ../login.php');
  }
}else{
  header('Location: ../login.php');
}
if($_SESSION['sex']=='男'){
 $sexPic = '../static/images/pic01.png';
}else if($_SESSION['sex']=='女'){
 $sexPic = '../static/images/pic02.png';
}else{
 $sexPic = '../static/images/pic01.png';
}

require_once('../server/conn.php');
if($conn){
    //执行成功的过程
    mysqli_query($conn,"SET NAMES utf8");
    $id = $_SESSION['id'];
    $sql = "SELECT * FROM `notice` WHERE `teacher_id`='$id'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $notice = $row[3];
}else{
    mysqli_close($conn);
}
?>

<script>
	localStorage.setItem('id',<?php echo $_SESSION['id']?>);		
</script>