
              <?php
    include('db.php');


    $data="SELECT * FROM post WHERE unique_id='".$_POST["farhad"]."' ORDER BY id DESC";
    $im="SELECT * FROM users WHERE unique_id='".$_POST["farhad"]."'";
    

    $sqldata=mysqli_query($con,$data);
    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);
  


    if(mysqli_num_rows($sqldata)>0){
        while  ($datarow=mysqli_fetch_assoc($sqldata)){
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
                        <h2 class="text-dark"><?=$datarow['header']; ?></h2>
                          <span class="date"><?=$datarow['time']; ?></span>

                          <div style="border-radius:6px; border:2px" class="text-light p-1 bg-dark shadow-lg  text-start border-secondary border-top"><?=$datarow['text']; ?></div>
                        </div>
<!-- 
                        <div class="card-stats">

                          <a style="text-decoration:none" href="javascript:void(0)">
                          
                          <div class="stat" onclick="love_update('<?=$datarow['id']?>')"> 
                            <div class="value" id="love_loop_<?=$datarow['id']?>"> <?=$datarow['love_count']?>  </div>
                            <div class="type"><sup style="font-size:18px"><?=$datarow['like_count']?></sup><span style="font-size:18px" class="bi bi-hand-thumbs-up"></span>  <span style="font-size:20px" class="bi bi-heart-fill"></span> <span style="font-size:18px" class="bi bi-hand-thumbs-down"></span><sub style="font-size:18px"><?=$datarow['dislike_count']?></sub></div>
                          </div>

                          </a>
                          <div class="stat load border"  data-bs-toggle="collapse" data-bs-target="#comment_section<?=$datarow['id']?>" aria-controls="comment_section<?=$datarow['id']?>" aria-expanded="false" aria-label="Toggle navigation"> 
                            <div class="value"><?=$datarow['com_count']?><div class="spinner-grow text-warning" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>
                            <div class="type"><i class="bi bi-chat-left-text"></i></div>
                          </div>
                          <div class="stat" data-bs-toggle="modal" data-bs-target="#sett<?=$datarow['id']?>">
                            <div class="value">#</div>
                            <div class="type"><div class="spinner-border text-info" role="status">
  <span class="visually-hidden">Loading...</span>
</div></div>
                          </div>
                        </div>
                      </div> 
                      
                           <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="image/<?=$img['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                      </span>
          
                </section>

                 -->

                  <div class="card-stats">

                  <a style="text-decoration:none" href="javascript:void(0)">

                  <div class="stat" onclick="love_updatee('<?=$datarow['id']?>')"> 
                    <div style="font-size:12px" class="value" id="love_loope_<?=$datarow['id']?>"> <?=$datarow['love_count']?></div>
                    <span style="font-size:20px; color:red;" class="bi bi-heart-fill"></span>

                    <div class="type"><sup style="font-size:18px"></sup><span style="font-size:18px" class="bi bi-hand-thumbs-upp"></span>   <span style="font-size:18px" class="bi bi-hand-thumbs-downn"></span><sub style="font-size:18px"></sub></div>
                  </div>

                  </a>
                  <div style="border-radius:10px; height: 50px;" class="stat load border-start border-end border-top"  data-bs-toggle="collapse" data-bs-target="#comment_section<?=$datarow['id']?>" aria-controls="comment_section<?=$datarow['id']?>" aria-expanded="false" aria-label="Toggle navigation"> 
                    <div style="font-size:13px" class="value"><?=$datarow['com_count']?><i style="font-size:20px" class="bi bi-chat-left-text text-info"></i></div>
                  </div>

                  <div class="stat" data-bs-toggle="modal" data-bs-target="#sett<?=$datarow['id']?>">

                    <div class="type"><div class="spinner-grow text-dark" role="status">
                  <span class="visually-hidden">Loading...</span>
                  </div></div>
                  </div>
                  </div>
                  </div> 

                  <img style="top: -10px; right: -10px; border:3px solid #fff; border-radius: 50%;" src="image/<?=$img['img']?>"  width="100px" height="100px" class="position-absolute" id="profile-post-img" alt="">
                  
                  <div style="bottom: 20px; left: -10px; border-radius:5px;" class="fotter-section position-absolute">
                  <nav>
                      
                          <div class=""><span class="a"><i style="color:" class="bi bi-share text-warning"></i><span style="color:" class="text-primary shadow-lg">ShareIt<span style="font-size:20px; color:red;" class="bi bi-share"></span> </span></span></div>

                          <div class=""><span class="a"><i style="color:" class="bi bi-chat-left text-info"></i><span style="color:" class="text-info shadow-lg"><?=$datarow['com_count']?> <span style="font-size:20px; color:teal;" class="bi bi-chat-left-text"></span> </span></span></div>

                          <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-down text-danger" onclick="dislike_updatee('<?=$datarow['id']?>')" id="dislike_loope_<?=$datarow['id']?>"></i><span style="color:"style="color:" class="text-danger shadow-lg"><?=$datarow['dislike_count']?> <span style="font-size:20px; color:black;" class="bi bi-hand-thumbs-down"></span> </span></span></div>

                          <div class=""><span class="a"><i style="color:" class="bi bi-hand-thumbs-up text-warning" onclick="like_updatee('<?=$datarow['id']?>')" id="like_loope_<?=$datarow['id']?>"></i><span style="color:" class="text-warning shadow-lg"><?=$datarow['like_count']?> <span style="font-size:20px; color:yellow;" class="bi bi-hand-thumbs-up"></span> </span></span></div>

                          <div class=""  ><span class="a"><i style="color:red" class="bi bi-heart text" onclick="love_update('<?=$datarow['id']?>')" id="love_loop_<?=$datarow['id']?>"></i><span style="color:red;" class="text shadow-lg" ><?=$datarow['love_count']?> <span style="font-size:20px; color:red;" class="bi bi-heart-fill"></span> </span></span></div>
                      
                    </nav>
                  </div>

                  </span>

                  </section>








              <div class="collapse container bg-dark mt-5 bg-light shadow-lg text-light p-2 rounded" id="comment_section<?=$datarow['id']?>">
                      <div class="comment_view_main rounded" id="<?=$datarow['id']?>">
                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#comments<?=$datarow['id']?>"><i class="bi bi-chat-square-text-fill"></i></button>

                            <div class="load_comment" id="<?=$datarow['id']?>">


                              <div class="container" id="loadComment<?=$datarow['id']?>">

                              </div>


                            </div>
                            
                           <hr>
                            <div class="contaienr comment_view text-dark" id="<?=$datarow['id']?>">
                                  <!-- <?php
                                    $pid=$datarow['id'];
                                    $select = "SELECT * FROM comment_box WHERE post_id='$pid' ORDER BY id DESC";
                                    $myselect = mysqli_query($con,$select);
                                    $mynum=mysqli_num_rows($myselect);
                                    if($mynum>0){
                                      while($roww=mysqli_fetch_assoc($myselect)){
                                        ?>



                                        <?php
                                      }
                                    }

                                  ?> -->
                            </div>
                            <hr> 





                            <div class="modal fade" id="comments<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 style="text-align:center" class="modal-title text-warning" id="exampleModalLabel">Type Your Comment</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="container comment_box shadow-lg p-2">
                                          <div id="error_status" class="error_status text-danger"></div>
                                          <div class="main_comment shadow-lg form-floating">

                                              <textarea name="" id="cmnt_text<?=$datarow['id']?>" cols="" rows="3" class="comment_textbox form-control"></textarea>
                                              <button value="" onclick="addcomment(<?=$datarow['id']?>)" id="<?=$datarow['id']?>" class="btn btn-warning w-100 text-center right add_comment_btn">PosT</button>




                                          </div>

                                          <hr>

                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                      <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                  </div>
                                </div>
                            </div>

                    </div>
                </div>


              
                
                <div class="modal fade" id="sett<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-info text-Uppercase" id="exampleModalLabel">Post Setting</h5>
                        <h5 style="border-radius:5px; margin-left:5px;" class="modal-title text-warning text-Uppercase" id="error_status_update<?=$datarow['id']?>"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container sett_box shadow-lg text-center p-2">
                      <a href="javascript:void(0)"><button onclick="like_update('<?=$datarow['id']?>')" class="btn btn-outline-success mt-1"><span class="bi bi-hand-thumbs-up-fill"> (<span id="like_loop_<?=$datarow['id']?>"><?=$datarow['like_count']?></span>)</span ></button></a>
                      <a href="javascript:void(0)"><button onclick="dislike_update('<?=$datarow['id']?>')" class="btn btn-outline-warning mt-1"><span class="bi bi-hand-thumbs-down-fill"> (<span id="dislike_loop_<?=$datarow['id']?>"><?=$datarow['dislike_count']?></span>)</span></button></a>
                        
                          <div class="container mt-2">
                            <button class="btn btn-danger badge delete_postBtn" id="<?=$datarow['id']?>">Delete</button>
                          </div>

                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " id="closepost<?=$datarow['id']?>" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>



<?php
        }
    }


?>




<!-- <div class="modal fade" id="comments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
