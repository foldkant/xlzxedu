<?php
header("Content-type:application/json; charset=utf-8");
require_once '../conn.php';
session_start();
if ($conn) {
    mysqli_query($conn, "SET NAMES utf8");
    if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['class']) && isset($_POST['sex'])){
    	$id = $_SESSION['id'];
    	$username = $_POST['username'];
    	$name = $_POST['name'];
    	$password = $_POST['password'];
    	$class = $_POST['class'];
    	$sex = $_POST['sex'];
        //获取ip地址
        function ip() {
                //strcasecmp 比较两个字符，不区分大小写。返回0，>0，<0。
                if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
                    $ip = getenv('HTTP_CLIENT_IP');
                } elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))            {
                    $ip = getenv('HTTP_X_FORWARDED_FOR');
                } elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
                    $ip = getenv('REMOTE_ADDR');
                } elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                $res =  preg_match ( '/[\d\.]{7,15}/', $ip, $matches ) ? $matches [0] : '';
                return $res;
                //dump(phpinfo());//所有PHP配置信息
        }
        $ip = iP();      	
    	//更新user_info的信息
    	$sql1 = "UPDATE `user_info`  SET `password`='$password',`on_off`=2 WHERE `id`= '$id'";
    	mysqli_query($conn,$sql1);
    	//删除student_info里存在的相同数据
    	$sql2 ="DELETE FROM `student_info` WHERE `id`= '$id'";
    	mysqli_query($conn,$sql2);
    	//插入student_info
    	$sql3 = "INSERT INTO `student_info` (`id`,`name`,`sex`,`class`,`ip_config`)VALUES('{$id}','{$name}','{$sex}','{$class}','{$ip}')";
    	mysqli_query($conn,$sql3);
    	if (mysqli_affected_rows($conn)) {
    			$_SESSION['class'] = $class;
                $_SESSION['first'] ='0';
                $_SESSION['sex'] = $sex;
                $_SESSION['on_off'] = 2;
                echo json_encode('success', JSON_UNESCAPED_UNICODE);
            }else{
                echo json_encode('fail', JSON_UNESCAPED_UNICODE);
            }
    }else{
    	echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    }
    

} else {
    mysqli_close($conn);
}
?>
