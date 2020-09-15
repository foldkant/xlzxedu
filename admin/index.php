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
  <div class="layui-body" style="background-color: #f2f2f2;">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">
    	<div class="layui-row">
			<div class="layui-card">
				<div class="layui-card-header">
				  <h2 style="font-weight: 300;">过程性评价分层教学平台</h2>
				</div>
			  <div class="layui-card-body" style="font-weight: 300;">
			   版本号 | v1.0  <br>
			   <?php date_default_timezone_set('PRC');echo "当前系统日期为：".date('Y-m-d');?>
			   <br>
			   <fieldset class="layui-elem-field layui-field-title" style="margin-top: 30px;">
			     <legend>版本更新记录：</legend>
			   </fieldset> 
			   <ul class="layui-timeline">
				
			   <!--   <li class="layui-timeline-item">
			       <i class="layui-icon layui-timeline-axis"></i>
			       <div class="layui-timeline-content layui-text">
			         <div class="layui-timeline-title">2020.07.15,更新学生档案表单、优化充值顺序、排课支持时间段，增加临时调课功能、导出课表功能</div>
			       </div>
			     </li> -->
				 <li class="layui-timeline-item">
				       <i class="layui-icon layui-timeline-axis"></i>
			       <div class="layui-timeline-content layui-text">
			         <div class="layui-timeline-title">2020年7月27日，系统发布</div>
			       </div>
				  </li>
			   </ul>
			  </div>
			</div>
		</div>
	</div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © 书雅学堂
  </div>
</div>
<script src="../static/layui/layui.js"></script>
<script src="https://eqcn.ajz.miesnfu.com/wp-content/plugins/wp-3d-pony/live2dw/lib/L2Dwidget.min.js"></script>
<script src="../static/js/admin/shizuku.model.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>