<?php 
require_once 'if-teacher.php';
if(!isset($_GET['lessonId'])){
	header('Location:course.php');
}else{
	require_once('../server/conn.php');
	if($conn){
		//执行成功的过程
		mysqli_query($conn,"SET NAMES utf8");
		$id = $_GET['lessonId'];
		$sql = "SELECT * FROM `lesson` WHERE `id`='$id'";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		$title = $row[2];
	}else{
		mysqli_close($conn);
	}
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>编辑课时资源课时</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="fly,layui,前端社区">
    <meta name="description" content="Fly社区是模块化前端UI框架Layui的官网社区，致力于为web开发提供强劲动力">
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

<body>
    <?php require_once '_header.php'; ?>
    <form>
        <div class="layui-container fly-marginTop">
            <div class="fly-panel" pad20 style="padding-top: 5px;">
                <!--<div class="fly-none">没有权限</div>-->
                <div class="layui-form layui-form-pane">
                    <div class="layui-tab layui-tab-brief" lay-filter="user">
                        <ul class="layui-tab-title">
                            <li class="layui-this">编辑课时资源</li>
                        </ul>
                        <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                            <div class="layui-tab-item layui-show">
                                <div class="layui-row layui-col-space15 layui-form-item">
                                    <div class="layui-col-md6">
                                        <label for="L_title" class="layui-form-label">课时名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="L_title" name="title" required lay-verify="required" value="<?php echo $title?>" disabled="disabled" autocomplete="off" class="layui-input" maxlength="20">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <label class="layui-form-label">上传资源</label>
                                    <div class="layui-input-block">
                                        <button type="button" class="layui-btn" id="upload">
                                            <i class="layui-icon">&#xe67c;</i>上传资源
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <h3>资源列表：</h3>
                                <table class="layui-hide" id="file" lay-filter="file"></table>
                                <script type="text/html" id="barDemo">
                                    <a class="layui-btn layui-btn-danger" lay-event="del">删除</a>
								                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </from>
        <?php
    require_once 'footer.php';
    ?>
        <script type="text/javascript" src="../static/js/jquery.min.js"></script>
        <script src="../static/layui/layui.js"></script>
        <script type="text/javascript" src="../static/js/socket.io.js"></script>
        <script type="text/javascript" src="../static/js/web_socket.js"></script>
        <script type="text/javascript" src="../static/js/teacher/teacher-common.js"></script>
        <script type="text/javascript" src="../static/js/teacher/teacher-msg.js"></script>
        <script type="text/javascript" src="../static/wangeditor3/wangEditor.min.js"></script>
        <script src="../static/js/teacher/edit-lesson-resource.js"></script>
        <script>
        localStorage.setItem('lessonId', <?php echo $id;?>);
        </script>
</body>

</html>