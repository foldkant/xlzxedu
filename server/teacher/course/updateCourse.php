<?php 
if(isset($_POST['id']) && isset($_POST['title'])){
    require_once('../../conn.php');
    if($conn){
        //转码
        $id = $_POST['id'];
        $title = $_POST['title'];
        $sql = "UPDATE `course`  SET `title`='{$title}' WHERE `id`={$id}";
        mysqli_query($conn,$sql);
        if (mysqli_affected_rows($conn)) {
            echo json_encode('success', JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode('fail', JSON_UNESCAPED_UNICODE);
        }
     }else{
        echo json_encode('fail', JSON_UNESCAPED_UNICODE);
        mysqli_close($conn); 
    }
}else{
    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
}

 ?>
