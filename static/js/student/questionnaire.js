$(document).ready(function() {
	layui.use('form', function() {
		var form = layui.form;
		getQuestion();

		function getQuestion() {
			$.ajax({
				url: '../server/student/getQuestion.php',
				dataType: 'json',
				data: {
					lessonId: -1
				},
				type: 'post',
				success: function(data) {
					console.log(data);
					i = 1;
					data.forEach(function(item, index, array) {
						$div = $('<div class="layui-form-item">');
						$question = $('<div>').append(i + '.' + item.question);
						$a = $('<input type="radio" required lay-verify="otherReq">').attr({
							name: item.id,
							value: "A",
							title: 'A.' + item.a
						});
						$b = $('<input type="radio" required lay-verify="otherReq">').attr({
							name: item.id,
							value: "B",
							title: 'B.' + item.b
						}).append('B');
						$c = $('<input type="radio" required lay-verify="otherReq">').attr({
							name: item.id,
							value: "C",
							title: 'C.' + item.c
						});
						$d = $('<input type="radio" required lay-verify="otherReq">').attr({
							name: item.id,
							value: "D",
							title: 'D.' + item.d
						});
						$('#question').append($div.append($question, $a, $b, $c, $d));
						i = i + 1;
					})
					$('#question').append(
						'<div class="layui-form-item"><div class="layui-input-block"><button class="layui-btn" lay-submit lay-filter="submit">确认提交</button><button type="reset" class="layui-btn layui-btn-primary">重置</button></div></div>'
					);
					form.render();
				}
			})
		}
		form.on('submit(submit)', function(data) {
			console.log(data.elem) //被执行事件的元素DOM对象，一般为button对象
			console.log(data.form) //被执行提交的form对象，一般在存在form标签时才会返回
			console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
			$.ajax({
				url: '../server/student/answer.php?lessonId=-1',
				dataType: 'json',
				type: 'post',
				data: {
					data: data.field
				},
				success: function(data) {
					console.log(data);
					if (data == 'success') {
						layer.msg('填写完毕，请完成开学小测试', {
							icon: 1,
							time: 2000 //2秒关闭（如果不配置，默认是3秒）
						}, function() {
							window.location.href = 'questionnaire2.php';
						});
					}else if(data =='exist'){
						layer.msg('该问卷你已完成！请不要重复提交！', {
							icon: 2,
							time: 2000 //2秒关闭（如果不配置，默认是3秒）
						}, function() {
							window.location.href = 'questionnaire2.php';
						});
					}

				}
			})
			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
		//自定义验证规则
		form.verify({
			otherReq: function(value, item) {
				var $ = layui.$;
				var verifyName = $(item).attr('name'),
					verifyType = $(item).attr('type'),
					formElem = $(item).parents('.layui-form') //获取当前所在的form元素，如果存在的话
					,
					verifyElem = formElem.find('input[name=' + verifyName + ']') //获取需要校验的元素
					,
					isTrue = verifyElem.is(':checked') //是否命中校验
					,
					focusElem = verifyElem.next().find('i.layui-icon'); //焦点元素
				if (!isTrue || !value) {
					//定位焦点
					focusElem.css(verifyType == 'radio' ? {
						"color": "#FF5722"
					} : {
						"border-color": "#FF5722"
					});
					//对非输入框设置焦点
					focusElem.first().attr("tabIndex", "1").css("outline", "0").blur(function() {
						focusElem.css(verifyType == 'radio' ? {
							"color": ""
						} : {
							"border-color": ""
						});
					}).focus();
					return '必填项不能为空';
				}
			}

		});
	})
})
