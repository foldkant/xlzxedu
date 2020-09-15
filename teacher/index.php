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
                            <a>我的课程</a>
                            <a href="#signin" class="layui-hide-sm layui-show-xs-block fly-right" id="LAY_goSignin" style="color: #FF5722;">去签到</a>
                        </div>
                        <div class="layui-card-body">
                            <ul class="fly-case-list" id="myCourse">
                            </ul>
                        </div>
                    </div>
                    <div class="fly-panel" style="margin-bottom: 0;">
                        <div class="fly-panel-title fly-filter">
                            <a>我的资源</a>
                        </div>
                        <ul class="fly-list">
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">分享</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--<i class="iconfont icon-renzheng" title="认证信息：XXX"></i>-->
                                        <i class="layui-badge fly-badge-vip">VIP3</i>
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <span class="layui-badge layui-bg-red">精帖</span>
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                            <li>
                                <a href="user/home.html" class="fly-avatar">
                                    <img src="https://tva1.sinaimg.cn/crop.0.0.118.118.180/5db11ff4gw1e77d3nqrv8j203b03cweg.jpg" alt="贤心">
                                </a>
                                <h2>
                                    <a class="layui-badge">动态</a>
                                    <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                                </h2>
                                <div class="fly-list-info">
                                    <a href="user/home.html" link>
                                        <cite>贤心</cite>
                                        <!--
                <i class="iconfont icon-renzheng" title="认证信息：XXX"></i>
                <i class="layui-badge fly-badge-vip">VIP3</i>
                -->
                                    </a>
                                    <span>刚刚</span>
                                    <span class="fly-list-kiss layui-hide-xs" title="悬赏飞吻"><i class="iconfont icon-kiss"></i> 60</span>
                                    <!--<span class="layui-badge fly-badge-accept layui-hide-xs">已结</span>-->
                                    <span class="fly-list-nums">
                                        <i class="iconfont icon-pinglun1" title="回答"></i> 66
                                    </span>
                                </div>
                                <div class="fly-list-badge">
                                    <!--<span class="layui-badge layui-bg-red">精帖</span>-->
                                </div>
                            </li>
                        </ul>
                        <div style="text-align: center">
                            <div class="laypage-main">
                                <a href="jie/index.html" class="laypage-next">更多求解</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="layui-card">
                    <div class="layui-card-header">
                        班级管理
                        <span id="onlinenum" class="page-header-description" style="float: right;"></span>
                    </div>
                    <div class="layui-card-body">
                        <div class="layui-btn-container">
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
                    <div class="layui-card-body" style="max-height: 152px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                        <a href="javascript:;">
                            <?php echo $notice ?>
                        </a>
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
                <dl class="fly-panel fly-list-one">
                    <dt class="fly-panel-title">本周热议</dt>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <dd>
                        <a href="jie/detail.html">基于 layui 的极简社区页面模版</a>
                        <span><i class="iconfont icon-pinglun1"></i> 16</span>
                    </dd>
                    <!-- 无数据时 -->
                    <!--
        <div class="fly-none">没有相关数据</div>
        -->
                </dl>
                <div class="fly-panel">
                    <div class="fly-panel-title">
                        这里可作为广告区域
                    </div>
                    <div class="fly-panel-main">
                        <a href="http://layim.layui.com/?from=fly" target="_blank" class="fly-zanzhu" time-limit="2017.09.25-2099.01.01" style="background-color: #5FB878;">LayIM 3.0 - layui 旗舰之作</a>
                    </div>
                </div>
                <div class="fly-panel fly-link">
                    <h3 class="fly-panel-title">友情链接</h3>
                    <dl class="fly-panel-main">
                        <dd><a href="http://www.layui.com/" target="_blank">layui</a>
                        <dd>
                        <dd><a href="http://layim.layui.com/" target="_blank">WebIM</a>
                        <dd>
                        <dd><a href="http://layer.layui.com/" target="_blank">layer</a>
                        <dd>
                        <dd><a href="http://www.layui.com/laydate/" target="_blank">layDate</a>
                        <dd>
                        <dd><a href="mailto:xianxin@layui-inc.com?subject=%E7%94%B3%E8%AF%B7Fly%E7%A4%BE%E5%8C%BA%E5%8F%8B%E9%93%BE" class="fly-link">申请友链</a>
                        <dd>
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
    <script type="text/javascript" src="../static/js/teacher/teacher-msg.js"></script>
	<script type="text/javascript" src="../static/js/teacher/index.js"></script>
	
</body>

</html>