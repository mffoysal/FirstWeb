<?php
include('db.php')

    // $con = new mysqli("localhost","root","","foysal") or die(mysqli_error());


?>
<!-- start coupon 1 -->
<?php
    $cquery1 = "SELECT * FROM coupon WHERE id='1' AND status='1' ";
    $cresult1 = mysqli_query($con,$cquery1);
    
    $ccount1 = mysqli_num_rows($cresult1);
    $crow1 =mysqli_fetch_assoc($cresult1);
   if($ccount1 == 1){
       $c1 = $crow1['coupon'];
       $v1 = $crow1['coupon_value'];
       $p1 = $crow1['min_price'];
   };
?>

 <input id="c1" type="hidden" value="<?php echo $c1; ?>" >
 <input id="v1" type="hidden" value="<?php echo $v1; ?>" >
 <input id="p1" type="hidden" value="<?php echo $p1; ?>" >


<!-- end coupon 1 -->
<!-- start coupon 2 -->
<?php
    $cquery2 = "SELECT * FROM coupon WHERE id='2' AND status='1' ";
    $cresult2 = mysqli_query($con,$cquery2);
    
    $ccount2 = mysqli_num_rows($cresult2);
    $crow2 =mysqli_fetch_assoc($cresult2);
   if($ccount2 == 1){
       $c2 = $crow2['coupon'];
       $v2 = $crow2['coupon_value'];
       $p2 = $crow2['min_price'];
   };
?>

 <input id="c2" type="hidden" value="<?php echo $c2; ?>" >
 <input id="v2" type="hidden" value="<?php echo $v2; ?>" >
 <input id="p2" type="hidden" value="<?php echo $p2; ?>" >


<!-- end coupon 2 -->
<!-- start coupon 2  -->
<?php
    $cquery3 = "SELECT * FROM coupon WHERE id='3' AND status='1' ";
    $cresult3 = mysqli_query($con,$cquery3);
    
    $ccount3 = mysqli_num_rows($cresult3);
    $crow3 =mysqli_fetch_assoc($cresult3);
   if($ccount3 == 1){
       $c3 = $crow3['coupon'];
       $v3 = $crow3['coupon_value'];
       $p3 = $crow3['min_price'];
   };
?>

 <input id="c3" type="hidden" value="<?php echo $c3; ?>" >
 <input id="v3" type="hidden" value="<?php echo $v3; ?>" >
 <input id="p3" type="hidden" value="<?php echo $p3; ?>" >


<!-- end coupon  -->
<!-- start coupon  -->
<?php
    $cquery4 = "SELECT * FROM coupon WHERE id='4' AND status='1' ";
    $cresult4 = mysqli_query($con,$cquery4);
    
    $ccount4 = mysqli_num_rows($cresult4);
    $crow4 =mysqli_fetch_assoc($cresult4);
   if($ccount4 == 1){
       $c4 = $crow4['coupon'];
       $v4 = $crow4['coupon_value'];
       $p4 = $crow4['min_price'];
   };
?>

 <input id="c4" type="hidden" value="<?php echo $c4; ?>" >
 <input id="v4" type="hidden" value="<?php echo $v4; ?>" >
 <input id="p4" type="hidden" value="<?php echo $p4; ?>" >


<!-- end coupon 4 -->
<!-- start coupon 5 -->
<?php
    $cquery5 = "SELECT * FROM coupon WHERE id='5' AND status='1' ";
    $cresult5 = mysqli_query($con,$cquery5);
    
    $ccount5 = mysqli_num_rows($cresult5);
    $crow5 =mysqli_fetch_assoc($cresult5);
   if($ccount5 == 1){
       $c5 = $crow5['coupon'];
       $v5 = $crow5['coupon_value'];
       $p5 = $crow5['min_price'];
   };
?>

 <input id="c5" type="hidden" value="<?php echo $c5; ?>" >
 <input id="v5" type="hidden" value="<?php echo $v5; ?>" >
 <input id="p5" type="hidden" value="<?php echo $p5; ?>" >


<!-- end coupon  -->
<!-- start coupon 6 -->
<?php
    $cquery6 = "SELECT * FROM coupon WHERE id='6' AND status='1' ";
    $cresult6 = mysqli_query($con,$cquery6);
    
    $ccount6 = mysqli_num_rows($cresult6);
    $crow6 =mysqli_fetch_assoc($cresult6);
   if($ccount6 == 1){
       $c6 = $crow6['coupon'];
       $v6 = $crow6['coupon_value'];
       $p6 = $crow6['min_price'];
   };
