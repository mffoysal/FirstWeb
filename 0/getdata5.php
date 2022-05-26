
              <?php
    include('db.php');


    $data="SELECT * FROM edu WHERE mode='e' AND unique_id='".$_POST["farhad5"]."' ORDER BY id DESC";
    $im="SELECT * FROM users WHERE unique_id='".$_POST["farhad5"]."'";
    

    $sqldata=mysqli_query($con,$data);
    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);
    $i=1;
  


    if(mysqli_num_rows($sqldata)>0){
        while  ($datarow=mysqli_fetch_assoc($sqldata)){
            ?>
       

<div class="container mb-2 mt-2">

<h4 style="border:2px solid #42f551" class="text-center"><?=$i++?>. <span style="text-transform:uppercase"><?=$datarow['inst']?></span></h4>
<div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">University<code style="margin-left:34px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9"><?=$datarow['institute']?></div></div>
<div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Subject<code style="margin-left:53px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9"><?=$datarow['subject']?></div></div>
<div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Board<code style="margin-left:62px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9"><?=$datarow['board']?></div></div>
<div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Passing Year<code style="margin-left:15px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9"><?=$datarow['year']?></div></div>
<div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-3">Result<code style="margin-left:61px; margin-right: ;">:</code></div><div style="font-weight:bolder"  class="col-md-9"><?=$datarow['result']?></div></div></br>



</div>





<?php
        }
    }


?>
