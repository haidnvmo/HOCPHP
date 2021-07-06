<?php
    include("../database/db.php");
    
   
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
                <form action="" method="GET">      
                    <div class="form-group">
                        <label for="">Search</label>
                        <input type="text" class="form-control" name="name" id="" aria-describedby="emailHelpId" placeholder="">
                    </div>                 
                    <button type="submit" name="search">search</button>
                </form>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>email</th>
                            <th>lever</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         $name= '';
                         if(isset($_GET['search'])){
                             $name = ($_GET['name']);
                             if (empty($name)) {
                                 echo "vui long nhap tu khoa";
                             } else {
                                $search = "SELECT * FROM member where name LIKE '%$name%'";
                                $result = executeResult($search);
                                foreach($result as $value){
                                    echo'<tr>
                                            <td>'.$value['name'].'</td>
                                            <td>'.$value['email'].'</td>
                                            <td>'.$value['lever'].'</td>
                                         </tr>';
                                } 
                            }
                         }                                                                          
                        ?>
                    </tbody>
                </table>              
            </div>
        </div>
    </div>             
</body>
</html>