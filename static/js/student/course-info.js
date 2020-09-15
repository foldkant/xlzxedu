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
			url: '../server/student/course/getLesson.php?courseId=' + courseId,
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
				},{
					fixed: 'right',
					title: '操作',
					toolbar: '#barDemo',
				}]
			],
			page: true
		});

		//监听行工具事件
		table.on('tool(lesson)', function(obj) {
			var data = obj.data;
			//console.log(obj)
			var courseId = localStorage.getItem('courseId')
			if (obj.event === 'enter') {
				window.location.href = 'lesson.php?lessonId=' + data.id;
			}
		});

	});
})