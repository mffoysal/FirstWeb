
<?php
    include('db.php');


    $data="SELECT * FROM qute WHERE  status='q1' AND unique_id='".$_POST["farhad2"]."' ORDER BY id DESC";
    $im="SELECT * FROM users WHERE unique_id='".$_POST["farhad2"]."'";
    

    $sqldata=mysqli_query($con,$data);

    $imgs=mysqli_query($con,$im);
    $img=mysqli_fetch_assoc($imgs);
  


    if(mysqli_num_rows($sqldata)>0){
        while  ($datarow=mysqli_fetch_assoc($sqldata)){
            ?>
       
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

                                
                <div class="modal fade" id="quteset<?=$datarow['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-info text-Uppercase" id="exampleModalLabel">Qute Setting</h5>
                        <h5 style="border-radius:5px; margin-left:5px;" class="modal-title text-warning text-Uppercase" id="error_status_updateq<?=$datarow['id']?>"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="container sett_box shadow-lg text-center p-2">
                      <a href="javascript:void(0)"><button onclick="like_updateq('<?=$datarow['id']?>')" class="btn btn-outline-success mt-1"><span class="bi bi-hand-thumbs-up-fill"> (<span id="like_loopq_<?=$datarow['id']?>"><?=$datarow['like_count']?></span>)</span ></button></a>
                      <a href="javascript:void(0)"><button onclick="dislike_updateq('<?=$datarow['id']?>')" class="btn btn-outline-warning mt-1"><span class="bi bi-hand-thumbs-down-fill"> (<span id="dislike_loopq_<?=$datarow['id']?>"><?=$datarow['dislike_count']?></span>)</span></button></a>
                        
                          <div class="container mt-2">
                            <button class="btn btn-danger badge delete_quteBtn" id="<?=$datarow['id']?>">Delete</button>
                          </div>

                      </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary " id="closequte<?=$datarow['id']?>" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                            
<?php
        }
    }


?>
