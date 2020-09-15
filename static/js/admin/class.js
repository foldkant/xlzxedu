layui.use('table', function(){
  var table = layui.table;
  
  table.render({
    elem: '#class-table'
    ,url:'../server/admin/class/getClass.php'
    ,toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
    ,defaultToolbar: ['filter', 'exports', 'print', { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
      title: '提示'
      ,layEvent: 'LAYTABLE_TIPS'
      ,icon: 'layui-icon-tips'
    }]
    ,title: '班级数据表'
    ,cols: [[
      {type: 'checkbox', fixed: 'left'}
      ,{field:'id', title:'ID', width:80, fixed: 'left', unresize: true}
      ,{field:'class', title:'班级', unresize: true}
      ,{fixed: 'right', title:'操作', toolbar: '#barDemo', width:150}
    ]]
    ,page: true
  });
  
  //头工具栏事件
  table.on('toolbar(class-table)', function(obj){
    var checkStatus = table.checkStatus(obj.config.id);
    switch(obj.event){
      case 'getCheckData':
        var data = checkStatus.data;
        data = JSON.stringify(data)
        console.log(data);
         layer.confirm('确定删除这些班级？', function(index) {
          $.ajax({
            url: '../server/admin/class/batchDelClass.php',
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
                  table.reload('class-table', {
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
  table.on('tool(class-table)', function(obj) {
      //console.log(obj)
      if (obj.event === 'del') {
        var className = obj.data.class;
        layer.confirm('是否删除 '+className+' ？', function(index) {
          $.ajax({
            url: '../server/admin/class/delClass.php',
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
                  table.reload('class-table', {
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
  
  layui.use('form', function(){
  var form = layui.form;
  form.on('submit(add)', function(data){
    console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
     $.ajax({
            url: '../server/admin/class/addClass.php',
            dataType: 'json',
            type: 'get',
            data: data.field,
            success: function(data) {
              if (data == 'success') {
                layer.msg('新增成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                  layer.closeAll();
                  //执行重载
                  table.reload('class-table', {
                    page: {
                      curr: 1 //重新从第 1 页开始
                    },
                  }, 'data');
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

});

});

