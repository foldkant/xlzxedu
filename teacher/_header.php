    <div class="fly-header layui-bg-black">
        <div class="layui-container">
            <a class="fly-logo" href="/">
                <img src="../static/images/case.png" alt="layui" style="width: 30%;">
            </a>
            <ul class="layui-nav fly-nav-user">
                <?php          
                if(isset($_SESSION['root'])){
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
                      <dd><a href="../logout.php" style="text-align: center;">退出</a></dd>
                    </dl>
                  </li>';                    
                    echo $message1;                    
                }else{
                     $message2 = '<!-- 未登入的状态 -->
                <li class="layui-nav-item">
                    <a class="iconfont icon-touxiang layui-hide-xs" href="login.php"></a>
                </li>
                <li class="layui-nav-item">
                    <a href="../login.php">登入</a>
                </li>';
                    echo $message2;
                }
                 ?>
            </ul>
        </div>
    </div>
    <div class="fly-panel fly-column">
        <div class="layui-container">
            <ul class="layui-clear">
                <li class="layui-hide-xs"><a href="index.php" class='head-item' side-item="side-index">首页</a></li>
                <li><a class='head-item'  href="class.php" side-item="side-class">我的班级</a></li>
                <li><a class='head-item'  href="course.php" side-item="side-course">我的课程</a></li>
                <li><a class='head-item'  href="exam-resource.php" side-item="side-test">题库管理</a></li>
                <li><a class='head-item'  href="jie/index.html" side-item="side-resource">我的资源</a></li>
                <li><a class='head-item'  href="jie/index.html" side-item="side-advice">建议反馈</a></li>
                <li><a class='head-item'  href="notice.php" side-item="side-notice">公告</a></li>               
                
            </ul>
            <div class="fly-column-right layui-hide-xs">
                <span class="fly-search"><i class="layui-icon">&#xe642;</i></span>
            </div>
            <!-- <div class="layui-hide-sm layui-show-xs-block" style="margin-top: -10px; padding-bottom: 10px; text-align: center;">
                <a href="jie/add.html" class="layui-btn">发表新帖</a>
            </div> -->
        </div>
    </div>