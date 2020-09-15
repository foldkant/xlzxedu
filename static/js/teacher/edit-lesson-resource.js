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
			var title = $('#L_title').val();
			var goalA = $('#goalA').val();
			var contentA = editor1.txt.html();
			var goalB = $('#goalB').val();
			var contentB = editor2.txt.html();
			var goalC = $('#goalC').val();
			var contentC = editor3.txt.html();
			var lessonId = localStorage.getItem('lessonId');
			$.ajax({
				url: '../server/teacher/course/editLesson.php',
				type: 'post',
				async: false,
				data: {
					id: lessonId,
					title: title,
					goalA: goalA,
					contentA: contentA,
					goalB: goalB,
					contentB: contentB,
					goalC: goalC,
					contentC: contentC
				},
				dataType: 'json',
				success: function(data) {
					if (data == 'success') {
						alert('编辑课时成功');
						window.location.href = 'lesson.php?lessonId=' + lessonId;
					}

				}
			});

			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
	});
	//批量导入
	layui.use('upload', function() {
		var upload = layui.upload;
		var lessonId = localStorage.getItem('lessonId');
		//执行实例
		var uploadInst = upload.render({
			elem: '#upload' //绑定元素
				,
			url: '../server/teacher/course/editLessonResource.php?lessonId=' + lessonId //上传接口
				,
			accept: 'file',
			before: function(obj) {
				layer.load(1, {
					shade: [0.8, '#393D49']
				});
			},
			done: function(res) {
				//上传完毕回调
				layer.closeAll('loading');
				layer.msg('资源上传成功!', {
					icon: 1,
					time: 1500
				});
				var table = layui.table;
				//执行重载
				table.reload('file', {
					page: {
						curr: 1 //重新从第 1 页开始
					},
				}, 'data');
			},
			error: function() {
				//请求异常回调
				layer.closeAll('loading');
				layer.msg('资源上传失败!', {
					icon: 2,
					time: 1500
				});
			}
		});
	});

	layui.use('table', function() {
		var table = layui.table;
		var lessonId = localStorage.getItem('lessonId');
		table.render({
			elem: '#file',
			url: '../server/teacher/course/getLessonResource.php?lessonId=' + lessonId,
			title: '课时资源',
			cols: [
				[{
					field: 'id',
					title: 'ID',
					width: 80,
					fixed: 'left',
					unresize: true,
					sort: true
				}, {
					field: 'src',
					title: '下载地址',
					templet: function(res) {
						return '<a href="' + res.src + '" target="_blank" download>' + res.title + '</a>'
					}
				}, {
					fixed: 'right',
					title: '操作',
					toolbar: '#barDemo',
					width: 150
				}]
			],
			page: true
		});

		//监听行工具事件
		table.on('tool(file)', function(obj) {
			var data = obj.data;
			//console.log(obj)
			if (obj.event === 'del') {
				layer.confirm('是否要删除该课时资源？', {
					offset: '200px'
				}, function(index) {
					$.ajax({
						url: '../server/teacher/course/delLessonResource.php',
						dataType: 'json',
						type: 'post',
						data: data,
						success: function(data) {
							if (data == 'success') {
								obj.del();
								layer.msg('删除成功', {
									icon: 1,
									time: 1500
								}, function() {
									var table = layui.table;
									//执行重载
									table.reload('file', {
										page: {
											curr: 1 //重新从第 1 页开始
										},
									}, 'data');
									layer.closeAll();
								});
							}

						}
					})
					layer.close(index);
				});
			}
		});
	});
})