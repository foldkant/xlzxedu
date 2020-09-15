 layui.use('form', function() {
     var form = layui.form;

     //监听提交
     form.on('submit(formDemo)', function(data) {
         // layer.msg(JSON.stringify(data.field));
         // 
         layer.confirm('请确认信息是否无误', {
             icon: 3,
             title: '提示'
         }, function(index) {
             layer.close(index);
             $.ajax({
                 url: '../server/teacher/firstLogin.php',
                 dataType: 'json',
                 type: 'post',
                 data: data.field,
                 success: function(data) {
                     if (data == 'success') {
                         window.location.href = '../';
                     } else {
                         layer.msg('信息注册失败!请联系管理员', {
                             icon: 2,
                             time: 1000
                         });
                     }
                 },
                 error: function(data) {
                     layer.msg('信息注册失败!请联系管理员', {
                         icon: 2,
                         time: 1000
                     });
                 }
             })

         });
         return false;
     });
     form.verify({
         //确认密码
         repassword: function(value) {
             if (value !== $('#password').val()) {
                 return '两次密码输入不一致';
             }
         },
         password: [/^[^\s]{6,16}$/, '密码必须为6到16位，且不能有空格']
     });
 });