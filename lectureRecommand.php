<?php
    include("common.php");
    $link = new mysqli("localhost", "root", "hh44061312!", "DB_LAB"); // mysqli 객체를 생성

    $sql = "SELECT `SUBJECT`.`SUBJECT_NAME`, count(*) as `count` FROM `STUDENT_GET`, `SUBJECT` WHERE `student_id` IN (SELECT `student_id` FROM `STUDENT` WHERE `MAJOR`=(SELECT `MAJOR` FROM `STUDENT` WHERE `student_id`='{$_GET["id"]}')) AND `STUDENT_GET`.`SUBJECT_ID` = `SUBJECT`.`SUBJECT_ID` GROUP BY `STUDENT_GET`.`SUBJECT_ID` ORDER BY `count` DESC;";
  
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