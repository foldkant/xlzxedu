<?php
    session_start();
    header('Content-type:text/html;charset=utf-8');
    session_unset();//free all session variable
    session_destroy();//销毁一个会话中的全部数据
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登出 - 过程性评价分层教学平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/css/admin.css" media="all">
    <link rel="stylesheet" href="static/css/login.css" media="all">
</head>

<body>
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
        <div class="layadmin-user-login-main" style="margin-top: 50px;">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>你已退出登录</h2>
            </div>
            <div class="loginBox" style="text-align: center;">
                <a href="index.php">
                    <button class="layui-btn ">返回主页</button>
                </a>
            </div>
        </div>
        <div class="layui-trans layadmin-user-login-footer">
            <p>©2020 “基于网络平台过程性评价的高中信息技术分层教学研究”课题小组</p>
        </div>
    </div>
    <script src="static/js/jquery.min.js"></script>
    <script src="static/layui/layui.js"></script>
    <script count="100 " src="static/js/canvas-nest.min.js"></script>
    <script>
    layui.use('form', function() {
        var form = layui.form;
        //提交
        form.on('submit(LAY-user-login-submit)', function(data) {
            //请求登入接口
            console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
            $.ajax({
                url: 'server/login.php',
                dataType: 'json',
                type: 'post',
                data: data.field,
                success: function(data) {
                    if (data == 'success') {
                        layer.msg('登录成功', {
                            icon: 1,
                            time: 2000
                        }, function() {
                            window.location.href = 'index.php';
                        });
                    } else {
                        layer.msg('账户密码不正确，请重试', {
                            icon: 2,
                            time: 2000
                        }, function() {});
                    }
                }
            })
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
    </script>
</body>

</html>