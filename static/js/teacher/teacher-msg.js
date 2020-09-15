//消息推送及在线人数统计功能
// 连接服务端
var socket = io('http://' + document.domain + ':2120');
// uid可以是自己网站的用户id，以便针对uid推送以及统计在线人数
var uid = window.localStorage.getItem('id');
// socket连接后以uid登录
socket.on('connect', function() {
	socket.emit('login', uid);
});
// 后端推送来消息时
socket.on('new_msg', function(msg) {
	console.log("收到消息：" + msg);
	layer.alert(msg);
});
// 后端推送来在线数据时
socket.on('update_online_count', function(online_stat) {
	console.log(online_stat);
	$('#onlinenum').html('（' + online_stat + '）');
});

socket.on('a', function(online_stat) {
	console.log(online_stat);
	$('#onlinenum').html(online_stat);
});
// 消息推送功能

function msg() {
	if (event.keyCode == 13) {
		var msg = $('.msg').val();
		$.ajax({
			url: '../server/msg.php',
			type: 'post',
			data: {
				msg: msg
			},
			dataType: 'json',
			success: function(data) {
				console.log(data);				
			}
		});
		layer.closeAll(); 
	}

}