<?php
    session_start();
    include("../database/db.php");

    if(isset($_SESSION['level'])){
        header('location:../showsession.php');
    }
    $email = $password = "";
    $errorEmail = $errorPassword =  "";

    if(isset($_POST['login'])){
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        } else {
            $errorEmail = "vui long nhap email";
        }
        if(isset($_POST['password'])){
            $password = md5($_POST['password']);
        }
        if($email && $password){
            $sql = 'SELECT * FROM thanhvien.member where email = "'.$email.'" and password = "'.$password.'"';
            //echo 'SELECT * FROM member where email = "'.$email.'" and password = "'.$password.'"';
            $user = executeSingleResult($sql);
           // print_r($user);
            if($user){
                $_SESSION['name'] = $user['name'];
                $_SESSION['level'] = $user['level'];
                header("location:../showsession.php");
            }          
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4-md-6">
                <form action="" method="POST">                       
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" id="" aria-describedby="emailHelpId" placeholder="">
                        <span style="color:red;"><?php echo $errorEmail; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" id="" aria-describedby="emailHelpId" placeholder="">
                        <span style="color:red;"><?php echo $errorPassword; ?></span>
                    </div>             
                    <button type="submit" name="login">Login</button>
                </form>
                </div>
        </div>
    </div>             
</body>
</html>