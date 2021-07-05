<?php
    $authors = array(
        array(
            'name' => 'Nguyễn Văn Cường',
            'blog' => 'freetuts.net',
            'position' => 'admin'
        ),
        array(
            'name' => 'sae jan',
            'blog' => 'freetuts.net',
            'position' => 'author'
        ),
        array(
            'name' => 'Hoàng Văn Tuyền',
            'blog' => 'freetuts.net',
            'position' => 'author'
        ),
        array(
            'name' => 'Nguyễn Tình',
            'blog' => 'freetuts.net',
            'position' => 'author'
        )
    );
   
    $authors[1]['name'] = 'hai';
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
                <?php
                foreach($authors as $key => $value){
                    echo '<table class="table">
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>blog</th>
                            <th>position</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>'.$value['name'].'</td>
                            <td>'.$value['blog'].'</td><br>
                            <td>'.$value['position'].'</td>                       
                        </tr>
                    </tbody>
                </table>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>