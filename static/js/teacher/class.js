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

	//班级管理板块
	//修改任教班级弹窗
	layui.use("layer", function() {
		var layer = layui.layer;
		$("#update-class").click(function() {
			layer.open({
				type: 1,
				area: ['700px', '500px'],
				content: $("#test")
			});
		});
	});
	//获取现有班级创建checkbox
	$.ajax({
		url: '../server/teacher/class/getClass.php',
		type: 'get',
		async: false,
		dataType: 'json',
		success: function(data) {
			// empty table
			$('#class-info').empty();
			data.forEach(function(item, index, array) {
				$div = $('<div class="layui-col-xs3 class-checkbox">');
				$input = $('<input type="checkbox" name="class[]">').attr({
					'title': item.className,
					'value': item.classId
				});
				$('#class-info').append($div.append($input));
			})
			console.log(data);
		}
	});
	//给checkbox添加默认项
	$.ajax({
		url: '../server/teacher/class/teacherClass.php',
		type: 'get',
		async: false,
		dataType: 'json',
		success: function(data) {
			data.forEach(function(item, index, array) {
				// 在修改任课班级中添加默认选项
				$classValue = item.classId;
				$("input[value=" + item.classId + "]").attr('checked', 'checked');
			})
			console.log(data);
		}
	});

	layui.use('form', function() {
		var form = layui.form;

		getSelect();
		//获取我的班级的下拉选项
		function getSelect() {
			$.ajax({
				url: '../server/teacher/class/teacherClass.php',
				dataType: 'json',
				type: 'get',
				success: function(data) {
					$('#getClass').empty();
					$('#getClass').append(new Option('请选择你任教班级', ''));
					$.each(data, function(index, item) {
						$('#getClass').append(new Option(item.class, item.classId)); // 下拉菜单里添加元素
					});

					$('#getClass2').empty();
					$('#getClass2').append(new Option('请选择班级', ''));
					$.each(data, function(index, item) {
						$('#getClass2').append(new Option(item.class, item.classId)); // 下拉菜单里添加元素
					});
					layui.form.render("select"); //重新渲染 固定写法
				}
			})

		}
		//班级管理的下拉选项监听
		form.on('select(getClass)', function(data) {
			console.log(data.value); //得到被选中的值
			sessionStorage.setItem("class", data.value);
			$('#datatable').DataTable().ajax.reload();
		});
		//班级管理数据表格获取和渲染
		form.on('select(table-class1)', function(data) {
			console.log(data.value);
			if (data.value != '') {
				layui.use('table', function() {
					var table = layui.table;

					table.render({
						elem: '#myClass',
						url: '../server/teacher/class/classInfo.php?class=' + data.value,
						title: '用户数据表',
						toolbar: '#toolbarDemo', //开启头部工具栏，并为其绑定左侧模板
						defaultToolbar: ['filter', 'exports', 'print'],
						cols: [
							[{
								field: 'id',
								title: 'ID',
								fixed: 'left',
								width: 80,
								unresize: true,
								sort: true
							}, {
								field: 'class',
								title: '班级'
							}, {
								field: 'name',
								title: '姓名'
							}, {
								field: 'sex',
								title: '性别'
							}, {
								field: 'username',
								title: '用户名'
							}, {
								field: 'password',
								title: '密码',
								edit: 'text'
							}]
						],
						page: true
					});
					//监听单元格编辑
					table.on('edit(myClass)', function(obj) {
						var value = obj.value //得到修改后的值
							,
							data = obj.data //得到所在行所有键值
							,
							field = obj.field; //得到字段
						$.ajax({
							url: '../server/teacher/class/updatePassword.php',
							type: 'post',
							dataType: 'json',
							data: {
								id: data.id,
								password: value
							},
							success: function(data) {
								layer.msg('修改成功', {
									icon: 1,
									time: 1500
								});
							}
						});
					});
				});

			}
			form.on('select(class2)', function(data) {
				alert(data.value) //打印当前select选中的值
			})
		});
		//修改任教班级表单提交
		form.on('submit(update-teacher-class)', function(data) {
			$.ajax({
				url: '../server/teacher/class/updateTeacherClass.php',
				dataType: 'json',
				type: 'get',
				data: data.field,
				success: function(data) {
					if (data == 'success') {
						layer.msg('修改成功', {
							icon: 1,
							time: 1500
						}, function() {
							layer.closeAll();
							getSelect();
						});
					}

				}
			})
			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
		//考勤数据表格获取和渲染
		// form.on('select(table-class2)', function(data) {
		// 	//添加学生信息到考勤表
		// 	$.ajax({
		// 		url: '../server/teacher/sign/getStudent.php',
		// 		type: 'get',
		// 		async: false,
		// 		dataType: 'json',
		// 		data:{
		// 			class: data.value
		// 		},
		// 		success: function(data) {
		// 			// empty table
		// 			$('[ip]').empty();
		// 			data.forEach(function(item, index, array) {
		// 				var a = item.ip;
		// 				var ip = a.substring(a.length - 3);
		// 				if(/^(\d{3})$/.test(ip)){

		// 					$('[ip=' + ip + ']').append(item.name).attr('student-id', item.id);
		// 				}						
		// 			})
		// 			console.log(data);
		// 		}
		// 	});

		// });
		//学生档案数据表格获取和渲染
		form.on('select(table-class2)', function(data) {
			console.log(data.value);
			if (data.value != '') {
				layui.use('table', function() {
					var table = layui.table;

					table.render({
						elem: '#studentFile',
						url: '../server/teacher/class/classInfo.php?class=' + data.value,

						title: '用户数据表',
						cols: [
							[{
								field: 'id',
								title: 'ID',
								fixed: 'left',
								width: 80,
								unresize: true,
								sort: true,
							}, {
								field: 'class',
								title: '班级'
							}, {
								field: 'name',
								title: '姓名'
							}, {
								fixed: 'right',
								title: '查看档案',
								toolbar: '#barDemo'
							}]
						],
						page: true
					});
					//监听单元格编辑
					table.on('edit(studentFile)', function(obj) {
						var value = obj.value //得到修改后的值
							,
							data = obj.data //得到所在行所有键值
							,
							field = obj.field; //得到字段
						$.ajax({
							url: '../server/teacher/class/updatePassword.php',
							type: 'post',
							dataType: 'json',
							data: {
								id: data.id,
								password: value
							},
							success: function(data) {
								layer.msg('修改成功', {
									icon: 1,
									time: 1500
								});
							}
						});
					});
				});

			}
			form.on('select(class2)', function(data) {
				alert(data.value) //打印当前select选中的值
			})
		});
	});

	//监听tab选项卡
	layui.use('element', function() {
		var element = layui.element;
		//获取hash来切换选项卡，假设当前地址的hash为lay-id对应的值
		var layid = location.hash.replace(/^#class=/, ''); //current为刚才定义的lay-filter
		element.tabChange('class', layid); //假设当前地址为：http://a.com#current=two，那么选项卡会自动切换到“html”这一项
		//监听Tab切换，以改变地址hash值
		element.on('tab(class)', function() {
			location.hash = 'class=' + this.getAttribute('lay-id');
		});
	});
	//考勤表格动态添加
	// addClassIP();

	// function addClassIP() {
	// 	$('#class-ip').empty();
	// 	i = 164;
	// 	for (var a = 1; a <= 8; a++) {
	// 		$tr = $('<tr>');
	// 		for (var b = 8; b >= 1; b--) {
	// 			$td = $('<td>').attr('ip', i);
	// 			$tr.append($td);
	// 			i--;
	// 		}
	// 		$('#class-ip').append($tr);
	// 	}
	// }


})