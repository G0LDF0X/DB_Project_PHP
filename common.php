<?php
    $link = new mysqli("localhost", "root", "hh44061312!", "DB_LAB"); // mysqli 객체를 생성
    $sql = "SELECT * FROM `STUDENT` WHERE `student_id`='{$_GET["id"]}'"; // 쿼리문(_id는 학번 호스트변수)
      $res = $link->query($sql); // 쿼리문 실행 후 결과객체를 받아옴
    $chk = $res->fetch_array(MYSQLI_ASSOC); // 결과객체에서 데이터 하나 빼오기, 여러개를 가져올 때는 여러번 실행하면 됨

    if(!$chk){
        echo json_encode(array("success"=>1000));
        exit;
    }
?>