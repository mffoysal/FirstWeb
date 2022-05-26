
              <?php
    include('db.php');


    $data="SELECT * FROM experience WHERE mode='e' AND unique_id='".$_POST["farhad4"]."' ORDER BY id DESC";
    $im="SELECT * FROM users WHERE unique_id='".$_POST["farhad4"]."'";
    

    $sqldata=mysqli_query($con,$data);
    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);
    $i=1;
  


    if(mysqli_num_rows($sqldata)>0){
        while  ($datarow=mysqli_fetch_assoc($sqldata)){
            ?>
       
            <div class="container mb-2 mt-2">

                <h4 style="border-bottom:2px solid #42f551" class=""><?=$i++?>. <span style="text-transform:uppercase"><?=$datarow['company']?></span></h4>
                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Position<code style="margin-left:31px; margin-right: ;">:</code></div><div class="col-md-10"><?=$datarow['position']?></div></div>
                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Location<code style="margin-left:27px; margin-right: ;">:</code></div><div class="col-md-10"><?=$datarow['location']?></div></div>
                <div style="margin-left:5px" class="row"><div style="font-weight:bolder" class="col-md-2">Duration<code style="margin-left:25px; margin-right: ;">:</code></div><div class="col-md-10"><?=$datarow['duration']?></div></div></br>
                <h5 style="margin-left:15px" class="">Achievement:</h5>
                <div style="border:2px solid #42f551; margin-left:15px; font-weight:bolder;text-align:justify" class="p-2">
                <?=$datarow['achievement']?>
                </div>


            </div>



<?php
        }
    }


?>
