<?php
    // include('../../layout/header.php');
    include('../../connect/db.php');

    $email = $password = $name = $error = $errorUser = "";
    $errorEmail = $errorPassword = $errorName = "";
    if(isset($_POST['add'])){
        if(empty($_POST['name'])){
            $errorName = "Vui lòng nhập name";
         } else {
            $name = $_POST['name'];
         }
        if(empty($_POST['email'])){
            $errorEmail = "Vui lòng nhập email";
        } else {
            $email = $_POST['email'];           
        }
        if(empty($_POST['password'])){
            $errorPassword = "Vui lòng nhập password";
        } else {
            $password = md5($_POST['password']);         
        }
        if($name && $email && $password){
            $checkEmail = 'SELECT * FROM quanlycauthu.admin where email = "'.$email.'"';
            $result = executeSingleResult($checkEmail);
            if($result){
                $errorUser = 'Email đã tồn tại';
            } else {
                $sql = 'INSERT INTO quanlycauthu.admin (email, password, name) values("'.$email.'", "'.$password.'", "'.$name.'")';
                execute($sql);
            }   
            header("location:../login/index.php");
        } else {
            $error = "Email và password không hợp lệ";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../css/css/css-login.css">
   <title>Document</title>
</head>
<body>
   <div class="background">
   <div class="container">
      <div class="screen">
         <div class="screen-header">
         <div class="screen-header-left">
            <div class="screen-header-button close"></div>
            <div class="screen-header-button maximize"></div>
            <div class="screen-header-button minimize"></div>
         </div>
         <div class="screen-header-right">
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
            <div class="screen-header-ellipsis"></div>
         </div>
         </div>
         <div class="screen-body">
         <div class="screen-body-item left">
            <div class="app-title">
               <span>Register</span>
               
            </div>
            <div class="app-contact">CONTACT INFO : Sae Jan 0355777573</div>
        </div>
        <div class="screen-body-item">
                <form class="login-form" action='' method='POST'>
                    <div class="form-group">
                        <div class="app-form">
                        <div class="app-form-group">
                        <input type="text" class="app-form-control" name="name" placeholder="Name" value="">
                        <span style="color:white;"><?php echo $errorName; ?></span>
                        </div>
                        <div class="app-form">
                        <div class="app-form-group">
                        <input type="text" class="app-form-control" name="email" placeholder="Email" value="">
                        <span style="color:white;"><?php echo $errorEmail; ?></span>
                        </div>
                        <div class="app-form-group">
                        <input type="password" class="app-form-control" name="password" placeholder="Password">
                        <span style="color:white;"><?php echo $errorPassword; ?></span>
                        </div>
                        <button type="submit" name="add" class="app-form-button">Đăng ký</button><br>
                        <span style="color:white;"><?php echo $error; ?></span>
                        <span style="color:white;"><?php echo $errorUser;?></span>
                        </div>
                    </div> 
                </form>
            </div>
        </div>
      </div>
   </div>
   </div>
   </body>
</html>