<?php 
if(isset($_POST['id']) && isset($_POST['exam_sort'])){
    require_once('../../conn.php');
    if($conn){
        $id = $_POST['id'];
        $sort = $_POST['exam_sort'];
        $sql = "SELECT * FROM `exam_type` WHERE `exam_sort` = '$sort'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
        // echo $sql;
        if($row>=1){
            echo json_encode('exist', JSON_UNESCAPED_UNICODE);
        }else{
            $sql = "UPDATE `exam_type`  SET `exam_sort`='{$sort}' WHERE `id`={$id}";
            mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn)) {
                echo json_encode('success', JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode('fail', JSON_UNESCAPED_UNICODE);
            }
        }
     }else{
        echo json_encode('fail', JSON_UNESCAPED_UNICODE);
        mysqli_close($conn); 
    }
}else{
    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
}

 ?>
