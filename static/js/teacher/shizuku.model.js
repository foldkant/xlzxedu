window.onload=function(){
    L2Dwidget.init({
        "model": {
            //jsonpath控制显示那个小萝莉模型，下面这个就是我觉得最可爱的小萝莉模型，替换时后面名字也要替换掉
            jsonPath: "../static/business/model-shizuku/assets/shizuku.model.json",
            "scale": 1
        },
        "display": {
            "position": "left", //看板娘的表现位置
            "width": 60,  //小萝莉的宽度
            "height": 80, //小萝莉的高度
            "hOffset": 5,
            "vOffset": 0
        },
        "mobile": {
            "show": true,
            "scale": 0.5
        },
        "react": {
            "opacityDefault": 1,
            "opacityOnHover": 0.2
        }
    });
}