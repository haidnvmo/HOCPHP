<?php
    include('../connect/db.php');

    if(isset($_GET['name'])){
        $name = $_GET['name'];
        $sql = "SELECT * FROM quanlycauthu.players where name like '%$name%' ";
        $result = executeResult($sql);
        $search = json_encode($result);
        echo $search;
    }
?>
