<?php 
require_once 'if-admin.php';
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>过程性评价分层教学平台</title>
    <link rel="stylesheet" href="../static/layui/css/layui.css">
    <link rel="stylesheet" href="../static/css/admin_head.css">
</head>

<body class="layui-layout-body">
    <div class="layui-layout layui-layout-admin">
        <?php require_once '_head-side.php'; ?>
        <div class="layui-body">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <h2 style="margin: 10px 0;">学生对信息技术课的态度问卷</h2>
                <div class="layui-col-xs4" style="margin: 10px 0;">
                    <form action="" class="layui-form">
                        <select name="class" required lay-verify="required" id="getSort" lay-filter="getSort">
                            <option value="">请选择题库分类</option>
                        </select>
                    </form>
                    <div class="layui-inline">
                        <button type="button" class="layui-btn" lay-demotransferactive="getData">确定选择</button>
                    </div>
                </div>
                <div class="layui-row">
                    <div id="selectExam"></div>
                </div>
            </div>
        </div>
        <?php require_once '_footer.php'; ?>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/layer/3.1.1/layer.js"></script>
    <script src="../static/layui/layui.js"></script>
    <script src="../static/js/admin/pre-exam1.js"></script>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script src="../static/js/admin/shizuku.model.js"></script>
</body>

</html>