

<?php

if(isset($_REQUEST['search'])){
    $search = $_REQUEST['search'];
    // $search = preg_replace("#[^0-9a-z]#i","",$search);
}

function invoice(){
include('../db.php');


if(isset($_POST['search'])){
    $searchkey = $_POST['search'];
}

if(!empty($searchkey)){    
    $query = "SELECT * FROM invoice WHERE name LIKE '%$searchkey%' OR phone LIKE '%$searchkey%' OR payment_number LIKE '%$searchkey%' OR payment_trx LIKE '%$searchkey%'";

}else{
    // if(){

    // }else{
        
    // }
    $query = "SELECT * FROM invoice";
    $searchkey = "";
}

$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);




if($num == 0){
        
    echo '<script>location.replace("error.php")</script>';  
    
}
else{
    return $result;
}
}
?> 


<?php
function invoiceDetails($id,$name,$phone,$district,$address,$house,$cartitem,$item,$totalitem,$pricesum,$coupon,$subtotal,$method,$pnumber,$ptrx,$msg,$email,$datetime,$customer,$delivery){
$invoice= " <tr>  

            <td>$name</td>
            <td>$phone</td>
            <td>$id</td>
            <td style=\"display:;\">$address,P:C:$district,H:No:$house</td>
            <td style=\"display:;\">$totalitem</td>
            <td style=\"display:;\">$item</td>
            <td style=\"display:;\">$pricesum</td>
            <td style=\"display:;\">$subtotal</td>
            <td style=\"display:;\">$coupon</td>
            <td style=\"display:;\">$method</td>
            <td style=\"display:;\">$pnumber</td>
            <td style=\"display:;\">$ptrx</td>
            <td style=\"display:;\">$delivery</td>
            <td style=\"display:;\">$datetime</td>
            <td style=\"display:;\">$email</td>
            <td style=\"display:;\">$msg</td>
            <td style=\"display:;\">$customer</td>
        
            </tr>";

echo $invoice;
}
?>

