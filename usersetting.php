<?php
    include("common.php");
   
    if($_GET["_name"]){
	$sql = "UPDATE `STUDENT` SET `STUDENT_NAME`='{$_GET["_name"]}' WHERE `student_id`='{$_GET["id"]}'"; // _name은 외부에서 이름을 수정하기 위해 입력한 데이터
	$link->query($sql);
    }

    if($_GET["_major"]){
	$sql = "UPDATE `STUDENT` SET `MAJOR`='{$_GET["_major"]}' WHERE `student_id`='{$_GET["id"]}'"; // _major은 외부에서 전공을 수정하기 위해 입력한 데이터
	$link->query($sql);
    }

    if($_GET["_semester"]){
	$sql = "UPDATE `STUDENT` SET `PASSED_SEMESTER`={$_GET["_semester"]} WHERE `student_id`='{$_GET["id"]}'"; // _semester은 외부에서 학기를 수정하기 위해 입력한 데이터
	$link->query($sql);
    }

    if($_GET["_grade"]){
	$sql = "UPDATE `STUDENT` SET `GRADE`={$_GET["_grade"]} WHERE `student_id`='{$_GET["id"]}'"; // _grade은 외부에서 학년을 수정하기 위해 입력한 데이터
	$link->query($sql);
     }

    $chk = array("success"=>1);
     echo json_encode($chk, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
 ?>