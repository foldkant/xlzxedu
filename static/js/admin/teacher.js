layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#teacher'
    ,url:'../server/admin/teacher/getTeacher.php'
    ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
    ,defaultToolbar: ['filter', 'exports', 'print', { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
      title: '提示'
      ,layEvent: 'LAYTABLE_TIPS'
      ,icon: 'layui-icon-tips'
    }]
    ,title: '教师数据表'
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true}
      ,{field:'name', title:'姓名', unresize: true}
      ,{field:'username', title:'用户名', unresize: true}
      ,{field:'password', title:'密码', edit: 'text', unresize: true}
      ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
    ]]
    ,page: true
  });
  
  //头工具栏事件
  table.on('toolbar(teacher)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        data = JSON.stringify(data)
        console.log(data);
         layer.confirm('确定删除这些老师？', function(index) {
          $.ajax({
            url: '../server/admin/teacher/batchDelTeacher.php',
            dataType: 'json',
            type: 'post',
            data:{
              data:data
            },
            success: function(data) {
              if (data == 'success') {
                layer.msg('删除成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                  var table = layui.table;
                  //执行重载
                  table.reload('teacher', {
                    page: {
                      curr: 1 //重新从第 1 页开始
                    },
                  }, 'data');
                  layer.closeAll();
                });
              }

            }
          })
          layer.close(index);
        });
      break;
    };
  });
  
    //监听行工具事件
    table.on('tool(teacher)', function(obj) {
      //console.log(obj)
      if (obj.event === 'del') {
        var name = obj.data.name;
        layer.confirm('是否删除 '+name+' 的账户？', function(index) {
          $.ajax({
            url: '../server/admin/teacher/delTeacher.php',
            dataType: 'json',
            type: 'get',
            data: {
              id:obj.data.id
            },
            success: function(data) {
              if (data == 'success') {
                layer.msg('删除成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                  var table = layui.table;
                  //执行重载
                  table.reload('teacher', {
                    page: {
                      curr: 1 //重新从第 1 页开始
                    },
                  }, 'data');
                  layer.closeAll();
                });
              }

            }
          })
          layer.close(index);
        });
      }
    });
    //监听编辑事件
    table.on('edit(teacher)', function(obj){ //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
      console.log(obj.value); //得到修改后的值
      console.log(obj.field); //当前编辑的字段名
      console.log(obj.data); //所在行的所有相关数据
      $.ajax({
        url: '../server/admin/teacher/updateTeacher.php',
        dataType: 'json',
        type: 'post',
        data: obj.data,
        success: function(data) {
          if (data == 'success') {
            layer.msg('修改成功', {
              icon: 1,
              time: 2000
            }, function() {
              var table = layui.table;
              //执行重载
              table.reload('teacher', {
                page: {
                  curr: 1 //重新从第 1 页开始
                },
              }, 'data');
              layer.closeAll();
            });
          }
      
        }
      })
      
    });

});
layui.use('form', function(){
  var form = layui.form;
  form.on('submit(add)', function(data){
    console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
     $.ajax({
            url: '../server/admin/teacher/addTeacher.php',
            dataType: 'json',
            type: 'post',
            data: data.field,
            success: function(data) {
              if (data == 'success') {
                layer.msg('新增成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                 window.location.href = 'teacher.php';
                });
              }else if(data == 'exist'){
                 layer.msg('用户已存在', {
                  icon: 2,
                  time: 1500
                }, function() {
                  layer.closeAll();
                });
              }else{
                layer.msg('新增失败', {
                  icon: 2,
                  time: 1500
                }, function() {
                  layer.closeAll();
                });
              }

            }
          })
    return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
  });
  form.verify({
    username: function(value, item){ //value：表单的值、item：表单的DOM对象
    if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
      return '用户名不能有特殊字符';
    }
    if(/(^\_)|(\__)|(\_+$)/.test(value)){
      return '用户名首尾不能出现下划线\'_\'';
    }
  }
  })
});
