<?php 
require_once 'if-teacher.php';
?>
<!DOCTYPE html>
<html style="background-color: #e2e2e2;">

<head>
    <meta charset="utf-8">
    <meta name="keywords" content="{{ lay.base.keywords }}">
    <meta name="description" content="{{ lay.base.description }}">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>过程性评价分层教学平台</title>
    <link rel="stylesheet" href="../static/layui/css/layui.css">
    <link rel="stylesheet" href="../static/css/global.css">
    <style>
        .header {
        border-bottom: 1px solid #404553;
        border-right: 1px solid #404553;
    }

    .my-title {
        position: absolute;
        top: 30px;
        width: 100%;
        line-height: 50px;
        font-size: 15px;
        text-align: center;
        color: #fff;
        font-weight: 300;
    }
	.class-checkbox{
		margin-bottom: 10px;
	}
	.layui-table-cell{
    	height:40px;
    	line-height: 40px;
    	text-align: center;
 	}
    </style>
</head>

<body class="fly-full">
    <?php require_once '_header.php'; ?>
    <div class="layui-container fly-marginTop fly-user-main">
        <?php require_once '_left-side.php'; ?>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="site-tree-mobile layui-hide">
            <i class="layui-icon">&#xe602;</i>
        </div>
        <div class="site-mobile-shade"></div>
        <div class="fly-panel fly-panel-user" pad20>
            <div class="layui-tab layui-tab-brief" lay-filter="class">
                <ul class="layui-tab-title" id="LAY_mine">
                    <li lay-id="my-class" class="layui-this" lay-id="my-class">班级管理</li>
                    <!--  <li lay-id="sign-in" lay-id="sign-in">考勤</li> -->
                    <li lay-id="student-file" lay-id="student-file">学生档案</li>
                </ul>
                <div class="layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-form layui-form-pane layui-tab-item layui-show">
                        <div class="layui-row">
                            <div class="layui-col-xs2">
                                <form action="" class="layui-form">
                                    <select name="class" required lay-verify="required" id="getClass" lay-filter="table-class1">
                                        <option value="">请选择班级</option>
                                    </select>
                                </form>
                            </div>
                            <div class="layui-col-xs2">
                                <button type="button" id="update-class" class="layui-btn" style="margin-left: 10px;">修改任教班级</button>
                            </div>
                            <div class="layui-row">
                                <table class="layui-hide" id="myClass" lay-filter="myClass"></table>
                            </div>
                            <div class="layui-row">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="layui-form layui-form-pane layui-tab-item">
                        <div class="layui-row">
                            <div class="layui-col-xs2">
                                <form action="" class="layui-form">
                                    <select name="class" required lay-verify="required" id="getClass2" lay-filter="table-class2">
                                        <option value="">请选择班级</option>
                                    </select>
                                </form>
                            </div>
                            <p id="onlinenum" class="page-header-description" style="float: right;"></p>

                            <div class="layui-row">
                                <table class="layui-table" style="cursor: pointer;" lay-size="lg">
                                    <tbody id="class-ip"></tbody>
                                </table>
                            </div>
                            <div style="text-align: center;">
                                <div class="layui-btn-group">
                                    <button type="button" class="layui-btn-sm layui-btn">已签到</button>
                                    <button type="button" class="layui-btn-sm layui-btn layui-btn-warm">迟到</button>
                                    <button type="button" class="layui-btn-sm layui-btn layui-btn-normal">请假</button>
                                    <button type="button" class="layui-btn-sm layui-btn layui-btn-danger">旷课</button>
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <div class="layui-btn-group">
                                    <button type="button" class="layui-btn-sm layui-btn">开始考勤</button>
                                    <button type="button" class="layui-btn-sm layui-btn layui-btn-warm">结束考勤</button>
                                </div>
                            </div>
                            <div style="color: #808080;">注：本功能目前只开放于小榄中学电脑课室</div>
                        </div>
                    </div> -->
                    <div class="layui-form layui-form-pane layui-tab-item">
                        <div class="layui-col-xs2">
                            <form action="" class="layui-form">
                                <select name="class" required lay-verify="required" id="getClass2" lay-filter="table-class2">
                                    <option value="">请选择班级</option>
                                </select>
                            </form>
                        </div>
                        <div class="layui-row">
                            <table class="layui-hide" id="studentFile" lay-filter="studentFile"></table>
                            <script type="text/html" id="barDemo">
                                <a class="layui-btn layui-btn-sm layui-btn layui-btn-radius" lay-event="edit" href="student-file.php?studentId={{d.id}}">查看</a>
							</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php
   require_once 'footer.php';
   ?>	
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script src="../static/layui/layui.js"></script>
    <script type="text/javascript" src="../static/js/socket.io.js"></script>
    <script type="text/javascript" src="../static/js/web_socket.js"></script>
    <script type="text/javascript" src="../static/js/teacher/teacher-common.js"></script>
    <script type="text/javascript" src="../static/js/teacher/teacher-msg.js"></script>
    <script src="../static/js/teacher/class.js"></script>
    <div style="display:none" id="test">
        <form class="layui-form" style="margin-left: 10px;">
            <div class="fly-panel detail-box">
                <h2>修改我的任教班级
                    <button type="button" lay-submit lay-filter="update-teacher-class" id="update-teacher-class" class="layui-btn layui-btn-normal" style="float:right">确认修改</button>
                </h2>
            </div>
            <div class="detail-body layui-text photos">
                <div id="class-info"></div>
            </div>
        </form>
    </div>
</body>

</html>