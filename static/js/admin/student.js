layui.use('table', function() {
  var table = layui.table;

  table.render({
    elem: '#student',
    url: '../server/admin/student/getStudent.php',
    toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
      ,
    defaultToolbar: ['filter', 'exports', 'print', { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
      title: '提示',
      layEvent: 'LAYTABLE_TIPS',
      icon: 'layui-icon-tips'
    }],
    title: '学生账户信息表',
    cols: [
      [{
        type: 'checkbox',
        fixed: 'left'
      }, {
        field: 'id',
        title: 'ID',
        width: 80,
        fixed: 'left',
        unresize: true
      }, {
        field: 'class',
        title: '班级',
        unresize: true
      }, {
        field: 'name',
        title: '姓名',
        unresize: true
      }, {
        field: 'username',
        title: '用户名',
        unresize: true
      }, {
        field: 'password',
        title: '密码',
        edit: 'text',
        unresize: true
      }, {
        fixed: 'right',
        title: '操作',
        toolbar: '#barDemo',
        width: 150
      }]
    ],
    page: true
  });

  //头工具栏事件
  table.on('toolbar(student)', function(obj) {
    var checkStatus = table.checkStatus(obj.config.id);
    switch (obj.event) {
      case 'getCheckData':
        var data = checkStatus.data;
        data = JSON.stringify(data)
        console.log(data);
        layer.confirm('确定删除这些学生？', function(index) {
          $.ajax({
            url: '../server/admin/student/batchDelStudent.php',
            dataType: 'json',
            type: 'post',
            data: {
              data: data
            },
            success: function(data) {
              if (data == 'success') {
                layer.msg('删除成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                  var table = layui.table;
                  //执行重载
                  table.reload('student', {
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
  table.on('tool(student)', function(obj) {
    //console.log(obj)
    if (obj.event === 'del') {
      var name = obj.data.name;
      layer.confirm('是否删除 ' + name + ' 的账户？', function(index) {
        $.ajax({
          url: '../server/admin/student/delStudent.php',
          dataType: 'json',
          type: 'get',
          data: {
            id: obj.data.id
          },
          success: function(data) {
            if (data == 'success') {
              layer.msg('删除成功', {
                icon: 1,
                time: 1500
              }, function() {
                var table = layui.table;
                //执行重载
                table.reload('student', {
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
  table.on('edit(student)', function(obj) { //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
    console.log(obj.value); //得到修改后的值
    console.log(obj.field); //当前编辑的字段名
    console.log(obj.data); //所在行的所有相关数据
    $.ajax({
      url: '../server/admin/student/updateStudent.php',
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
            table.reload('student', {
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
//批量导入
layui.use('upload', function() {
  var upload = layui.upload;

  //执行实例
  var uploadInst = upload.render({
    elem: '#upload' //绑定元素
      ,
    url: '../server/admin/student/batchUpload.php' //上传接口
      ,
    accept: 'file',
    acceptMime: 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    exts: 'xls|xlsx',
    before: function(obj) {
      layer.load(1, {
        shade: [0.8, '#393D49']
      });
    },
    done: function(res) {
      //上传完毕回调
      layer.closeAll('loading');
      layer.msg('批量上传成功!', {
        icon: 1,
        time: 1500
      });
      var table = layui.table;
      //执行重载
      table.reload('student', {
        page: {
          curr: 1 //重新从第 1 页开始
        },
      }, 'data');
    },
    error: function() {
      //请求异常回调
      layer.closeAll('loading');
      layer.msg('批量上传失败!', {
        icon: 2,
        time: 1500
      });
    }
  });
});
$(document).ready(function() {
  //获取下拉选项
  layui.use('form', function() {
    var form = layui.form;
    $.ajax({
      url: '../server/admin/student/getStudentClass.php',
      dataType: 'json',
      type: 'get',
      success: function(data) {
        $.each(data, function(index, item) {
          $('#getClass').append(new Option(item.class, item.classId)); // 下拉菜单里添加元素
        });
        layui.form.render("select"); //重新渲染 固定写法
      }
    })
    form.on('select(getClass)', function(data) {
      console.log(data.value); //得到被选中的值
      sessionStorage.setItem("class", data.value);
      var table = layui.table;
      table.render({
        elem: '#student',
        url: '../server/admin/student/getStudent.php?classId=' + data.value,
        toolbar: '#toolbarDemo' //开启头部工具栏，并为其绑定左侧模板
          ,
        defaultToolbar: ['filter', 'exports', 'print', { //自定义头部工具栏右侧图标。如无需自定义，去除该参数即可
          title: '提示',
          layEvent: 'LAYTABLE_TIPS',
          icon: 'layui-icon-tips'
        }],
        title: '用户数据表',
        cols: [
          [{
            type: 'checkbox',
            fixed: 'left'
          }, {
            field: 'id',
            title: 'ID',
            width: 80,
            fixed: 'left',
            unresize: true
          }, {
            field: 'class',
            title: '班级',
            unresize: true
          }, {
            field: 'name',
            title: '姓名',
            unresize: true
          }, {
            field: 'username',
            title: '用户名',
            unresize: true
          }, {
            field: 'password',
            title: '密码',
            edit: 'text',
            unresize: true
          }, {
            fixed: 'right',
            title: '操作',
            toolbar: '#barDemo',
            width: 150
          }]
        ],
        page: true
      });
    });
  });
})
layui.use('form', function(){
  var form = layui.form;
  form.on('submit(add)', function(data){
    console.log(data.field) //当前容器的全部表单字段，名值对形式：{name: value}
     $.ajax({
            url: '../server/admin/student/addStudent.php',
            dataType: 'json',
            type: 'post',
            data: data.field,
            success: function(data) {
              if (data == 'success') {
                layer.msg('新增成功', {
                  icon: 1,
                  time: 1500
                }, function() {
                 window.location.href = 'student.php';
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
