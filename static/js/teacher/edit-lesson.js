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

	//选项卡
	layui.use('element', function() {
		var element = layui.element;
	});

	layui.use('upload', function() {
		var $ = layui.jquery,
			upload = layui.upload;
		//普通图片上传
		var uploadInst = upload.render({
			elem: '#upload',
			url: '../server/teacher/course/upLoadCourse.php' //改成您自己的上传接口
				,
			data: {
				upload: "pic"
			},
			before: function(obj) {
				//预读本地文件示例，不支持ie8
				obj.preview(function(index, file, result) {
					$('#demo1').attr('src', result); //图片链接（base64）
				});
			},
			done: function(res) {
				//如果上传失败
				if (res.code > 0) {
					return layer.msg('上传失败');
				} else {
					sessionStorage.setItem('courseImg', res.filename);
					sessionStorage.setItem('imgWidth', res.width);
					sessionStorage.setItem('imgHeight', res.height);
				}

			},
			error: function() {
				//演示失败状态，并实现重传
				var demoText = $('#demoText');
				demoText.html(
					'<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
				demoText.find('.demo-reload').on('click', function() {
					uploadInst.upload();
				});
			}
		});
	})

	layui.use('form', function() {
		var form = layui.form;
		form.on('submit(*)', function(data) {
			var title = $('#L_title').val();
			var goalA = $('#goalA').val();
			var contentA = editor1.txt.html();
			var taskA = $('#taskA').val();
			var goalB = $('#goalB').val();
			var contentB = editor2.txt.html();
			var taskB = $('#taskB').val();
			var goalC = $('#goalC').val();
			var contentC = editor3.txt.html();
			var taskC = $('#taskC').val();
			var lessonId = localStorage.getItem('lessonId');
			$.ajax({
				url: '../server/teacher/course/editLesson.php',
				type: 'post',
				async: false,
				data: {
					id: lessonId,
					title: title,
					goalA: goalA,
					contentA: contentA,
					taskA: taskA,
					goalB: goalB,
					contentB: contentB,
					taskb: taskB,
					goalC: goalC,
					contentC: contentC,
					taskC: taskC
				},
				dataType: 'json',
				success: function(data) {
					if (data == 'success') {
						alert('编辑课时成功');
						window.location.href = 'lesson.php?lessonId=' + lessonId;
					}

				}
			});

			return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
		});
	});
	var lessonId = localStorage.getItem('lessonId');
	var E = window.wangEditor
	var editor1 = new E('#editor1')
	// 或者 var editor = new E( document.getElementById('editor') )
	editor1.customConfig.uploadFileName = "file";
	editor1.customConfig.uploadImgMaxSize = 3 * 1024 * 1024 //默认为5M
	editor1.customConfig.uploadImgShowBase64 = false; // 使用 base64 保存图片
	editor1.customConfig.debug = true;
	editor1.customConfig.uploadImgServer = '../server/teacher/course/uploadLessonPic.php?lessonId=' + lessonId
	editor1.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0
	//图片在编辑器中回显
	editor1.customConfig.uploadImgHooks = {
		error: function(xhr, editor) {
			alert("2：" + xhr + "请查看你的json格式是否正确，图片并没有上传");
			// 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
			// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
		},
		fail: function(xhr, editor, result) {
			//  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
			//  一个url的key（参数）这个参数在 customInsert也用到
			//  
			alert("1：" + xhr + "请查看你的json格式是否正确，图片上传了，但是并没有回显");
		},
		success: function(xhr, editor, result) {
			//成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况 
			//console.log(result)
			// insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
		},
		customInsert: function(insertImg, result, editor) {
			//console.log(result);
			// 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
			// insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
			// 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
			insertImg(result.data);
		}
	};
	editor1.customConfig.zIndex = 1
	editor1.create()


	var editor2 = new E('#editor2')
	// 或者 var editor = new E( document.getElementById('editor') )
	editor2.customConfig.uploadFileName = "file";
	editor2.customConfig.uploadImgMaxSize = 3 * 1024 * 1024 //默认为5M
	editor2.customConfig.uploadImgShowBase64 = false; // 使用 base64 保存图片
	editor2.customConfig.debug = true;
	editor2.customConfig.uploadImgServer = '../server/teacher/course/uploadLessonPic.php?lessonId=' + lessonId
	editor2.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0
	//图片在编辑器中回显
	editor2.customConfig.uploadImgHooks = {
		error: function(xhr, editor) {
			alert("2：" + xhr + "请查看你的json格式是否正确，图片并没有上传");
			// 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
			// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
		},
		fail: function(xhr, editor, result) {
			//  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
			//  一个url的key（参数）这个参数在 customInsert也用到
			//  
			alert("1：" + xhr + "请查看你的json格式是否正确，图片上传了，但是并没有回显");
		},
		success: function(xhr, editor, result) {
			//成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况 
			//console.log(result)
			// insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
		},
		customInsert: function(insertImg, result, editor) {
			//console.log(result);
			// 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
			// insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
			// 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
			insertImg(result.data);
		}
	};
	editor2.customConfig.zIndex = 1
	editor2.create()

	var editor3 = new E('#editor3')
	// 或者 var editor = new E( document.getElementById('editor') )
	editor3.customConfig.uploadFileName = "file";
	editor3.customConfig.uploadImgMaxSize = 3 * 1024 * 1024 //默认为5M
	editor3.customConfig.uploadImgShowBase64 = false; // 使用 base64 保存图片
	editor3.customConfig.debug = true;
	editor3.customConfig.uploadImgServer = '../server/teacher/course/uploadLessonPic.php?lessonId=' + lessonId
	editor3.customConfig.debug = location.href.indexOf('wangeditor_debug_mode=1') > 0
	//图片在编辑器中回显
	editor3.customConfig.uploadImgHooks = {
		error: function(xhr, editor) {
			alert("2：" + xhr + "请查看你的json格式是否正确，图片并没有上传");
			// 图片上传出错时触发  如果是这块报错 就说明文件没有上传上去，直接看自己的json信息。是否正确
			// xhr 是 XMLHttpRequst 对象，editor 是编辑器对象
		},
		fail: function(xhr, editor, result) {
			//  如果在这出现的错误 就说明图片上传成功了 但是没有回显在编辑器中，我在这做的是在原有的json 中添加了
			//  一个url的key（参数）这个参数在 customInsert也用到
			//  
			alert("1：" + xhr + "请查看你的json格式是否正确，图片上传了，但是并没有回显");
		},
		success: function(xhr, editor, result) {
			//成功 不需要alert 当然你可以使用console.log 查看自己的成功json情况 
			//console.log(result)
			// insertImg('https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/bd_logo1_31bdc765.png')
		},
		customInsert: function(insertImg, result, editor) {
			//console.log(result);
			// 图片上传并返回结果，自定义插入图片的事件（而不是编辑器自动插入图片！！！）
			// insertImg 是插入图片的函数，editor 是编辑器对象，result 是服务器端返回的结果
			// 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
			insertImg(result.data);
		}
	};
	editor3.customConfig.zIndex = 1
	editor3.create()
})