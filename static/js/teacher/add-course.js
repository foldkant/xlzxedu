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


	layui.use('upload', function() {
		var $ = layui.jquery,
			upload = layui.upload;
		//普通图片上传
		var uploadInst = upload.render({
			elem: '#test1',
			url: '../server/teacher/course/upLoadCoursePic.php' //改成您自己的上传接口
				,
			data: {
				upload: "pic"
			},
			before: function(obj) {
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result) {
					$('#demo1').attr('src', result); //图片链接（base64）
				});
			},
			done: function(res) {
				//如果上传失败
				if (res.code > 0) {
					return layer.msg('上传失败');
				} else {
					sessionStorage.setItem('courseImg', res.filename);
					sessionStorage.setItem('imgWidth', res.width);
					sessionStorage.setItem('imgHeight', res.height);
				}

			},
			error: function() {
				//演示失败状态，并实现重传
				var demoText = $('#demoText');
				demoText.html(
					'<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				demoText.find('.demo-reload').on('click', function() {
					uploadInst.upload();
				});
			}
		});
	})
	layui.use('form', function() {
		var form = layui.form;
		form.on('submit(*)', function(data) {
			var title = data.field.title;
			var introduction = data.field.introduction;
			var img = sessionStorage.getItem('courseImg');
			var width = sessionStorage.getItem('imgWidth');
			var height = sessionStorage.getItem('imgHeight');
			$.ajax({
				url: '../server/teacher/course/addCourse.php',
				type: 'post',
				async: false,
				data: {
					title: title,
					img: img,
					introduction: introduction,
					width:width,
					height:height
				},
				dataType: 'json',
				success: function(data) {
					if (data == 'success') {
						layer.msg('新建课程成功', {
							icon: 1,
							time: 1500
						}, function() {
							window.location.href = 'course.php'
						});
					}

				}
			});

			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
	});

})
