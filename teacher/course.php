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
    	height:60px;
    	line-height: 60px;
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
                    <li lay-id="my-class" class="layui-this" lay-id="my-class">课程管理</li>
                </ul>
                <div class="layui-tab-content" style="padding: 20px 0;">
                    <div class="layui-form layui-form-pane layui-tab-item layui-show">
                        <div class="layui-row">
                            <div class="layui-col-xs2">
								<a href="add-course.php">
									<button type="button" id="update-class" class="layui-btn" style="margin-left: 10px;">
										<i class="layui-icon">&#xe624;</i>新增课程
									</button>
								</a>
                            </div>
                            <div class="layui-row">
                                <table class="layui-hide" id="myCourse" lay-filter="myCourse"></table>
                            </div>
							<script type="text/html" id="courseImg">
							  <div>
							  <a href="courseInfo.php?courseId={{d.id}}" ><img src="{{d.img}}" alt=""></a>
							  </div>
							</script>
							<script type="text/html" id="barDemo">
							  <a class="layui-btn layui-btn-sm" lay-event="enter"><i class="layui-icon layui-icon-release"></i> 进入课程</a>
							  <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><i class="layui-icon layui-icon-delete"></i>删除</a>
							</script>
							            
                            <div class="layui-row">
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
    <script src="../static/js/teacher/course.js"></script>	
</body>

</html>