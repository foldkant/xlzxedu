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
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <div class="layui-input-inline" style="width: 100px;">
                                    <select name="grade" required lay-verify="required">
                                        <option value="">年级</option>
                                        <option value="一">高一</option>
                                        <option value="二">高二</option>
                                        <option value="三">高三</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="class" required lay-verify="required" placeholder="班级" autocomplete="off" class="layui-input" maxlength="2">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <button class="layui-btn layui-btn-normal layui-btn-radius" lay-submit lay-filter="add">
                                    <i class="layui-icon layui-icon-addition" style="font-size: 14px;"></i>新增班级
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-row">
                            <div class="layui-col-md6">
                                <table class="layui-hide" id="class-table" lay-filter="class-table"></table>
                            </div>
                        </div>
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
    <script src="../static/js/admin/class.js"></script>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script src="../static/js/admin/shizuku.model.js"></script>
</body>

</html>