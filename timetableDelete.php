<?php
    include("common.php");
   
    $sql = "DELETE FROM `STUDENT_GET` WHERE `STUDENT_GET`.`student_id`='{$_GET["id"]}' and `STUDENT_GET`.`subject_id`='{$_GET["sub"]}'";
    $link->query($sql);

    $chk = array("success"=>1);
     echo json_encode($chk, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
 ?>