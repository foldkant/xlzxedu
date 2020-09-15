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
            background: rgba(255,255,255,0.8);
            padding: 30px;
        }
        .daoyu{
            text-indent: 2em;
        }
    </style>
</head>

<body style="background: not specified;">
    <input type="hidden" id="TenantId" name="TenantId" value="" />
    <div class="loginWraper">
        <div class="loginBox" style="top: 0;margin-top: 0;width: 800px;margin-left: -400px;">
            <div class="wrapper">
                <h3 style="text-align: center;margin-bottom: 30px;font-size: 25px;">学生对信息技术课的态度问卷</h3>
                <blockquote class="site-text layui-elem-quote daoyu">
                    <p>亲爱的同学：</p>
                    <p>你好！请你根据自己的实际情况，客观真实地填写本问卷。本问卷不记名，答案也没有对错好坏之分，调查结果只做本课题研究使用，请不要有任何顾虑，如实填写，你的每一个回答对本研究而言，都是非常有意义和价值的。在填写问卷时，只需要在（）里填写你的答案即可。谢谢你的参与配合！
                    </p>
                </blockquote>
                <form class="layui-form" id="question" action="#">
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/layer/3.1.1/layer.js"></script>
    <script type="text/javascript" src="../static/layui/layui.js"></script>
    <script count="100" src="../static/js/canvas-nest.min.js"></script>
    <script src="../static/js/student/questionnaire2.js"></script>
</body>

</html>