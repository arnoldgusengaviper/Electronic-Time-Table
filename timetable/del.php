<?php
    include 'db.php';
    $id = $_GET['id'];
    $del = "DELETE FROM `courses` WHERE `course_id` = '$id'";
    $res = mysqli_query($db,$del);
    header('location:index.php');
?>