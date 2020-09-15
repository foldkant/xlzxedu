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
	getStudentFile();
})

function getStudentFile(){
	getPreTest();
	
}

function getPreTest(){
	var studentId = localStorage.getItem('studentId');
	$.ajax({
		url: '../server/teacher/studentFile/getStudentFile.php',
		dataType: 'json',
		type: 'get',
		data: {
			studentId: studentId
		},
		success: function(data) {
			console.log(data);
			var i = 1;
			data.forEach(function(item, index, array) {
				
			})
		}
	})
}