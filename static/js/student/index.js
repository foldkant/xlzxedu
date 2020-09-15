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
    base: '../static/mods/' //这里实际使用时，建议改成绝对路径
}).extend({
    fly: 'index'
}).use('fly');

$(document).ready(function() {
    //我的课程板块
    var classId = localStorage.getItem('classId');
    $.ajax({
        url: '../server/student/index/getCourse.php',
        dataType: 'json',
        type: 'post',
        data: {
            classId: classId
        },
        success: function(data) {
            console.log(data);
            data.forEach(function(item, index, array) {
                $li = $('<li>');
                if (item.height > item.width) {
                    $a = $('<a  class="fly-case-img">').attr('href', 'course-info.php?courseId=' + item.id);
                    height = 239 * (item.height) / (item.width);
                    $img = $('<img>').attr('src',item.img.substring(6)).css({
                        'height': height,
                        'margin-bottom': (150 - height) / 2,
                        'padding-top': (150 - height) / 2
                    });
                } else {
                    $a = $('<a  class="fly-case-img" style="text-align:center">').attr('href', 'course-info.php?courseId=' + item.id);
                    width = item.width * 150 / item.height;
                    $img = $('<img>').attr('src',item.img.substring(6)).css({
                        'width': width
                    });
                }
                $a1 = $('<a>').attr('href', 'course-info.php?courseId=' + item.id);
                $h2 = $('<h2>').append($a1.append(item.title));
                $p = $('<p  class="fly-case-desc">').append(item.introduction);
                $div = $('<div  class="fly-case-info">');
                $a2 = $('<a class="fly-case-user">');
                $teacherPic = $('<img>').attr('src', item.teacherPic);
                $a2 = $a2.append($teacherPic);
                $p1 = $('<p class="layui-elip" style="font-size: 12px;">')
                $span = $('<span style="color: #666;">').append(item.teacherName);
                $p1 = $p1.append($span, '&nbsp;' + item.createTime.substr(0, 10));
                $p2 = $('<p>').append('课程数' + item.lessonNum);
                $btn = $('<a>').append($('<button class="layui-btn fly-case-active">进入课程</button>')).attr('href', 'course-info.php?courseId=' + item.id);
                $div = $div.append($a2, $p1, $p2, $btn);
                $('#myCourse').append($li.append($a.append($img), $h2, $p, $div))
            })
        }
    })

})