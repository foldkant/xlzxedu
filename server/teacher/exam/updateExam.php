<?php 
if(isset($_POST['id']) && isset($_POST['question'])&& isset($_POST['a'])&& isset($_POST['b'])&& isset($_POST['c'])&& isset($_POST['d'])&& isset($_POST['answer'])){
    require_once('../../conn.php');
    if($conn){
        $id = $_POST['id'];
        $question = $_POST['question'];
        $a = $_POST['a'];
        $b = $_POST['b'];
        $c = $_POST['c'];
        $d = $_POST['d'];
        $answer = $_POST['answer'];
        $sql = "UPDATE `exam`  SET `question`='{$question}',`a`='{$a}',`b`='{$b}',`c`='{$c}',`d`='{$d}',`answer`='{$answer}' WHERE `id`={$id}";
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
