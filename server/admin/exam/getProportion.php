    <?php 
    header("Content-type:application/json; charset=utf-8");
    require_once('../../conn.php');

    if($conn){
        //执行成功的过程
        mysqli_query($conn,"SET NAMES utf8");
        session_start();
        $countSql = "SELECT COUNT(*) FROM `pre_exam_proportion`";
        $countResult = mysqli_query($conn,$countSql);
        $countRow = mysqli_fetch_array($countResult);
        $count = $countRow[0];
        
        $pageNum = isset($_GET['limit'])?$_GET['limit']:10; //接收每页显示多少条记录
        $page = ceil($count/$pageNum);//总页数，ceil向上取整
        $page = isset($_GET['page'])?$_GET['page']:1;//当前是第几页
        $startpos = ($page-1)*$pageNum;//开始位置，默认从0开始
        $sql = "SELECT 
            pre_exam_proportion.id,
            pre_exam_proportion.exam_id,
            exam.question,
            exam.a,
            exam.b,
            exam.c,
            exam.d,
            pre_exam_proportion.proportion_a,
            pre_exam_proportion.proportion_b,
            pre_exam_proportion.proportion_c,
            pre_exam_proportion.proportion_d
        FROM pre_exam_proportion JOIN exam ON pre_exam_proportion.exam_id = exam.id
        LIMIT $startpos,$pageNum";
         // echo($sql);
        $result = mysqli_query($conn,$sql);
        $senddata = array();
        $senddata['code']=0;
        $senddata['msg']='';
        $senddata['count']=$count;
        while($row = mysqli_fetch_assoc($result)){
            $senddata['data'][]=$row;
        }
        
        echo json_encode($senddata, JSON_UNESCAPED_UNICODE);
    }else{
        mysqli_close($conn);
    }



     ?>
