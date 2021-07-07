<?php
    include("../database/db.php");
    $name = $email = $id = "";
    $errorName = $errorEmail = $errorPassword =  "";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $select = 'SELECT * FROM member where id = "'.$id.'"';
        if($select){
            $result = executeSingleResult($select);

            if($result != null){
                $name = $result['name'];
                $email = $result['email'];
            
        } else {
            header("location:../../page/404.php");
        }
       }
    }
    if(isset($_POST['edit'])){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        } else {
            $errorName = "ban chua nhap name";
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        } else {
            $erroremail = "ban chua nhap email";
        }
        if($name && $email){

            $sql = 'UPDATE thanhvien.member set member.name = "'.$name.'", email = "'.$email.'" where id = "'.$id.'" ';
            $edit = execute($sql);
            header('location:../selectdata/index.php');
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
                        <input type="text" name="id" value="<?=$id?>" hidden="true">
                        <input type="text" class="form-control" name="name" value="<?= $name ?>" id="" aria-describedby="emailHelpId" placeholder="">
                        <span style="color:red;"><?php echo $errorName; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" value="<?= $email ?>" name="email" id="" aria-describedby="emailHelpId" placeholder="">
                        <span style="color:red;"><?php echo $errorEmail; ?></span>
                    </div>
                    <button type="submit" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>             
</body>
</html>