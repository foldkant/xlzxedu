$(document).ready(function() {
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

	//学习资源获取
	var lessonId = localStorage.getItem('lessonId');
	$.ajax({
		url: '../server/teacher/course/getLessonResource.php',
		dataType: 'json',
		type: 'get',
		data: {
			lessonId: lessonId,
			lessonInfo: 1
		},
		success: function(data) {
			console.log(data);
			var i = 1;
			data.forEach(function(item, index, array) {
				$p = $('<p>');
				$a = $('<a download>').attr('href', item.src).append(i, '、', item.title);
				$('#getResource').append($p.append($a));
				i++;
			})
		}
	})

	//更新学生分层信息
	$('#fenceng').click(function() {
		$.ajax({
			url: '../server/teacher/studentFile/updateFenceng.php',
			dataType: 'json',
			type: 'get',
			
			success: function(data) {
				console.log(data);
				if (data == 'success') {
					alert('更新成功');
				}

			}
		})
	})

})