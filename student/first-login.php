<?php 
session_start();

 ?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" type="text/css" href="../static/layui/css/layui.css">
    <link rel="stylesheet" type="text/css" href="../static/css/first-login.css">
    <!--[if lt IE 9]>
  <script type="text/javascript" src="lib/html5.js"></script>
  <script type="text/javascript" src="lib/respond.min.js"></script>
  <![endif]-->
    <!--[if IE 6]>
  <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
  <script>DD_belatedPNG.fix('*');</script><![endif]-->
    <title>过程性评价分层教学平台</title>
    <style>
        .wrapper{
            background: rgba(255,255,255,0.6);
            padding: 30px;
        }
    </style>
</head>

<body style="background: not specified;">
    <input type="hidden" id="TenantId" name="TenantId" value="" />
    <div class="loginWraper">
        <div class="loginBox" style="top: 0;margin-top: 0;">
            <div class="wrapper">
                <h3 style="text-align: center;margin-bottom: 30px;font-size: 35px;">首次登陆</h3>
                <form class="layui-form" action="../">
                    <div class="layui-form-item">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-block">
                            <input type="text" name="username" disabled='disabled' required lay-verify="required" class="layui-input" value="<?php echo $_SESSION['username']; ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">姓名</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" disabled='disabled' required lay-verify="required" placeholder="请输入标题" class="layui-input" value="<?php echo $_SESSION['name']; ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">新的密码</label>
                        <div class="layui-input-inline">
                            <input type="password" id="password" name="password" required lay-verify="password" placeholder="请输入新的密码" autocomplete="off" class="layui-input" minlength="6" maxlength="16">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">请确认密码</label>
                        <div class="layui-input-inline">
                            <input type="password" name="repassword" required lay-verify="required|repassword" placeholder="请确认密码" autocomplete="off" class="layui-input" minlength="6" maxlength="16">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">班级</label>
                        <div class="layui-input-block">
                            <select name="class" required lay-verify="required" id="getClass">
                                <option value="">请选择班级</option>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">性别：</label>
                        <div class="layui-input-block">
                            <input type="radio" name="sex" value="男" title="男" checked>
                            <input type="radio" name="sex" value="女" title="女">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn" lay-submit lay-filter="formDemo">确认提交</button>
                            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/layer/3.1.1/layer.js"></script>
    <script type="text/javascript" src="../static/layui/layui.js"></script>
    <script count="100" src="../static/js/canvas-nest.min.js"></script>
    <script src="../static/js/student/first-login.js"></script>
</body>

</html>