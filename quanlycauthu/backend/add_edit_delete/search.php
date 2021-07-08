<?php
    include('../connect/db.php');
    include('../layout/header.php');
 
?>
    <sessection>
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 col-md-12 login-sec">
                    <h2 class="text-center">Tim cau thu</h2>
                    <form action="" method="GET">
                        <input type="text" name='name' id="" value="" class="form-control" placeholder="">    
                        <button class="btn btn-success" name="search" id="" style="margin-bottom: 15px;">Tìm cầu Thủ</button>
                        
                    </form>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>National</th>
                                <th>Position</th>
                                <th>salary</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                                if(isset($_GET['search'])){
                                    $name = $_GET['name'];
                                    if (empty($name)) {
                                        echo  '<span style="color:red;">vui long nhap ten cau thu</span>';
                                    } else {
                                       $search = "SELECT * FROM players where name LIKE '%$name%'";
                                       $result = executeResult($search);
                                       foreach($result as $value){
                                           echo'<tr>
                                                   <td>'.$value['name'].'</td>
                                                   <td>'.$value['age'].'</td>
                                                   <td>'.$value['national'].'</td>
                                                   <td>'.$value['position'].'</td>
                                                   <td>'.$value['salary'].'</td>
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
    </section>

<?php
    include("../layout/footer.php");
?>