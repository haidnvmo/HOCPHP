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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
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
                            $select = "SELECT * FROM member";
                            $result = executeResult($select);
                            foreach($result as $value){
                                echo'<tr>
                                        <td>'.$value['name'].'</td>
                                        <td>'.$value['email'].'</td>
                                        <td>'.$value['level'].'</td>
                                        <td><a href="../edit/index.php?id='.$value['id'].'">Edit</a></td>
                                        <td><a href="../delete/index.php?id='.$value['id'].'">Delete</a></td>
                                    </tr>';
                            }                                                                         
                        ?>
                    </tbody>
                </table>
            </div>                   
        </div>
    </div>             
</body>
</html>