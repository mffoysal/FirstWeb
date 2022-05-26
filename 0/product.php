<?php 
include('db.php');
    // $search="BREAKFAT";
    if(isset($_REQUEST['search'])){
        $search = $_REQUEST['search'];
        // $search = preg_replace("#[^0-9a-z]#i","",$search);
       
    }
?>

<?php
$catt="BREAKFAST";
        
if(isset($_SESSION['cate'])){
    $catt = $_SESSION['cate'];
}
?>

<?php
$per_page=8;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
    $start=$_GET['start'];
    if($start<=0){
        $start=0;
        $current_page=1;
    }else{
        $current_page=$start;
        $start--;
        $start=$start*$per_page;
    }
}
$qq = "SELECT * FROM shopping WHERE categoryname='$catt' AND category='1' ";
$record=mysqli_num_rows(mysqli_query($con,$qq));

$pagi=ceil($record/$per_page);

function phone(){
    
        $per_page=8;
        $start=0;
        if(isset($_GET['start'])){
            $start=$_GET['start'];
    if($start<=0){
        $start=0;
        $current_page=1;
    }else{
        $current_page=$start;
        $start--;
        $start=$start*$per_page;
    }
        }
$catt="BREAKFAST";

        
if(isset($_SESSION['cate'])){
    $catt = $_SESSION['cate'];
}

include('db.php');
    
        $qq = "SELECT * FROM shopping WHERE categoryname='$catt' AND category='1' ";

        $record=mysqli_num_rows(mysqli_query($con,$qq));
        $pagi=ceil($record/$per_page);

        if(isset($_POST['search'])){
            $searchkey = $_POST['search'];
        }
        if(!empty($searchkey)){    
            $query = "SELECT * FROM shopping WHERE title LIKE '%$searchkey%' OR categoryname LIKE '%$searchkey%' OR price LIKE '%$searchkey%' OR header LIKE '%$searchkey%' AND category='1' limit $start, $per_page";

        }
        else{
            // if(){

            // }else{
                
            // }
            $query = "SELECT * FROM shopping WHERE categoryname='$catt' AND category='1' limit $start, $per_page";
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

if(isset($_POST['add'])){

    // print_r($_POST['pro_id']);

    $_SESSION['Cart'][] = array(
        'qnt' => $_POST['quantity'],
        'id' => $_POST['pro_id'],
        'name' => $_POST['pro_title'],
        'price' => $_POST['pro_price'],
        
        
    );
}

?>

