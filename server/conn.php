<?php
header('Content-Type:text/html;charset=utf-8');
$servername = "127.0.0.1"; //数据库服务器名
$username = "root"; //用户名
$password = ""; //密码
$dbname = "edu"; //数据库
$conn = new mysqli($servername, $username, $password, $dbname);
date_default_timezone_set('PRC');
//设置mysqli编码
mysqli_query($conn,'SET NAMES UTF8');
if ($conn->connect_error) {
    echo json_encode('fail', JSON_UNESCAPED_UNICODE);
    exit;
}