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
                $a = $b = $c = '';
                $delta = ($b*$b) - 4*$a*$c;
                $x1 = "";
                $x2 = ""; 
                if(isset($_POST['calcula)te'])){
                    if (is_numeric($_POST['a']) && is_numeric($_POST['b']) && is_numeric($_POST['c'])) {
                        $a = isset($_POST['a']) ? $_POST['a'] : '';
                        $b = isset($_POST['b']) ? $_POST['b'] : '';
                        $c = isset($_POST['c']) ? $_POST['c'] : '';
                    } else {
                        echo 1;
                    }
                
                    if ($delta > 0) {
                        $x1 = (- $b + sqrt ( $delta )) / (2 * $a);
                        $x2 = (- $b - sqrt ( $delta )) / (2 * $a);
                        echo ("Phương trình có 2 nghiệm là: " . "x1 = " . $x1 . " và x2 = " . $x2);
                    } else if ($delta == 0) {
                        $x1 = (- $b / (2 * $a));
                        echo ("Phương trình có nghiệm kép: x1 = x2 = " . $x1);
                    } else {
                        echo ("Phương trình vô nghiệm!");
                    }
                } 
            
                                                          
            ?>
                <h1>Giải phương trình bậc hai</h1>
                <form method="post" action="">
                    <input type="number" style="width: 20px" name="a" value=""/>x <sup>2</sup>
                    +
                    <input type="number" style="width: 20px" name="b" value=""/>x
                    + 
                    <input type="number" style="width: 20px" name="c" value=""/>
                    = 0
                    <br/><br/>
                    <input type="submit" name="calculate" value="Tính" />
                </form>
            </div>
        </div>
    </div>

</body>
</html>
