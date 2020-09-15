<?php 
session_start();

if(isset($_SESSION['root'])){
  if(($_SESSION['root']) == 2){
    
  }else if(($_SESSION['root']) == 1){
    header('Location: ../');
  }else if(($_SESSION['root']) == 0){
    header('Location: ../');
  }else{
    header('Location: ../login.php');
  }
}else{
  header('Location: ../login.php');
}


?>