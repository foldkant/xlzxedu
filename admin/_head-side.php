<div class="layui-header">
    <a class="fly-logo" href="/">
        <img src="../static/images/case.png" alt="layui" style="width: 30%;">
    </a>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-right">
        <li class="layui-nav-item">
            <a href="javascript:;">
                <img src="../static/images/pic01.png" class="layui-nav-img">
                管理员
            </a>
        </li>
        <li class="layui-nav-item"><a href="../logout.php">退出</a></li>
    </ul>
</div>
<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
        <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree" lay-filter="test">
            <li class="layui-nav-item"><a href="index.php">首页</a></li>
            <li class="layui-nav-item layui-nav-itemed">
                <a class="" href="javascript:;">教师</a>
                <dl class="layui-nav-child">
                    <dd><a href="teacher.php">教师管理</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item  layui-nav-itemed">
                <a href="javascript:;">班级</a>
                <dl class="layui-nav-child">
                    <dd><a href="class.php">班级管理</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item  layui-nav-itemed">
                <a href="javascript:;">学生</a>
                <dl class="layui-nav-child">
                    <dd><a href="student.php">学生管理</a></dd>
                </dl>
            </li>
              <li class="layui-nav-item  layui-nav-itemed">
                <a href="javascript:;">前测</a>
                <dl class="layui-nav-child">
                    <dd><a href="pre-exam1.php">态度问卷导入</a></dd>
                    <dd><a href="pre-exam-proportion.php">态度问卷选项比重</a></dd>
                    <dd><a href="pre-exam2.php">开学小测验导入</a></dd>
                </dl>
            </li>
            <!-- <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li> -->
        </ul>
    </div>
</div>