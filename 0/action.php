<?php
    include('db.php');

    if(isset($_POST['idd'])){
        $output='';
        $querydi = mysqli_query($con,"SELECT * FROM districts WHERE division_id='".$_POST['idd']."' ORDER BY name ");
        $output .='<option value="">Select Your District</option>';
            while($rowdi=mysqli_fetch_array($querydi)){
                $output .='<option value="'.$rowdi["id"].'">'.$rowdi["bn_name"].'</option>';
            }
            echo $output;
    }
    if(isset($_POST['iddi'])){
        $outputu='';
        $queryu = mysqli_query($con,"SELECT * FROM upazilas WHERE district_id='".$_POST['iddi']."' ORDER BY name ");
        $outputu .='<option value="">Select Your Upazila</option>';
            while($rowdu=mysqli_fetch_array($queryu)){
                $outputu .='<option value="'.$rowdu["id"].'">'.$rowdu["bn_name"].'</option>';
            }
            echo $outputu;
    }
    if(isset($_POST['thana'])){
        $out='';
        $query = mysqli_query($con,"SELECT * FROM unions WHERE upazila_id='".$_POST['thana']."' ORDER BY id ");
        $out .='<option value="">Select Your Union</option>';
            while($row=mysqli_fetch_array($query)){
                $out .='<option value="'.$row["bn_name"].'">'.$row["bn_name"].'</option>';
            }
            echo $out;
    }
        

?>
<?php



?>