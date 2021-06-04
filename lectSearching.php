<?php
    $link = new mysqli("localhost", "root", "hh44061312!", "DB_LAB"); // mysqli 객체를 생성

    $sql = "SELECT * FROM SUBJECT WHERE subject_name LIKE '%{$_GET["word"]}%'"; // 쿼리문(word는 검색어 호스트변수)
    $res = $link->query($sql); // 쿼리문 실행 후 결과객체를 받아옴

    $list = array();

    while($chk = $res->fetch_array(MYSQLI_ASSOC)){ // 결과객체에서 데이터 하나 빼오기, 여러개를 가져올 때는 여러번 실행하면 됨
        array_push($list,$chk);
    }

    if(count($list)>0){
        $chk["success"] = 1;
        $chk["list"] = $list;
    }
    else
        $chk = array("success"=>999);

     echo json_encode($chk, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
 ?>