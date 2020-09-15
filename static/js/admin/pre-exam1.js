$(document).ready(function() {
	layui.use(['transfer', 'layer', 'util', 'form'], function() {
		var $ = layui.$,
			transfer = layui.transfer,
			layer = layui.layer,
			form = layui.form,
			util = layui.util;
		getSelect();
		getSelectExam();
		//监听下拉选项
		form.on('select(getSort)', function(data) {
			$.ajax({
				url: '../server/admin/exam/getExam.php',
				dataType: 'json',
				type: 'post',
				async: false,
				data: {
					sort: data.value
				},

				success: function(data) {
					layui.use('transfer', function() {
						var transfer = layui.transfer;
						var examId = sessionStorage.getItem('selectExam');
						examId = JSON.parse(examId);
						var value = new Array();
						for (var i in examId) { //遍历json数组时，这么写p为索引，0,1
							value[i] = examId[i].exam_id;
						}
						console.log(value);
						//渲染
						transfer.render({
							elem: '#selectExam' //绑定元素
								,
							data: data,
							parseData: function(res) {
								return {
									"value": res.examId //数据值
										,
									"title": res.question //数据标题
										,
									"disabled": res.disabled //是否禁用
										,
									"checked": res.checked //是否选中
								}
							},
							title:["题库","已选题"],
							value: value,
							width: 500,
							id: 'getExam' //定义索引
						});

					});
				}
			})
		});
		//批量办法定事件
		util.event('lay-demoTransferActive', {
			getData: function(othis) {
				var getData = transfer.getData('getExam'); //获取右侧数据
				$.ajax({
					url: '../server/admin/exam/editPreExam.php?lessonId=-1',
					dataType: 'json',
					type: 'post',
					async: false,
					data: {
						data: JSON.stringify(getData)
					},
					success: function(data) {
						layer.msg('编辑成功', {
							icon: 1,
							time: 1500
						}, function() {
							getSelectExam();
							layer.closeAll();
						});
					}
				})
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

//获取已选题目
function getSelectExam() {
	$.ajax({
		url: '../server/admin/exam/getSelectExam.php?lessonId=-1',
		dataType: 'json',
		type: 'get',
		success: function(data) {
			console.log(data);
			sessionStorage.setItem('selectExam', JSON.stringify(data));
		}
	})

}