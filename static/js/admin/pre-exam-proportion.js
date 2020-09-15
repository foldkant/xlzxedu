layui.use('table', function() {
  var table = layui.table;

  table.render({
    elem: '#test',
    url: '../server/admin/exam/getProportion.php',
    title: '用户数据表',
    cols: [
      [{
        field: 'id',
        title: 'ID',
        width: 80,
        fixed: 'left',
        unresize: true,
        sort: true
      }, {
        field: 'question',
        title: '问题',
        edit: 'text'
      }, {
        field: 'a',
        unresize: true,
        title: '选项A',
        width: 80
      }, {
        field: 'proportion_a',
        title: 'A比重',
        unresize: true,
        width: 70,
        edit: 'text',
      }, {
        field: 'b',
        unresize: true,
        title: '选项B',
        width: 80
      }, {
        field: 'proportion_b',
        unresize: true,
        title: 'B比重',
        width: 70,
        edit: 'text'
      }, {
        field: 'c',
        unresize: true,
        title: '选项C',
        width: 80
      }, {
        field: 'proportion_c',
        unresize: true,
        title: 'C比重',
        width: 70,
        edit: 'text'
      }, {
        field: 'd',
        unresize: true,
        title: '选项D',
        width: 80
      }, {
        field: 'proportion_d',
        unresize: true,
        title: 'D比重',
        width: 70,
        edit: 'text'
      }]
    ]
  });
  table.on('edit(test)', function(obj) { //注：edit是固定事件名，test是table原始容器的属性 lay-filter="对应的值"
    if (isNaN(obj.value)) {
      layer.msg('请填写1,2,3,4');
      $(this).val('');
    } else {
      var patt = /^[1-4]{1}$/
      if (!patt.test(obj.value)) {
        layer.msg('请填写1,2,3,4');
        $(this).val('');
        $('#save').addClass('layui-btn-disabled').attr('disabled', 'disabled');
      } else {
        $('#save').removeClass('layui-btn-disabled').removeAttr('disabled');
      }
    }

  });

});

function save() {
  layui.use('table', function() {
    var table = layui.table;
    var data = layui.table.cache.test;
    var id = '';
    for (var val in data) {
      var a = parseInt(data[val]['proportion_a']);
      var b = parseInt(data[val]['proportion_b']);
      var c = parseInt(data[val]['proportion_c']);
      var d = parseInt(data[val]['proportion_d']);
      if (((a + b + c + d) != 10)||a==b||b==c||c==d||a==d) {
        id = id + data[val]['id'] + '<br>';
      }
    }
    console.log(id);
    if (id != '') {
      layer.open({
        title: '校验',
        content: '以下ID序号的比重请检查：' + '<br>' + id
      });

    } else {
      console.log(data);
      $.ajax({
        url: '../server/admin/exam/proportion.php',
        dataType: 'json',
        type: 'post',
        async: false,
        data: {
          data:JSON.stringify(data)
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
  })

}