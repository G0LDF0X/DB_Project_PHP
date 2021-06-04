<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    include("common.php");

    $sql = "SELECT `subject`.`subject_id`, `student`.`student_id`, `subject`.`subject_name`, `subject`.`professor`, `subject`.`credit`,`subject_time`.`class_day`, `subject_time`.`start_time`, `subject_time`.`end_time` FROM `SUBJECT`, `SUBJECT_TIME`, `STUDENT`, `STUDENT_GET` WHERE `student`.`student_id`='{$_GET["id"]}' and `student`.`STUDENT_ID`=`student_get`.`STUDENT_ID` and `subject`.`subject_id`=`student_get`.`subject_id` and `subject`.`subject_id`=`subject_time`.`subject_id`";
// 쿼리문(_id는 학번 호스트변수)

      $res = $link->query($sql); // 쿼리문 실행 후 결과객체를 받아옴
    $list = array();
    while($chk = $res->fetch_array(MYSQLI_ASSOC)){ // 결과객체에서 데이터 하나 빼오기, 여러개를 가져올 때는 여러번 실행하면 됨
	array_push($list, $chk);
    }
    if(count($list)>0){
        $chk["success"] = 1;
        $chk["list"] = $list;
    }
    else
        $chk = array("success"=>999);

     echo json_encode($chk, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
 ?>