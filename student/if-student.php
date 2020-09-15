<?php 
session_start();
if(isset($_SESSION['root'])){
  if(($_SESSION['root']) == 2){
     header('Location: admin');
  }else if(($_SESSION['root']) == 1){
    header('Location: teacher');
  }else if(($_SESSION['root']) == 0){
    if($_SESSION['on_off']==1){
       header('Location: first-login.php');
    }  	
  }else{
    header('Location: login.php');
  }
}else{
  header('Location: login.php');
}
if($_SESSION['sex']=='男'){
 $sexPic = '../static//images/pic01.png';
}else if($_SESSION['sex']=='女'){
 $sexPic = '../static/images/pic02.png';
}else{
 $sexPic = '../static/images/pic01.png';
}


?>