<?php
   session_start();
   include('../../layout/header.php');
   include('../../connect/db.php');

   $email = $password  ="";
   $errorEmail = $errorPassword ="";
   if(isset($_POST['login'])){
      if(empty($_POST['email'])){
         $errorEmail = "vui long nhap email";
      } else {
         $email = $_POST['email'];
      }
      if(empty($_POST['password'])){
         $errorPassword= "vui long nhap password";
      } else {
         $password = md5($_POST['password']);
      }
      if($password && $email){
         
         $sql = 'SELECT * FROM quanlycauthu.admin where email = "'.$email.'" and password = "'.$password.'"';
         //echo 'SELECT * FROM quanlycauthu.admin where email = "'.$email.'", password = "'.$password.'"';
         $user = executeSingleResult($sql);
         // var_dump($user);
         if($user){
            $_SESSION['name'] = $user['name'];
            header("location:../../add_edit_delete/select_cauthu.php");
         }
         
      }
   }
?>
<section>
   <div class="container ">
      <div class="row ">
         <div class="col-md-4 col-md-offset-4 login-sec">
            <h2 class="text-center">Login</h2>
               <form class="login-form" action='' method='POST'>
                  <div class="form-group">
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
                     <button type="submit" name ="login" class="btn btn-login float-right">Login</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</section>
<?php
    include('../../layout/footer.php');
?>