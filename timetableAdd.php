<?php
    include("common.php");
    $sql = "INSERT INTO `STUDENT_GET` (`student_id`, `subject_id`) SELECT '{$_GET["id"]}', '{$_GET["sub"]}' FROM DUAL WHERE NOT EXISTS (SELECT * FROM (SELECT * FROM `student_passed` UNION ALL SELECT * FROM `student_get`) as `temp` WHERE `student_id`='{$_GET["id"]}' and `subject_id`='{$_GET["sub"]}')";
    echo $sql;
    $link->query($sql);

    $chk = array("success"=>1);
     echo json_encode($chk, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
 ?>