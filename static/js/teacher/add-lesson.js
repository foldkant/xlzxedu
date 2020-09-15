$(document).ready(function() {
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

	layui.use('form', function() {
		var form = layui.form;
		form.on('submit(*)', function(data) {
			var title = data.field.title;
			var fenceng = data.field.fenceng;
			var courseId = localStorage.getItem('courseId')
			$.ajax({
				url: '../server/teacher/course/addLesson.php',
				type: 'post',
				async: false,
				data: {
					title: title,
					fenceng:fenceng,
					courseId:courseId
				},
				dataType: 'json',
				success: function(data) {
					if (data.msg == 'success') {
						layer.msg('新建课程成功', {
							icon: 1,
							time: 1500
						}, function() {
							window.location.href = 'edit-lesson.php?lessonId='+data.lessonId;
						});
					}

				}
			});

			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
	});

})
