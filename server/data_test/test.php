<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <script src="../../static/js/jquery.min.js"></script>
    <script>
   
    for (var i = 1; i < 56; i++) {
    	 var data = JSON.stringify({ "14": a(), "15": a(), "16": a(), "17": a(), "18": a(), "19": a(), "20": a(), "21": a(), "22": a(), "23": a() });
        $.ajax({
            url: '../student/answerTest.php',
            dataType: 'json',
            type: 'post',
            data: {
                data: data
            },
            success: function(data) {}
        })
    }


    function random(lower, upper) {
        return Math.floor(Math.random() * (upper - lower + 1)) + lower;
    }

    function a() {
        switch (random(1, 4)) {
            case 1:
                return "A";
                break;
            case 2:
                return "B";
                break;
            case 3:
                return "C";
                break;
            case 4:
                return "D";
                break;
        }
    }
    </script>
</body>

</html>