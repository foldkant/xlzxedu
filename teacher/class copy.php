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
    <link rel="stylesheet" href="../lib/layui/css/layui.css">
    <link rel="stylesheet" href="../static/business/css/global.css">
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
            <div class="layui-tab layui-tab-brief" lay-filter="user">
                <ul class="layui-tab-title" id="LAY_mine">
                    <li lay-id="my-class" class="layui-this">我的班级</li>
                    <li lay-id="sign-in">考勤</li>
                    <li lay-id="student-file">学生档案</li>
                </ul>
                <div class="layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-form layui-form-pane layui-tab-item layui-show">
                        <div class="layui-row">
                            <div class="layui-col-md2">
                                <form action="" class="layui-form">
                                    <select name="class" required lay-verify="required" id="getClass">
                                        <option value="">请选择班级</option>
                                    </select>
                                </form>
                            </div>
                            <div class="layui-col-md2">
                                <button type="button" class="layui-btn" style="margin-left: 10px;">修改任教班级</button>
                            </div>
							<div class="layui-row">
								<table class="layui-hide" id="test" lay-filter="test"></table>
								 
								<script type="text/html" id="toolbarDemo">
								  <div class="layui-btn-container">
								    <button class="layui-btn layui-btn-sm" lay-event="getCheckData">获取选中行数据</button>
								    <button class="layui-btn layui-btn-sm" lay-event="getCheckLength">获取选中数目</button>
								    <button class="layui-btn layui-btn-sm" lay-event="isAll">验证是否全选</button>
								  </div>
								</script>
								<script type="text/html" id="barDemo">
								  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
								  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
								</script>
							</div>
							
                        </div>
                    </div>
                    <div class="layui-form layui-form-pane layui-tab-item">
                    </div>
                    <div class="layui-form layui-form-pane layui-tab-item">
                    </div>
                    <div class="layui-form layui-form-pane layui-tab-item">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="fly-footer">
        <p><a href="http://fly.layui.com/" target="_blank">Fly社区</a> 2017 &copy; <a href="http://www.layui.com/" target="_blank">layui.com 出品</a></p>
        <p>
            <a href="http://fly.layui.com/jie/3147/" target="_blank">付费计划</a>
            <a href="http://www.layui.com/template/fly/" target="_blank">获取Fly社区模版</a>
            <a href="http://fly.layui.com/jie/2461/" target="_blank">微信公众号</a>
        </p>
    </div>
    <script type="text/javascript" src="../lib/jquery/1.9.1/jquery.min.js"></script>
    <script src="../lib/layui/layui.js"></script>
    <script src='../static/business/js/teacher/class.js'></script>
    <script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
    <script src="../static/business/js/teacher/shizuku.model.js"></script>
	<strong><script>
layui.use('table', function(){
  var table = layui.table;
  
  //温馨提示：默认由前端自动合计当前行数据。从 layui 2.5.6 开始： 若接口直接返回了合计行数据，则优先读取接口合计行数据。
  //详见：https://www.layui.com/doc/modules/table.html#totalRow
  table.render({
    elem: '#test'
    ,url:'../server/teacher/class/class.php'
    ,toolbar: '#toolbarDemo'
    ,title: '用户数据表'
    ,totalRow: true
    ,cols: [[
      {type: 'checkbox'}
      ,{field:'id', title:'ID',unresize: true, sort: true, totalRowText: '合计'}
      ,{field:'class', title:'班级',edit: 'text'}
      ,{fixed: 'right', title:'操作', toolbar: '#barDemo'}
    ]]
    ,page: true
  });
  
  //工具栏事件
  table.on('toolbar(test)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        layer.alert(JSON.stringify(data));
      break;
      case 'getCheckLength':
        var data = checkStatus.data;
        layer.msg('选中了：'+ data.length + ' 个');
      break;
      case 'isAll':
        layer.msg(checkStatus.isAll ? '全选': '未全选')
      break;
    };
  });
});
</script></strong>
</body>

</html>