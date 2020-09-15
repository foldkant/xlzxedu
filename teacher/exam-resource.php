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
                    <li lay-id="my-class" class="layui-this" lay-id="my-class">题库分类</li>
                    <li lay-id="student-file" lay-id="student-file">题库导入</li>
                </ul>
                <div class="layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-form layui-form-pane layui-tab-item layui-show">
                        <div class="layui-col-xs6">
                            <form class="layui-form">
                                <div class="layui-input-inline">
                                    <input type="text" name="sort" autocomplete="off" class="layui-input">
                                </div>
                                 <div class="layui-input-inline">
                                     <select name="exam-type" required lay-verify="required" lay-filter="sort">
                                        <option value="">请选择类型</option>
                                        <option value="问卷">问卷</option>
                                        <option value="试题">试题</option>
                                    </select>
                                </div>
                                <button class="layui-btn" lay-submit lay-filter="add">添加分类</button>
                                <div style="margin-top: 5px;color: #cb2929;font-weight: bolder;">注：如需修改分类名称可直接在表格上修改</div>
                            </form>
                        </div>
                        <div class="layui-col-xs12">
                            <table class="layui-hide" id="sort" lay-filter="sort"></table>
                            <script type="text/html" id="barDemo">
                                <a class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del">删除</a>
                            </script>
                        </div>
                    </div>
                    <div class="layui-form layui-form-pane layui-tab-item">
                        <div class="layui-row">
                            <div class="layui-col-xs4">
                                <form action="" class="layui-form">
                                    <select name="class" required lay-verify="required" id="getSort" lay-filter="getSort">
                                        <option value="">请选择题库分类</option>
                                    </select>
                                </form>
                            </div>
                            <div>
                                <a href="../upload/teacher/exam-template.xlsx">
                                    <button type="button" class="layui-btn" style="margin-left: 10px;">
                                        <i class="layui-icon layui-icon-download-circle" style="font-size: 14px;"></i> 下载模板
                                    </button>
                                </a>
                                <button type="button" id="upload-exam" class="layui-btn layui-btn-normal" style="margin-left: 10px;"><i class="layui-icon">&#xe67c;</i> 导入题库</button>
                            </div>
                            <div style="margin-top: 5px;color: #cb2929;font-weight: bolder;">注：导入前请必须选择分类</div>
                            <div class="layui-row">
                                <table class="layui-hide" id="exam" lay-filter="exam"></table>
                                <script type="text/html" id="barDemo">
                                    <a class="layui-btn layui-btn-sm layui-btn-danger" lay-event="delExam">删除</a>
                            </script>
                            </div>
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
    <script src="../static/js/teacher/exam-resource.js"></script>
</body>

</html>