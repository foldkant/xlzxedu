<?php 
session_start();
require "server/conn.php";
if(isset($_SESSION['root'])){
  if($_SESSION['root']==2){
    header('Location: admin');
  }else if($_SESSION['root']==1){//教师和学生用户点击我的课堂时跳转的路径
    $url = 'teacher/';
  }else if($_SESSION['root']==0){
    $url = 'student/';
  }
  if($_SESSION['sex']=='男'){
   $sexPic = 'static/images/pic01.png';
  }else if($_SESSION['sex']=='女'){
   $sexPic = 'static/images/pic02.png';
  }else{
   $sexPic = 'static/images/pic01.png';
  }
}else{
    $url = 'login.php';
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
    <link rel="stylesheet" href="static/layui/css/layui.css">
    <link rel="stylesheet" href="static/css/global.css">
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
    <div class="fly-header layui-bg-black">
        <div class="layui-container">
            <a class="fly-logo" href="/">
                <img src="static/images/case.png" alt="layui" style="width: 30%;">
            </a>
            <ul class="layui-nav fly-nav-user">
                <?php
                if(isset($_SESSION['root'])){
                    if($_SESSION['root']==1){
                          $message1 = ' <!-- 登入后的状态 --><li class="layui-nav-item">
                   <a class="fly-nav-avatar" href="javascript:;">                      
                      <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
                      <cite class="layui-hide-xs">'.$_SESSION['name'].'</cite>
                      <i class="layui-badge fly-badge-vip layui-hide-xs">'.$_SESSION['subject'].'教师</i>
                      <img src="'.$sexPic.'">
                    </a>
                    <dl class="layui-nav-child">
                      <dd><a href="../user/set.html"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                      <dd><a href="../user/message.html"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                      <dd><a href="../user/home.html"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                      <hr style="margin: 5px 0;">
                      <dd><a href="logout.php" style="text-align: center;">退出</a></dd>
                    </dl>
                  </li>';
                    echo $message1;
                    }else{
                         $message1 = ' <!-- 登入后的状态 --><li class="layui-nav-item">
                   <a class="fly-nav-avatar" href="javascript:;">                      
                      <i class="iconfont icon-renzheng layui-hide-xs" title="认证信息：layui 作者"></i>
                      <cite class="layui-hide-xs">'.$_SESSION['name'].'</cite>
                      <i class="layui-badge fly-badge-vip layui-hide-xs">学霸</i>
                      <img src="'.$sexPic.'">
                    </a>
                    <dl class="layui-nav-child">
                      <dd><a href="../user/set.html"><i class="layui-icon">&#xe620;</i>基本设置</a></dd>
                      <dd><a href="../user/message.html"><i class="iconfont icon-tongzhi" style="top: 4px;"></i>我的消息</a></dd>
                      <dd><a href="../user/home.html"><i class="layui-icon" style="margin-left: 2px; font-size: 22px;">&#xe68e;</i>我的主页</a></dd>
                      <hr style="margin: 5px 0;">
                      <dd><a href="logout.php" style="text-align: center;">退出</a></dd>
                    </dl>
                  </li>';
                    echo $message1;
                    }
              }else{
                     $message2 = '<!-- 未登入的状态 -->
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="login.php"></a>
                </li>
                <li class="layui-nav-item">
                    <a href="login.php">登入</a>
                </li>';
                    echo $message2;
                }
                 ?>

            </ul>
        </div>
    </div>
    <div class="fly-case-header">
        <p class="my-title">©2020 “基于网络平台过程性评价的高中信息技术分层教学研究”课题小组</p>
        <a href="index.php">
            <img class="fly-case-banner" src="static/images/case.png" alt="过程性评价分层教学平台">
        </a>
        <div class="fly-case-btn">
            <a href="<?php echo$url ?>" class="layui-btn layui-btn-big fly-case-active">进入平台</a>
        </div>
    </div>
    <div class="fly-main" style="overflow: hidden;">
        <div class="fly-tab-border fly-case-tab">
            <span>
                <a href="" class="tab-this">2017年度</a>
                <a href="">2016年度</a>
            </span>
        </div>
        <div class="layui-tab layui-tab-brief">
            <ul class="layui-tab-title">
                <li class="layui-this"><a href="">按提交时间</a></li>
                <li><a href="">按点赞排行</a></li>
            </ul>
        </div>
        <ul class="fly-case-list">
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn  fly-case-active" data-type="praise">已赞</button>
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
            <li data-id="123">
                <a class="fly-case-img" href="http://fly.layui.com/" target="_blank">
                    <img src="static/images/fly.jpg" alt="课程名">
                    <cite class="layui-btn layui-btn-primary layui-btn-small">去围观</cite>
                </a>
                <h2><a href="http://fly.layui.com/" target="_blank">课程名</a></h2>
                <p class="fly-case-desc">课程的相关简介</p>
                <div class="fly-case-info">
                    <a href="../user/home.html" class="fly-case-user" target="_blank"><img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg"></a>
                    <p class="layui-elip" style="font-size: 12px;"><span style="color: #666;">贤心</span> 2017-11-30</p>
                    <p>获得<a class="fly-case-nums fly-case-active" href="javascript:;" data-type="showPraise" style=" padding:0 5px; color: #01AAED;">666</a>个赞</p>
                    <button class="layui-btn layui-btn-primary fly-case-active" data-type="praise">点赞</button>
                    <!-- <button class="layui-btn  fly-case-active" data-type="praise">已赞</button> -->
                </div>
            </li>
        </ul>
        <!-- <blockquote class="layui-elem-quote layui-quote-nm">暂无数据</blockquote> -->
        <div style="text-align: center;">
            <div class="laypage-main">
                <span class="laypage-curr">1</span>
                <a href="">2</a><a href="">3</a>
                <a href="">4</a>
                <a href="">5</a>

                <span>…</span>
                <a href="" class="laypage-last" title="尾页">尾页</a>
                <a href="" class="laypage-next">下一页</a>
            </div>
        </div>
    </div>
    <div class="fly-footer">
        <p>© 过程性评价分层教学平台</p>
    </div>
    <script src="static/layui/layui.js"></script>
    <script>
    layui.cache.page = 'case';
    layui.cache.user = {
        username: '游客',
        uid: -1,
        avatar: '../res/images/avatar/00.jpg',
        experience: 83,
        sex: '男'
    };
    layui.config({
        version: "3.0.0",
        base: 'static/mods/' //这里实际使用时，建议改成绝对路径
    }).extend({
        fly: 'index'
    }).use('fly');
    </script>
</body>

</html>