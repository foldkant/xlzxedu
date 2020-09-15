<?php 
require_once 'if-teacher.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>新建课程</title>
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
  .layui-upload-img {
    width: 239px;
    height: 150px;
  }
  </style>
</head>

<body>
    <?php require_once '_header.php'; ?>
    <div class="layui-container fly-marginTop">
        <div class="fly-panel" pad20 style="padding-top: 5px;">
            <!--<div class="fly-none">没有权限</div>-->
            <div class="layui-form layui-form-pane">
                <div class="layui-tab layui-tab-brief" lay-filter="user">
                    <ul class="layui-tab-title">
                        <li class="layui-this">新增课程</li>
                    </ul>
                    <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 20px 0;">
                        <div class="layui-tab-item layui-show">
                            <form action="">
                                <div class="layui-row layui-col-space15 layui-form-item">
                                    <div class="layui-col-md6">
                                        <label for="L_title" class="layui-form-label">课程名称</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="L_title" name="title" required lay-verify="required" autocomplete="off" class="layui-input" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="layui-col-md3">
                                        <label for="L_title" class="layui-form-label">教师姓名</label>
                                        <div class="layui-input-block">
                                            <input type="text" value="<?php echo $_SESSION['name']?>" class="layui-input" disabled="disabled">
                                        </div>
                                    </div>
                                    <div class="layui-col-md3">
                                        <label for="L_title" class="layui-form-label">任教科目</label>
                                        <div class="layui-input-block">
                                            <input type="text" value="<?php echo $_SESSION['subject']?>" class="layui-input" disabled="disabled">
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-upload">
                                    <button type="button" class="layui-btn" id="test1"><i class="layui-icon layui-icon-upload-drag"></i>上传课程封面图片</button>
                                    <div class="layui-upload-list">
                                        <img class="layui-upload-img" id="demo1">
                                        <p id="demoText"></p>
                                    </div>
                                </div>
                                <div class="layui-form-item layui-form-text">
                                    <label class="layui-form-label">课程内容介绍</label>
                                    <div class="layui-input-block">
                                        <textarea name="introduction" placeholder="请输入内容" class="layui-textarea"></textarea>
                                    </div>
                                </div>
                                <div class="layui-form-item">
                                    <button class="layui-btn" lay-filter="*" lay-submit><i class="layui-icon layui-icon-ok"></i> 新增课程</button>
                                </div>
                            </form>
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
    <script src="../static/js/teacher/add-course.js"></script>
</body>

</html>