?>

 <input id="c6" type="hidden" value="<?php echo $c6; ?>" >
 <input id="v6" type="hidden" value="<?php echo $v6; ?>" >
 <input id="p6" type="hidden" value="<?php echo $p6; ?>" >


<!-- end coupon  -->
<!-- start coupon 7 -->
<?php
    $cquery7 = "SELECT * FROM coupon WHERE id='7' AND status='1' ";
    $cresult7 = mysqli_query($con,$cquery7);
    
    $ccount7 = mysqli_num_rows($cresult7);
    $crow7 =mysqli_fetch_assoc($cresult7);
   if($ccount7 == 1){
       $c7 = $crow7['coupon'];
       $v7 = $crow7['coupon_value'];
       $p7 = $crow7['min_price'];
   };
?>

 <input id="c7" type="hidden" value="<?php echo $c7; ?>" >
 <input id="v7" type="hidden" value="<?php echo $v7; ?>" >
 <input id="p7" type="hidden" value="<?php echo $p7; ?>" >


<!-- end coupon  -->
<!-- start coupon 8 -->
<?php
    $cquery8 = "SELECT * FROM coupon WHERE id='8' AND status='1' ";
    $cresult8 = mysqli_query($con,$cquery8);
    
    $ccount8 = mysqli_num_rows($cresult8);
    $crow8 =mysqli_fetch_assoc($cresult8);
   if($ccount8 == 1){
       $c8 = $crow8['coupon'];
       $v8 = $crow8['coupon_value'];
       $p8 = $crow8['min_price'];
   };
?>

 <input id="c8" type="hidden" value="<?php echo $c8; ?>" >
 <input id="v8" type="hidden" value="<?php echo $v8; ?>" >
 <input id="p8" type="hidden" value="<?php echo $p8; ?>" >


<!-- end coupon  -->
<!-- start coupon 9 -->
<?php
    $cquery9 = "SELECT * FROM coupon WHERE id='9' AND status='1' ";
    $cresult9 = mysqli_query($con,$cquery9);
    
    $ccount9 = mysqli_num_rows($cresult9);
    $crow9 =mysqli_fetch_assoc($cresult9);
   if($ccount9 == 1){
       $c9 = $crow9['coupon'];
       $v9 = $crow9['coupon_value'];
       $p9 = $crow9['min_price'];
   };
?>

 <input id="c9" type="hidden" value="<?php echo $c9; ?>" >
 <input id="v9" type="hidden" value="<?php echo $v9; ?>" >
 <input id="p9" type="hidden" value="<?php echo $p9; ?>" >


<!-- end coupon 9 -->
<!-- start coupon 10  -->
<!-- start coupon 10 -->
<?php
    $cquery10 = "SELECT * FROM coupon WHERE id='10' AND status='1' ";
    $cresult10 = mysqli_query($con,$cquery10);
    
    $ccount10 = mysqli_num_rows($cresult10);
    $crow10 =mysqli_fetch_assoc($cresult10);
   if($ccount10 == 1){
       $c10 = $crow10['coupon'];
       $v10 = $crow10['coupon_value'];
       $p10 = $crow10['min_price'];
   };
?>

 <input id="c10" type="hidden" value="<?php echo $c10; ?>" >
 <input id="v10" type="hidden" value="<?php echo $v10; ?>" >
 <input id="p10" type="hidden" value="<?php echo $p10; ?>" >


<!-- end coupon 10 -->
<!-- start coupon 50 -->
<?php
    $cquery50 = "SELECT * FROM coupon WHERE id='50' AND status='1' ";
    $cresult50 = mysqli_query($con,$cquery50);
    
    $ccount50 = mysqli_num_rows($cresult50);
    $crow50 =mysqli_fetch_assoc($cresult50);
   if($ccount50 == 1){
       $c50 = $crow50['coupon'];
       $v50 = $crow50['coupon_value'];
       $p50 = $crow50['min_price'];
   };
?>

 <input id="c50" type="hidden" value="<?php echo $c50; ?>" >
 <input id="v50" type="hidden" value="<?php echo $v50; ?>" >
 <input id="p50" type="hidden" value="<?php echo $p50; ?>" >


<!-- end coupon  -->


















<script src="script.js" ></script>