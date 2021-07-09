<?php
    session_start();
    if(isset($_SESSION['name']) && isset($_SESSION['message'])){
        $sessionName = $_SESSION['name'];
        $message     = $_SESSION['message'];
    } else {
        header("location:../admin/login/index.php"); 
    }

    include("../connect/db.php");
    include("../layout/header.php");

?> 
 
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->     
        <!-- Collect the nav links, forms, and other content for toggling -->     
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?= $sessionName; ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Setting <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="deletesession.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
    <sessection>
        <div class="container ">
            <div class="row ">
                <div class="col-md-12 col-md-12 login-sec">
                   
                    <h2 class="text-center">Danh sách cầu thủ</h2>           
                    <a href="add.php">
					    <button class="btn btn-success" id="" style="margin-bottom: 15px;">Thêm cầu thủ</button>
				    </a>
                        <input type="text" name='name' id="search-name" value="" class="form-control" placeholder="">
                        <!-- <button class="btn btn-success" name="" id="search" style="margin-bottom: 15px;">Tìm cầu Thủ</button> -->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                                <th>National</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody id='list-players'>
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
                                            <td><a href="add.php?id='.$value['id'].'"><button class="btn btn-warning">Edit</button></a></td>
                                            <td><a href="delete.php?id='.$value['id'].'"><button class="btn btn-warning">Delete</button></a></td>
                                        </tr>';
                                }                                                 
                        ?>
                        </tbody>
                        <tbody class="list-search-players">
                        </tbody>
                    </table>                 
                </div>    
            </div>
        </div>
    </section>
<?php
    include("../layout/footer.php");
?>