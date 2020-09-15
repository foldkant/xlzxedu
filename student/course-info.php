<?php 
require_once 'if-student.php';
if(!isset($_GET['courseId'])){
    header('Location:course.php');
}else{
    require_once('../server/conn.php');
    if($conn){
        //执行成功的过程
        mysqli_query($conn,"SET NAMES utf8");
        $courseId = $_GET['courseId'];
        $sql = "SELECT * FROM `course` WHERE `id`='$courseId'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $title = $row[1];
        $img = substr($row[2],6);
        $teacherId = $row[6];
        $teacherName = $row[7];
        $introduction = $row[5];
        $lessonNum = $row[9];
        $createTime = $row[10];
        $sql2 = "SELECT `content` FROM `notice` WHERE `teacher_id`='$teacherId'";
        $result2 = mysqli_query($conn,$sql2);
        $row1 = mysqli_fetch_array($result2);
        $notice = $row1[0];
    }else{
        mysqli_close($conn);
    }
}
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
    </style>
</head>

<body class="fly-full">
    <?php require_once '_header.php'; ?>
    <div class="layui-container">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md9">
                <div style="margin: auto,0;">
                    <div class="fly-panel">
                        <div class="fly-panel-title fly-filter">
                            <a>课程内容</a>
                            <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
                        </div>
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space10">
                                <div class="layui-col-xs6" style="margin-top:10px;">
                                    <h1>
                                        <?php echo $title?>
                                    </h1>
                                     <p style="font-size: 12px; color: #666;margin: 20px 0;">任教老师：
                                        <?php echo $teacherName?>
                                    </p>
                                    <p style="font-size: 12px; color: #666;margin: 20px 0;">课程创建时间：
                                        <?php echo $createTime?>
                                    </p>
                                    <pre><?php echo $introduction?></pre>
                                </div>
                                <div class="layui-col-xs6">
                                    <img src="<?php echo $img?>" alt="" width="400px" height="300px" style="object-fit: scale-down;">
                                </div>
                            </div>
                               <div class="layui-row">
                                <table class="layui-hide" id="lesson" lay-filter="lesson"></table>
                            </div>
                            
                            <script type="text/html" id="barDemo">
                              <a class="layui-btn layui-btn-sm" lay-event="enter"><i class="layui-icon layui-icon-release"></i> 进入课时</a>
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">班级管理</div>
                    <div class="layui-card-body">
                        <div class="layui-btn-container">
                            <a href="class.php#class=sign-in">
                                <button class="layui-btn layui-btn-danger layui-btn-fluid">考勤</button>
                            </a>
                            <a href="class.php#class=my-class">
                                <button class="layui-btn layui-btn-fluid">班级管理</button>
                            </a>
                            <a href="class.php#class=student-file">
                                <button class="layui-btn layui-btn-fluid">学生档案</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="layui-card">
                    <div class="layui-card-header">公告栏</div>
                    <div class="layui-card-body">
                        <a href="javascript:;">
                           <?php echo $notice; ?>   
                        </a>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../static/js/jquery.min.js"></script>
    <script src="../static/layui/layui.js"></script>
    <script type="text/javascript" src="../static/js/socket.io.js"></script>
    <script type="text/javascript" src="../static/js/web_socket.js"></script>
    <script type="text/javascript" src="../static/js/student/student-msg.js"></script>
    <script type="text/javascript" src="../static/js/student/course-info.js"></script>
    <script>
    localStorage.setItem('classId', <?php echo $_SESSION['class'];?>)
    </script>
</body>

</html>