<?php
include('db.php');
    // $con = new mysqli("localhost","root","","invoice") or die(mysqli_error($con->error));
    $table = "invoice_data";


    $query = "SELECT pro_id FROM invoice_data order by pro_id desc";

    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);

    $lastnumber = $row['pro_id'];

    if(empty($lastnumber)){
          $number = "MF-0000001";
    }else{
        $idd = str_replace("MF-","",$lastnumber);
        $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
        $number = 'MF-' .$id;
    }

?>
<?php

    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $price = $_POST['price'];
        
        if(!$con){
            die("connection failed" .mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO invoice_data(pro_id,pro_name,price) VALUES('".$pro_id."','".$pro_name."','".$price."')";

            if(mysqli_query($con,$sql)){
                // $con = new mysqli("localhost","root","","invoice") or die(mysqli_error($con->error));
                $table = "invoice_data";
            
            
                $query = "SELECT pro_id FROM invoice_data order by pro_id desc";
            
                $result = mysqli_query($con,$query);
                $row = mysqli_fetch_array($result);
            
                $lastnumber = $row['pro_id'];
            
                if(empty($lastnumber)){
                      $number = "MF-0000001";
                }else{
                    $idd = str_replace("MF-","",$lastnumber);
                    $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
                    $number = 'MF-' .$id;
                }
            }
        }
        
    }else{
        echo "Record added failed";
    }
    

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INvoice</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    
</head>
<body>

    <div class="container">
    <div class="row">

        <div class="col-sm-4">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">

                <div>
                    <h1>INvoice NUmber Generate</h1>
                    <div>
                        <label for="in_id">Invoice Number</label>
                        <input type="text" class="form-control" id="in_id" name="pro_id" value="<?php echo $number?>" readonly>
                    </div>
                    <div>
                        <label for="pro_name">Pro Name</label>
                        <input type="text" class="form-control" id="pro_name" name="pro_name" value="" >
                    </div>
                    <div>
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="">
                    </div>
                    <button type="submit" class="btn btn-success form-control">Submit</button>
                </div>

            </form>

        </div>

        </div>
    </div>

    <script src="jquery-3.4.1.min.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>
</html>