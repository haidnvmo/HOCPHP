<?php 
    session_start();

    if(isset($_SESSION['level']) == 1){
        echo ' tao la: '.$_SESSION['name'];
        echo '<a href="deletesession.php">logout</a>';
    } else {
        header('location:login/index.php');
    }
?>