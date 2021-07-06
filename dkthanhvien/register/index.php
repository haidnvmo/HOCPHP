<?php
    include("../database/db.php");

    $name = $email = $password = $level = "";
    $errorName = $errorEmail = $errorPassword =  "";

    if(isset($_POST['register'])){
        if(isset($_POST['name'])){
            $name = $_POST['name'];s
        } else {
            $errorName = "ban chua nhap name";
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        } else {
            $erroremail = "ban chua nhap email";
        }
        if(isset($_POST['password']) == isset($_POST['confirmpassword'])){
            $password = md5($_POST['password']);
        } else {
            $errorPassword = "ban chua nhap dung password";
        }
        if(isset($_POST['level'])){
            $level = $_POST['level'];
        }
        if($name && $email && $password && $level){

            $sql = 'INSERT INTO member (name, email, password, level) values("'.$name.'", "'.$email.'", "'.$password.'", "'.$level.'")';
            execute($sql);
            header('location:../login/index.php');
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
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="emailHelpId" placeholder="">
                        <span style="color:red;"><?php echo $errorName; ?></span>
                    </div>
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
                    <div class="form-group">
                        <label for="">ConfirmPassword</label>
                        <input type="password" class="form-control" name="confirmpassword" id="" aria-describedby="emailHelpId" placeholder="">                  
                    </div>
                    <div class="form-group">
                      <label for="">Thanh vien</label>
                      <select class="form-control" name="level" id="">
                        <option value="2">Thanh vien</option>
                        <option value="1">Admin</option>                     
                      </select>
                    </div>
                    <button type="submit" name="register">Register</button>
                </form>
                </div>
        </div>
    </div>             
</body>
</html>