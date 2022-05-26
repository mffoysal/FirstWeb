<?php
session_start();

$postiid=$_SESSION['p_id'];

        require_once 'db.php';

        $select = "SELECT * FROM post WHERE id=$postiid";
        $query = mysqli_query($con, $select);
        if(mysqli_num_rows($query) == 1){
            $datarow=mysqli_fetch_assoc($query);

            $im="SELECT * FROM users WHERE unique_id='".$datarow["unique_id"]."'";
    
            $imgs=mysqli_query($con,$im);
            $img=mysqli_fetch_assoc($imgs);
          
        

            ?>



                <section class="container4 mt-2 mb-3 position-relative">
                      <div class="card">
                        <div class="card-image">
                          <?php
                            if($datarow['img']!=""){
                              $imgd=$datarow['img'];
                              echo '<img src="image/'.$imgd.'" class="cardimg" width="100%" height="100%" alt="">';
                            }else{
                              $imgd=$img['img'];
                            }
                              
                          ?>
                            
                        </div>
                        <div class="card-text">
                        <h6 class="text-dark"><?=$datarow['header']; ?></h6>
                          <span class="date"><?=$datarow['time']; ?></span>

                          <div style="border-radius:5px; color:white" class="text-light p-1 bg-dark shadow-lg text-justify text-start border-top"><span style="" class=""><?=$datarow['text']; ?></span></div>
                        </div>
                        <div class="card-stats">

                          <a style="text-decoration:none" href="javascript:void(0)">
                          
                          <div class="stat" onclick="love_updatee('<?=$datarow['id']?>')"> 
                            <div style="font-size:12px" class="value" id="love_loope_<?=$datarow['id']?>"> <?=$datarow['love_count']?></div>
                            <span style="font-size:19px; color:red;" class="bi bi-heart-fill"></span>

                            <div class="type"><sup style="font-size:18px"></sup><span style="font-size:18px" class="bi bi-hand-thumbs-upp"></span>   <span style="font-size:18px" class="bi bi-hand-thumbs-downn"></span><sub style="font-size:18px"></sub></div>
                          </div>

                          </a>
                          <div style="border-radius:10px; height: 50px;" class="stat load border-start border-end border-top"  data-bs-toggle="collapse" data-bs-target="#comment_section<?=$datarow['id']?>" aria-controls="comment_section<?=$datarow['id']?>" aria-expanded="false" aria-label="Toggle navigation"> 
                            <div style="font-size:13px" class="value" data-bs-toggle="modal" data-bs-target="#commentcollaps" aria-controls="commentcollaps" aria-expanded="false" aria-label="Toggle navigation"><?=$datarow['com_count']?><i style="font-size:20px" class="bi bi-chat-left-text text-info"></i></div>
                          </div>

                          <div class="stat" data-bs-toggle="modal" data-bs-target="#sett<?=$datarow['id']?>">

                            <div class="type"><div class="spinner-grow text-secondary" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>
                          </div>
                        </div>
                      </div> 
 
<!-- comment -->
<div id="" class="text-center sticky"> 
<button id="msg" class="msg" type="button" data-bs-toggle="modal" data-bs-target="#contactmsg">
    <span class="bi bi-chat-left-text position-relative"></span>
    <span id="notifications_counter" style="width:20px; height:30px; padding-left:1px; padding-top:2px; text-align: center" class="position-absolute top-0 text-center start-100 translate-middle badge rounded-circle"><?=$datarow['com_count']?></span>
<span class="visually-hidden">U</span></span>
</button>
</div>

<!-- comment -->                      
                              
                                  <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="image/<?=$img['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                                  
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

