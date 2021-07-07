<?php
    include("../connect/db.php");
    include("../layout/header.php");
    
    $name = $age = $position = $national = $salary = $id = "";
    $errorName =  $errorAge = $errorPosition = $errorNational = $errorSalary = "";
    if(isset($_POST['add'])){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        } else {
            $errorName = "vui long nhap ten cau thu";
        }
        if(isset($_POST['age'])){
            $age = $_POST['age'];
        } else {
            $errorAge = "vui long nhap tuoi cau thu";
        } 
        if(isset($_POST['position'])){
            $position = $_POST['position'];
        } else {
            $errorPosition = "vui long nhap chuc vu cau thu";
        } 
        if(isset($_POST['national'])){
            $national = $_POST['national'];
        } else {
            $errorNational = "vui long nhap quoc gia cau thu";
        }
        if(isset($_POST['salary'])){
            $salary = $_POST['salary'];
        } else {
            $errorSalary = "vui long nhap luong cau thu";
        }
        if($name && $age && $position && $national && $salary){
            
            $sql = 'INSERT INTO quanlycauthu.players (name, age, national, position, salary) values("'.$name.'", "'.$age.'", "'.$position.'", "'.$national.'", "'.$salary.'")';
            execute($sql);
        }
    }
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $select = 'SELECT * FROM players where id = "'.$id.'"';
        $result = executeSingleResult($select);
        if($result != null){
            $name = $result['name'];
            $age = $result['age'];
            $national = $result['national'];
            $position = $result['name'];
            $salary = $result['name'];
        }
    }
?>  
   <div class="container ">
   <div class="row ">
   <div class="col-md-4 col-md-offset-4 login-sec">
   <h2 class="text-center">Đăng ký cầu thủ</h2>
   <form class="login-form" action='' method='POST'>
      <div class="form-group">
      <input type="text" name="id" value="<?=$id?>" hidden="true">
         <label for="exampleInputPassword1" class="text-uppercase">Name<sup>*</sup></label>
         <input type="text" name='name' value="<?= $name ?>"  class="form-control" placeholder="">
         <span style="color:red;"><?php echo $errorName; ?></span>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1" class="text-uppercase">Age<sup>*</sup></label>
         <input type="number" name='age' class="form-control" placeholder="">
         <span style="color:red;"><?php echo $errorAge; ?></span>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">National<sup>*</sup></label>
        <input type="text" name='national' class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorNational; ?></span>
     </div>
     <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">position<sup>*</sup></label>
        <input type="text" name='position' class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorPosition; ?></span>
     </div>
     <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">salary <sup>*</sup></label>
        <input type="number" name='salary' class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorSalary; ?></span>
     </div>
      <div class="form-check col-md-offset-4">
        <button type="submit" name ="add" class="btn btn-login float-right">Thêm cẩu thủ</button>
      </div>
   </form>
</section>
<?php
    include("../layout/footer.php");
?>