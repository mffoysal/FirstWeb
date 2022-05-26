
<?php
    include('db.php');


    $data="SELECT * FROM videos_demo WHERE album='SH' AND secure='S' AND unique_id='".$_POST["farhad3"]."' ORDER BY id DESC";
    $im="SELECT * FROM users WHERE unique_id='".$_POST["farhad3"]."'";
    

    $sqldata=mysqli_query($con,$data);

    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);
  


    if(mysqli_num_rows($sqldata)>0){
        while  ($datarow=mysqli_fetch_assoc($sqldata)){
            ?>
       
                        <?php
                            // if($datarow['img']!=''){
                            //     $data1=$datarow['img'];

                            // }else{
                            //     $data1=$img['img'];
                            // }
                            // if($datarow['name']!=''){
                            //     $data2=$datarow['name'];

                            // }else{
                            //     $data2=$img['name'];

                            // }
                            // if($datarow['address']!=''){
                            //     $data3=$datarow['address'];

                            // }else{
                            //     $data3=$img['district'].', '.$img['upazila'];

                            // }
                        ?>
                   
                            <div class="vid2 <?=$datarow['img']?>">
                                    <iframe width="100%" class="vide"  height="100%" id="video_id" src="https://www.youtube.com/embed/<<?=$datarow['link']?>?rel=0"
                                    frameborder="0" muted allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                                    <h3 class="title"><?=$datarow['v_name']?></h3>    
                            </div>



                            
<?php
        }
    }


?>
