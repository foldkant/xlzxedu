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

		table.render({
			elem: '#myCourse',
			url: '../server/teacher/course/getCourse.php',
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
					field: 'img',
					title: '课程缩略图',
					// unresize: true,
					width: 180,
					templet: '#courseImg'
				}, {
					field: 'lesson_num',
					title: '课程数',
					width: 80,
				}, {
					field: 'title',
					title: '课程名',
					// width: 150,
					edit: 'text',
					sort: true
				}, {
					field: 'create_time',
					title: '创建时间',
					sort: true,
				}, {
					fixed: 'right',
					title: '操作',
					toolbar: '#barDemo',
					width: 200
				}]
			],
			page: true
		});

		//监听行工具事件
		table.on('tool(myCourse)', function(obj) {
			var data = obj.data;
			//console.log(obj)
			if (obj.event === 'del') {
				layer.confirm('是否要删除该课程？', function(index) {
					$.ajax({
						url: '../server/teacher/course/delCourse.php',
						dataType: 'json',
						type: 'get',
						data: {
							id: obj.data.id
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
				window.location.href = 'course-info.php?courseId='+data.id;
			}
		});
		//监听编辑事件
		table.on('edit(myCourse)', function(obj) { //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
			console.log(obj.value); //得到修改后的值
			console.log(obj.field); //当前编辑的字段名
			console.log(obj.data); //所在行的所有相关数据
			$.ajax({
				url: '../server/teacher/course/updateCourse.php',
				dataType: 'json',
				type: 'post',
				data: obj.data,
				success: function(data) {
					if (data == 'success') {
						layer.msg('修改成功', {
							icon: 1,
							time: 2000
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

		});

	});
})
