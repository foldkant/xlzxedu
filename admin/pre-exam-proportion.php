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
                <h2 style="margin: 10px 0;">态度问卷选项比重设置</h2>
                <blockquote class="layui-elem-quote layui-quote-nm" style="color: #c10909;font-weight: bold;">
                    注意：比重的分数请填写4个整数 1,2,3,4，且每个选项的分数不能一样，合计10分。填写完请点击保存按钮保存设置。
                </blockquote>
                <div style="margin: 10px 0;">
                    <button class="layui-btn layui-btn-disabled" disabled="disabled" onclick="save();" id="save">保存</button>
                    <table class="layui-hide" id="test" lay-filter="test"></table>
                    <script type="text/html" id="a">
                      {{#  if(d.sex === '女'){ }}
                        <span style="color: #F581B1;">{{ d.sex }}</span>
                      {{#  } else { }}
                        {{ d.sex }}
                      {{#  } }}
                    </script>
                </div>
            </div>
        </div>
        <?php require_once '_footer.php'; ?>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/layer/3.1.1/layer.js"></script>
    <script src="../static/layui/layui.js"></script>
    <script src="../static/js/admin/pre-exam-proportion.js"></script>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script src="../static/js/admin/shizuku.model.js"></script>
</body>

</html>