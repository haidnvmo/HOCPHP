<?php
    session_start();
    if(isset($_SESSION['name'])){
        echo  $_SESSION['name'];
        echo '<a href="deletesession.php">logout</a>';
    } else {
        header("location:../admin/login/index.php");
    }
    include("../connect/db.php");
    include("../layout/header.php");
    

?>  
    <sessection>
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 col-md-12 login-sec">
                    <h2 class="text-center">Danh sách cầu thủ</h2>
                    <a href="add.php">
					    <button class="btn btn-success" style="margin-bottom: 15px;">Thêm Danh Mục</button>
				    </a>
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
                            $sql = 'SELECT * FROM quanlycauthu.players';
                            $reulst = executeResult($sql);
                            foreach($reulst as $value){
                                echo '<tr>
                                        <td>'.$value['name'].'</td>
                                        <td>'.$value['age'].'</td>
                                        <td>'.$value['national'].'</td> 
                                        <td>'.$value['position'].'</td>
                                        <td>'.$value['salary'].'</td>
                                        <td><a href="add.php?id='.$value['id'].'">Edit</a></td>
                                        <td><a href="delete.php?id='.$value['id'].'">Delete</a></td>
                                    </tr>';
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