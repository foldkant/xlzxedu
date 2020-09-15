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
		getSelect();

		//监听题库分类提交
		form.on('submit(add)', function(data) {
			console.log(data.field);
			$.ajax({
				url: '../server/teacher/exam/addSort.php',
				dataType: 'json',
				type: 'post',
				data: data.field,
				success: function(data) {
					if (data == 'exist') {
						layer.msg('分类名已存在', {
							icon: 2,
							time: 1500
						}, function() {
							table.reload('sort', 'data');
							getSelect();
							layer.closeAll();
						});
					} else if (data == 'success') {
						layer.msg('新增成功', {
							icon: 1,
							time: 1500
						}, function() {
							var table = layui.table;
							//执行重载
							table.reload('sort', 'data');
							getSelect();
							layer.closeAll();
						});
					}

				}
			})
			return false;
		});
		//监听下拉选项
		form.on('select(getSort)', function(data) {
			console.log(data.elem); //得到select原始DOM对象
			console.log(data.value); //得到被选中的值
			console.log(data.othis); //得到美化后的DOM对象
			layui.use('table', function() {
				var table = layui.table;
				var sort = data.value;
				table.render({
					elem: '#exam',
					url: '../server/teacher/exam/getExam.php?sort='+sort,
					title: '用户数据表',
					cols: [
						[{
							field: 'id',
							width: 80,
							unresize: true,
							title: 'id',
						}, {
							field: 'question',
							edit: 'text',
							width: 300,
							unresize: true,
							title: '问题',
						}, {
							field: 'a',
							edit: 'text',
							unresize: true,
							title: '选项A',
						}, {
							field: 'b',
							edit: 'text',
							unresize: true,
							title: '选项B',
						}, {
							field: 'c',
							edit: 'text',
							unresize: true,
							title: '选项C',
						}, {
							field: 'd',
							edit: 'text',
							unresize: true,
							title: '选项D',
						}, {
							field: 'answer',
							edit: 'text',
							unresize: true,
							title: '答案',
						}, {
							fixed: 'right',
							unresize: true,
							title: '操作',
							toolbar: '#barDemo',
						}]
					],
					page:true
				});


				//监听行工具事件
				table.on('tool(exam)', function(obj) {
					var data = obj.data;
					if (obj.event === 'del') {
						layer.confirm('真的删除该试题吗？', function(index) {
							$.ajax({
								url: '../server/teacher/exam/delExam.php',
								dataType: 'json',
								type: 'get',
								data: {
									id: data.id
								},
								success: function(data) {
									if (data == 'success') {
										layer.msg('删除成功', {
											icon: 1,
											time: 1500
										}, function() {
											var table = layui.table;
											//执行重载
											table.reload('exam', 'data');
											getSelect();
											layer.closeAll();
										});
									}

								}
							})
						});
					}
				});
				//监听编辑
				table.on('edit(exam)', function(obj) {
					$.ajax({
						url: '../server/teacher/exam/updateExam.php',
						dataType: 'json',
						type: 'post',
						data: obj.data,
						success: function(data) {
						if (data == 'success') {
								layer.msg('修改成功', {
									icon: 1,
									time: 1500
								}, function() {
									var table = layui.table;
									//执行重载
									table.reload('exam', 'data');
									getSelect();
									layer.closeAll();
								});
							}
						}
					})
				});
			});
		});



	});
	layui.use('table', function() {
		var table = layui.table;

		table.render({
			elem: '#sort',
			url: '../server/teacher/exam/getSort.php',
			title: '用户数据表',
			// width: 800,
			cols: [
				[{
					field: 'exam_sort',
					edit: 'text',
					unresize: true,
					title: '题库分类名',
				}, {
					field: 'exam_type',
					edit: 'text',
					unresize: true,
					width:100,
					title: '类型',
				}, {
					fixed: 'right',
					unresize: true,
					title: '操作',
					width:100,
					toolbar: '#barDemo',
				}]
			]
		});


		//监听行工具事件
		table.on('tool(sort)', function(obj) {
			var data = obj.data;
			if (obj.event === 'del') {
				layer.confirm('真的删除该分类吗？', function(index) {
					$.ajax({
						url: '../server/teacher/exam/delSort.php',
						dataType: 'json',
						type: 'get',
						data: {
							id: data.id
						},
						success: function(data) {
							if (data == 'success') {
								layer.msg('删除成功', {
									icon: 1,
									time: 1500
								}, function() {
									var table = layui.table;
									//执行重载
									table.reload('sort', 'data');
									getSelect();
									layer.closeAll();
								});
							}

						}
					})
				});
			}
		});
		//监听编辑
		table.on('edit(sort)', function(obj) {
			$.ajax({
				url: '../server/teacher/exam/updateSort.php',
				dataType: 'json',
				type: 'post',
				data: obj.data,
				success: function(data) {
					if (data == 'exist') {
						layer.msg('分类名已存在', {
							icon: 2,
							time: 1500
						}, function() {
							var table = layui.table;
							//执行重载
							table.reload('sort', 'data');
							getSelect();
							layer.closeAll();
						});
					} else if (data == 'success') {
						layer.msg('修改成功', {
							icon: 1,
							time: 1500
						}, function() {
							var table = layui.table;
							//执行重载
							table.reload('sort', 'data');
							getSelect();
							layer.closeAll();
						});
					}
				}
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

	var upload = layui.upload; //得到 upload 对象

	//上传试题
	layui.use('upload', function() {
		var upload = layui.upload;

		//执行实例
		var uploadInst = upload.render({
			elem: '#upload-exam' //绑定元素
				,
			url: '../server/teacher/exam/uploadExam.php' //上传接口
				,
			accept: 'file',
			acceptMime: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			exts: 'xls|xlsx',
			before: function(obj) {
				layer.load(1, {
					shade: [0.8, '#393D49']
				});
				var sort = $('#getSort').val();
				console.log(sort);
				this.data = {
					sort: sort
				}
			},
			done: function(res) {
				//上传完毕回调
				if (res.msg == 'exist') {
					layer.closeAll('loading');
					layer.msg('请选择分类!', {
						icon: 2,
						time: 1500
					});
				} else {
					layer.closeAll('loading');
					layer.msg('导入成功!', {
						icon: 1,
						time: 1500
					});
					var table = layui.table;
					//执行重载
					table.reload('exam', {
						page: {
							curr: 1 //重新从第 1 页开始
						},
					}, 'data');
				}

			},
			error: function() {
				//请求异常回调
				layer.closeAll('loading');
				layer.msg('导入失败!', {
					icon: 2,
					time: 1500
				});
			}
		});
	});
})


//获取题库分类的下拉选项
function getSelect() {
	$.ajax({
		url: '../server/teacher/exam/examSort.php',
		dataType: 'json',
		type: 'get',
		success: function(data) {
			$('#getSort').empty();
			$('#getSort').append(new Option('请选择题库分类', ''));
			$.each(data, function(index, item) {
				$('#getSort').append(new Option(item.sort, item.id)); // 下拉菜单里添加元素
			});
			layui.form.render("select"); //重新渲染 固定写法
		}
	})

}