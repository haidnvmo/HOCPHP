<?php
    
    include('../connect/db.php');
    $id = "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = 'DELETE from players where id = "'.$id.'"';
        executeSingleResult($sql);
        header('location:select_cauthu.php');
    }
?>