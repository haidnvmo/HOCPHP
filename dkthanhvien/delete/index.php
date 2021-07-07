<?php
    include("../database/db.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = 'DELETE from member where id = "'.$id.'"';
        executeSingleResult($delete);
        header('location:../selectdata/index.php');
    }
?>