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
                <div class="layui-row">
                    <a href="add-student.php">
                        <button class="layui-btn" >
                            <i class="layui-icon layui-icon-addition" style="font-size: 14px;"></i>新增学生
                        </button>
                    </a>
                    <a href="../server/admin/student/toDownloadExcel.php">
                        <button class="layui-btn layui-btn-normal" id="download">
                            <i class="layui-icon layui-icon-download-circle" style="font-size: 14px;"></i>导出所有数据
                        </button>
                    </a>
                    <a href="../upload/admin/example.xlsx">
                        <button class="layui-btn layui-btn-warm" id="download">
                            <i class="layui-icon layui-icon-download-circle" style="font-size: 14px;"></i>批量导入模板下载
                        </button>
                    </a>
                    <button type="button" class="layui-btn" id="upload">
                        <i class="layui-icon">&#xe67c;</i>批量导入
                    </button>
                </div>
                <div class="layui-row">
                    <div class="layui-col-xs2" style="margin-top: 20px;">
                        <form action="" class="layui-form">
                            <select name="grade" required lay-verify="required" id="getClass" lay-filter="getClass">
                                <option value="">筛选班级</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="layui-row">
                    <div class="layui-col-md12">
                        <table class="layui-hide" id="student" lay-filter="student"></table>
                        <script type="text/html" id="barDemo">
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del"><i class="layui-icon layui-icon-delete"></i> 删除</a>
                        </script>
                        <script type="text/html" id="toolbarDemo">
                            <div class="layui-btn-container">
                                <button class="layui-btn layui-btn-sm layui-btn-danger" lay-event="getCheckData"><i class="layui-icon layui-icon-delete"></i> 批量删除</button>
                              </div>
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once '_footer.php'; ?>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script type="text/javascript" src="../static/layer/3.1.1/layer.js"></script>
    <script src="../static/layui/layui.js"></script>
    <script src="../static/js/admin/student.js"></script>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script src="../static/js/admin/shizuku.model.js"></script>
</body>

</html>