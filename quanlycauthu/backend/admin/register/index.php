<?php
    include('../../layout/header.php');
    include('../../connect/db.php');

    $email = $password = $name ="";
    $errorEmail = $errorPassword = $errorName = "";
    if(isset($_POST['add'])){
        if(empty($_POST['name'])){
            $errorName = "vui long nhap name";
         } else {
            $name = $_POST['name'];
         }
        if(empty($_POST['email'])){
            $errorEmail = "vui long nhap email";
        } else {
            $email = $_POST['email'];           
        }
        if(empty($_POST['password'])){
            $errorpassword = "vui long nhap password";
        } else {
            $password = md5($_POST['password']);         
        }
        if($name && $email && $password){
            $sql = 'INSERT INTO quanlycauthu.admin (email, password, name) values("'.$email.'", "'.$password.'", "'.$name.'")';
            echo 'INSERT INTO quanlycauthu.admin (email, password, name) values("'.$email.'", "'.$password.'", "'.$name.'")';
            execute($sql);
            header("location:../login/index.php");
        }
    }
?>
    <section>
        <div class="container ">
            <div class="row ">
                <div class="col-md-4 col-md-offset-4 login-sec">
                    <h2 class="text-center">Admin</h2>
                    <form class="login-form" action='' method='POST'>
                        <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Name<sup>*</sup></label>
                            <input type="text" name='name' class="form-control" placeholder="">
                            <span style="color:red;"><?php echo $errorName; ?></span>
                        </div>
                            <label for="exampleInputPassword1" class="text-uppercase">Email<sup>*</sup></label>
                            <input type="text" name='email'  class="form-control" placeholder="">
                            <span style="color:red;"><?php echo $errorEmail; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="text-uppercase">Password<sup>*</sup></label>
                            <input type="password" name='password' class="form-control" placeholder="">
                            <span style="color:red;"><?php echo $errorPassword; ?></span>
                        </div>
                        <div class="form-check col-md-offset-4">
                            <button type="submit" name ="add" class="btn btn-login float-right">Dang ky</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </section>
<?php
    include('../../layout/footer.php');
?>