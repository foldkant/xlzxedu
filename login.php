<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>登录 - 过程性评价分层教学平台</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="static/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/css/admin.css" media="all">
    <link rel="stylesheet" href="static/css/login.css" media="all">
</head>

<body>
    <div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="display: none;">
        <div class="layadmin-user-login-main">
            <div class="layadmin-user-login-box layadmin-user-login-header">
                <h2>过程性评价分层教学平台</h2>
            </div>
            <div class="layadmin-user-login-box layadmin-user-login-body layui-form">
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-username" for="LAY-user-login-username"></label>
                    <input type="text" name="username" id="LAY-user-login-username" lay-verify="required" placeholder="用户名" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="layadmin-user-login-icon layui-icon layui-icon-password" for="LAY-user-login-password"></label>
                    <input type="password" name="password" id="LAY-user-login-password" lay-verify="required" placeholder="密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn layui-btn-fluid" lay-submit lay-filter="LAY-user-login-submit">登 入</button>
                </div>
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
                        window.location.href='index.php';
                    }else{
                       layer.msg('账户密码不正确，请重试');
                    }
                }
            })
            return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
        });
    });
    </script>
</body>

</html>