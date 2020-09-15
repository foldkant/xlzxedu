<?php 
require_once 'if-student.php';
if(!isset($_GET['lessonId'])){
    header('Location:course.php');
}else{
    require_once('../server/conn.php');
    if($conn){
        //执行成功的过程
        mysqli_query($conn,"SET NAMES utf8");
        $lessonId = $_GET['lessonId'];
        $sql = "SELECT * FROM `lesson` WHERE `id`='$lessonId'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $courseId = $row[1];
        $title = $row[2];
        $fenceng = $row[3];
        $goalA = $row[4];
        $contentA = $row[5];
        $taskA = $row[6];
        $goalB = $row[7];
        $contentB = $row[8];
        $taskB = $row[9];
        $goalC = $row[10];
        $contentC = $row[11];
        $taskC = $row[12];
        $createTime = $row[13];
        $sql2 = "SELECT * FROM `course` WHERE `id`='$courseId'";
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $course =$row2[1];
        $teacher = $row2[7];
        $teacherPic = $row2[8];
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
                            <a>
                                <?php echo $title;?></a>
                            <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
                        </div>
                        <div class="layui-card-body">
                            <h1>
                                <?php echo $title;?>
                            </h1>
                            <div class="detail-about fly-detail-info">
                                <a class="fly-avatar" href="../user/home.html">
                                    <img src="<?php echo $teacherPic;?>" alt="贤心">
                                </a>
                                <div class="fly-detail-user">
                                    <a href="#" class="fly-link">
                                        <cite>
                                            <?php echo $teacher;?></cite>
                                        <i class="iconfont icon-renzheng" title="认证信息：{{ rows.user.approve }}"></i>
                                    </a>
                                    <span>
                                        <?php echo $createTime;?></span>
                                </div>
                                <div class="detail-hits" id="LAY_jieAdmin" data-id="123">
                                    <span style="padding-right: 10px; color: #FF7200">分层教学：
                                        <?php if($fenceng==1){echo '是';}else{echo '否';}?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <?php 
                        if($fenceng =='1'){
                            require_once '_fenceng.php';
                        }else{
                            require_once '_bufenceng.php';
                        }
                    ?>
                    <div class="fly-panel">
                        <div class="detail-body photos">
                            <div class="layui-card-body">
                                学习资源下载:
                                <pre id="getResource"></pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        课堂管理
                        <span id="onlinenum" class="page-header-description" style="float: right;"></span>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-btn-container">
                            <button class="layui-btn layui-btn-fluid">打卡签到</button>
                            <a href="class.php#class=student-file">
                                <button class="layui-btn layui-btn-normal layui-btn-fluid">课堂活动</button>
                            </a>
                            <a href="task.php?lessonId=<?php echo $lessonId?>">
                                <button class="layui-btn layui-btn-danger layui-btn-fluid">课堂任务提交</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="fly-panel fly-rank fly-rank-reply" id="LAY_replyRank">
                    <h3 class="fly-panel-title">上周学习之星</h3>
                    <dl>
                        <!--<i class="layui-icon fly-loading">&#xe63d;</i>-->
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                        <dd>
                            <a href="user/home.html">
                                <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"><cite>贤心</cite><i>106次回答</i>
                            </a>
                        </dd>
                    </dl>
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
    <script src="../static/js/teacher/lesson.js"></script>
    <script>
    localStorage.setItem('lessonId', '<?php echo $_GET['lessonId'];?>')
    </script>
</body>

</html>