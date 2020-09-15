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
			var content = editor.txt.html();
			$.ajax({
				url: '../server/teacher/notice/editNotice.php',
				type: 'post',
				async: false,
				data: {
					content: content,
				},
				dataType: 'json',
				success: function(data) {
					if (data == 'success') {
						alert('编辑公告栏成功');
					}

				}
			});

			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
	});
	var lessonId = localStorage.getItem('lessonId');
	var E = window.wangEditor;
	var editor = new E('#notice')
	editor.customConfig.menus = [
        'bold',
        'italic',
        'foreColor', 
        'underline'
    ]
	editor.customConfig.zIndex = 1
	editor.create()

})