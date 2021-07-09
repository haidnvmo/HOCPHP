<?php
   session_start();
   // include('../../layout/header.php');
   include('../../connect/db.php');

   if(isset($_SESSION['name'])){
      header('location:../../add_edit_delete/select_cauthu.php');
   }
   $email = $password  = $error = "";
   $errorEmail = $errorPassword ="";
   if(isset($_POST['login'])){
      if(empty($_POST['email'])){
         $errorEmail = "Vui lòng nhập email";
      } else {
         $email = $_POST['email'];
      }
      if(empty($_POST['password'])){
         $errorPassword= "Vui lòng nhập password";
      } else {
         $password = md5($_POST['password']);
      }
      if($password && $email){
         
         $sql = 'SELECT * FROM quanlycauthu.admin where email = "'.$email.'" and password = "'.$password.'"';
         //echo 'SELECT * FROM quanlycauthu.admin where email = "'.$email.'", password = "'.$password.'"';
         $user = executeSingleResult($sql);
         // var_dump($user);
         if($user){
            $_SESSION['message']="You are now logged in.";
            $_SESSION['name'] = $user['name'];
            header("location:../../add_edit_delete/select_cauthu.php?success=Thêm Thành công");
         } else {
            $error = "Mật khẩu tài khoản không đúng";
         }  
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
               <span>Login</span>
               
            </div>
            <div class="app-contact">CONTACT INFO : Sae Jan 0355777573</div>
         </div>
         <div class="screen-body-item">
         <form class="login-form" action='' method='POST'>
            <div class="app-form">
               <div class="app-form-group">
               <input type="text" class="app-form-control" name="email" placeholder="Email" value="">
               <span style="color:white;"><?php echo $errorPassword; ?></span>
               </div>
               <div class="app-form-group">
               <input type="password" class="app-form-control" name="password" placeholder="Password">
               <span style="color:white;"><?php echo $errorPassword; ?></span>
               </div>
               <button type="submit" name="login" class="app-form-button">Đăng nhập</button><br>
               <span style="color:white;"><?php echo $error; ?></span>
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