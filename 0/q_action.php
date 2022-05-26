<?php
session_start();

$postiid=$_SESSION['p_id'];

        require_once 'db.php';

        $select = "SELECT * FROM qute WHERE id=$postiid";
        $query = mysqli_query($con, $select);
        if(mysqli_num_rows($query) == 1){
            $datarow=mysqli_fetch_assoc($query);

            $im="SELECT * FROM users WHERE unique_id='".$datarow["unique_id"]."'";
    
            $imgs=mysqli_query($con,$im);
            $img=mysqli_fetch_assoc($imgs);
          
        

            ?>



                <section class="container mt-2 mb-3 position-relative">

       
                <section class="container3">
                  <div class="testimonial">
                    <div class="avatar">
                        <?php
                            if($datarow['img']!=''){
                                $data1=$datarow['img'];

                            }else{
                                $data1=$img['img'];
                            }
                            if($datarow['name']!=''){
                                $data2=$datarow['name'];

                            }else{
                                $data2=$img['name'];

                            }
                            if($datarow['address']!=''){
                                $data3=$datarow['address'];

                            }else{
                                $data3=$img['district'].', '.$img['upazila'];

                            }
                        ?>
                      <img src="image/<?=$data1?>" alt="" data-bs-toggle="modal" data-bs-target="#quteset<?=$datarow['id']?>">
                    </div>
                    <div class="body">
                    <code class="text-center"><?=$datarow['time']?></code>
                      <p><?=$datarow['text']?></p>
                    </div>
                    <div class="footer">
                      <h1><?=$data2?></h1>
                      <p><?=$data3?></p>
                    
                    </div>
                  </div>
                </section>

<!-- comment -->
<div id="" class="text-center sticky"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#commentcollaps" aria-controls="commentcollaps" aria-expanded="false" aria-label="Toggle navigation">
    <span class="bi bi-chat-left-text position-relative"></span>
    <span id="notifications_counter" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle"><?=$datarow['com_count']?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>

<!-- comment -->                
                              
                                  <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="image/<?=$img['img']?>"  width="80px" height="80px" class="position-absolute" id="profile-post-img" alt="">
                                  
                                  <div style="bottom: 20px; left: -15px; border-radius:5px;" class="fotter-section position-absolute">
                                  <nav>
                              
                                  <div class=""><span class="a"><i style="color:" class="bi bi-share text-warning" id=""></i><span style="color:" class="text-primary shadow-lg">ShareIt<span style="font-size:20px; color:red;" class="bi bi-share"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-chat-left text-info"></i><span style="color:" class="text-info shadow-lg"><?=$datarow['com_count']?> <span style="font-size:20px; color:teal;" class="bi bi-chat-left-text"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-down text-danger" onclick="dislike_updatee('<?=$datarow['id']?>')" id="dislike_loope_<?=$datarow['id']?>"></i><span style="color:"style="color:" class="text-danger shadow-lg"><?=$datarow['dislike_count']?> <span style="font-size:20px; color:black;" class="bi bi-hand-thumbs-down"></span> </span></span></div>

                                  <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-up text-warning" onclick="like_updatee('<?=$datarow['id']?>')" id="like_loope_<?=$datarow['id']?>"></i><span style="color:" class="text-warning shadow-lg"><?=$datarow['like_count']?> <span style="font-size:20px; color:yellow;" class="bi bi-hand-thumbs-up"></span> </span></span></div>

                                  <div class=""  ><span class="a"><i style="color:red" class="bi bi-heart text" onclick="love_update('<?=$datarow['id']?>')" id="love_loop_<?=$datarow['id']?>"></i><span style="color:red;" class="text shadow-lg" ><?=$datarow['love_count']?> <span style="font-size:20px; color:red;" class="bi bi-heart-fill"></span> </span></span></div>
                              
                            </nav>
                           </div>

                      </span>
          
                </section>





            <?php

        }
        else{
            

            echo "<tr><td colspan='4'><h1>Sorry Post Not Found</h1></td></tr>";


        }


?>

