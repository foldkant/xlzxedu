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


	layui.use('form', function() {
		var form = layui.form;

		//各种基于事件的操作，下面会有进一步介绍
	});

	layui.use('table', function() {
		var table = layui.table;
		var courseId = localStorage.getItem('courseId')
		table.render({
			elem: '#lesson',
			url: '../server/teacher/course/getLesson.php?courseId=' + courseId,
			title: '用户数据表',
			cols: [
				[{
					field: 'id',
					title: 'ID',
					width: 80,
					unresize: true,
					sort: true,
					fixed: 'left'
				}, {
					field: 'title',
					title: '课程名',
					// width: 150,
					sort: true
				}, {
					field: 'fenceng',
					title: '分层教学',
					width: 100,
					templet: function(d) {
						if (d.fenceng == '1') {
							return '分层教学'
						} else {
							return '非分层教学'
						}
					}
				}, {
					fixed: 'right',
					title: '操作',
					toolbar: '#barDemo',
					width: 350
				}]
			],
			page: true
		});

		//监听行工具事件
		table.on('tool(lesson)', function(obj) {
			var data = obj.data;
			//console.log(obj)
			var courseId = localStorage.getItem('courseId')
			if (obj.event === 'del') {
				layer.confirm('是否要删除该课程？', {
					offset: '200px'
				}, function(index) {
					$.ajax({
						url: '../server/teacher/course/delLesson.php?courseId=' + courseId,
						dataType: 'json',
						type: 'get',
						data: {
							id: obj.data.id,
							courseId: courseId
						},
						success: function(data) {
							if (data == 'success') {
								obj.del();
								layer.msg('删除成功', {
									icon: 1,
									time: 1500
								}, function() {
									var table = layui.table;
									//执行重载
									table.reload('myCourse', {
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
			} else if (obj.event === 'enter') {
				window.location.href = 'lesson.php?lessonId=' + data.id;
			}
		});

	});
})