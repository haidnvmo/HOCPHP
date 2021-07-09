<?php
    include("../connect/db.php");
    include("../layout/header.php");
    
    $name = $age = $position = $national = $salary = $id = "";
    $errorName =  $errorAge = $errorPosition = $errorNational = $errorSalary = "";
    if(isset($_POST['add'])){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(empty($_POST['name'])){
            $errorName = "Vui lòng nhập cầu thủ";
        } else {
            $name = $_POST['name'];
         
        }
        if(empty($_POST['age'])){
            $errorAge = "Vui lòng nhập tuổi cầu thủ";
        } else {
            $age = $_POST['age'];            
        } 
        if(empty($_POST['position'])){
            $errorPosition = "Vui lòng nhập chức vụ";
        } else {
            $position = $_POST['position'];         
        } 
        if(empty($_POST['national'])){
            $errorNational = "Vui lòng nhập Quốc Gia";
        } else {
            $national = $_POST['national'];
        }
        if(empty($_POST['salary'])){
            $errorSalary = "Vui lòng nhập Lương cầu thủ";
        } else {
            $salary = $_POST['salary'];         
        }
        if($name && $age && $position && $national && $salary){
            if($id == ""){
                $sql = 'INSERT INTO quanlycauthu.players (name, age, national, position, salary) values("'.$name.'", "'.$age.'", "'.$national.'", "'.$national.'", "'.$salary.'")';
            } else {               
                $sql = 'UPDATE quanlycauthu.players set name = "'.$name.'", age = "'.$age.'", national = "'.$national.'", position = "'.$position.'", salary = "'.$salary.'" where id = "'.$id.'" ';
            }
            execute($sql);
            header("location:select_cauthu.php");
            die();
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
            $position = $result['position'];
            $salary = $result['salary'];
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
      <!-- <div class="form-group">
        
         <input type="number" name='age' value="" class="form-control" placeholder="">
        
      </div> -->
      <label for="exampleInputPassword1" class="text-uppercase">Age<sup>*</sup></label>
      <select name="age" id="inputage" class="form-control" required="required">
        <?php
           for ($i=15; $i < 40; $i++) { 
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
        
      </select>
      <span style="color:red;"><?php echo $errorAge; ?></span>
      
      <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">National<sup>*</sup></label>
        <input type="text" name='national' value="<?= $national ?>" class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorNational; ?></span>
     </div>
     <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">position<sup>*</sup></label>
        <input type="text" name='position' value="<?= $position ?>" class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorPosition; ?></span>
     </div>
     <div class="form-group">
        <label for="exampleInputPassword1" class="text-uppercase">salary <sup>*</sup></label>
        <input type="number" name='salary' value="<?= $salary ?>" class="form-control" placeholder="">
        <span style="color:red;"><?php echo $errorSalary; ?></span>
     </div>
     
     <!-- <select name="nam" id="inputnam" class="form-control" required="required">
     <label for="exampleInputPassword1" class="text-uppercase">Nam<sup>*</sup></label>
        <?php
            // for ($i=1970; $i < 2021; $i++) { 
            //     echo '<option value="">'.$i.'</option>';
            // }
        ?>      
     </select> -->
     
      <div class="form-check col-md-offset-4">
        <button type="submit" name ="add" class="btn btn-login float-right">Thêm cẩu thủ</button>
      </div>
   </form>
</section>
<?php
    include("../layout/footer.php");
?>