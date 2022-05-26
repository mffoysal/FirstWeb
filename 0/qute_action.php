<?php
    // alert('success');
    // echo '<h1>success</h1>';
session_start();
include('db.php');

extract($_POST);

$user = $_SESSION['visitor_id'];

if(isset($_POST['postaa'])){


                                    $pid=$_POST['post_iid'];
                                    $select = "SELECT * FROM comment_box WHERE post_id='$pid' AND parent_id='0' AND mode='q' ORDER BY id DESC";
                                    $myselect = mysqli_query($con,$select);
                                    $mynum=mysqli_num_rows($myselect);
                                    if($mynum>0){
                                      while($roww=mysqli_fetch_assoc($myselect)){
                                        ?>
                                        <hr>
                                          <div class="comment_view rounded">
                                            <div style="border-top:1px solid" class="container pt-1 border-info">
                                                <?php
                                                $usid=$roww['user'];

                                                    $u="SELECT * FROM users WHERE unique_id='$usid'";
                                                    $usqli=mysqli_query($con,$u);
                                                    $uroww=mysqli_fetch_assoc($usqli);
                                                ?>
                                                    <div class="">
                                                    <img src="image/<?=$uroww['img']?>" alt="" width="45px" height="45px" class="img-fluid rounded-start float-start">

                                                    
                                                    </div>
                                                    <div class="container-flulid">

                                                        <blockquote class="blockquote mb-0">
                                                        <p style="font-size:14px; text-transform:uppercase; font-weight:bolder;margin-left:5px"><?=$uroww['name']?></p>
                                                        <footer style="font-size:14px" class="blockquote-footer"><code><?=$roww['comment']?>.</code> <cite title="<?=$uroww['name'].', '.$roww['date'].', '.$uroww['phone'].', '.$uroww['unions'].', '.$uroww['upazila'].', '.$uroww['district'].', '.$uroww['division'].', '.$uroww['email']?>"><?=$roww['time']?></cite></footer>
                                                        </blockquote>


                                                    <div class="lovecom">
                                                      <span style="font-size:13px; color:#e40046" class="float-end" id="love_loop_com_<?=$roww['id']?>"><?=$roww['love_count']?></span>
                                                      <button style="background-color:#e40046; color:#e40046; height:20px; width:45px; font-size:15px; border:1px solid #e40046; border-radius:6px" class="float-end bg-dark" onclick="love_update_com('<?=$roww['id']?>')"><i class="bi bi-heart-fill"></i></button>

                                                      <span style="font-size:13px" class="float-end text-primary" id="dislike_loop_com_<?=$roww['id']?>"><?=$roww['dislike_count']?></span>
                                                      <button style="height:20px; width:45px; font-size:15px; border:1px solid; border-radius:6px" class="float-end text-primary border-primary bg-dark" onclick="dislike_update_com('<?=$roww['id']?>')"><i class="bi bi-hand-thumbs-down-fill"></i></button>

                                                      <span style="font-size:13px;" class="float-end text-light" id="like_loop_com_<?=$roww['id']?>"><?=$roww['like_count']?></span>
                                                    <button style="height:20px; width:45px; font-size:15px; border:1px solid; border-radius:6px" class="float-end text-light border-light bg-dark" onclick="like_update_com('<?=$roww['id']?>')"><i class="bi bi-hand-thumbs-up-fill"></i></button>

                                                    </div>

                                                    
                                                    <a style="text-decoration:none" href="p.php?p_id=<?=$roww['post_id']?>&com_id=<?=$roww['id']?>&to=<?=$uroww['name']?>"><button type="button" style="height:20px; width:45px; font-size:15px; border:1px solid ghostwhite; border-radius:6px" class=" bg-info float-end"><i class="bi bi-reply-fill"></i></button></a>
                                                    

                                                   
                                                    </div>

                                            </div>
                                          
                                          </div>
                                          <!-- <hr> -->
                                           
                                          <?php
                                              $comid=$roww['id'];
                                              $reply="SELECT * FROM comment_box WHERE parent_id='$comid' AND post_id='$pid'  AND mode='q'";
                                              $replysqli=mysqli_query($con,$reply);
                                              $rownumr=mysqli_num_rows($replysqli);
                                              
                                              if($rownumr>0){
                                                while($rep=mysqli_fetch_assoc($replysqli)){
                                                  ?>

                                                  <hr>
                                            <div style="margin-left:30px; border-left:1px solid" class="container border-secondary">
                                                <?php
                                                $usi=$rep['user'];

                                                    $ur="SELECT * FROM users WHERE unique_id='$usi'";
                                                    $usqlir=mysqli_query($con,$ur);
                                                    $urowr=mysqli_fetch_assoc($usqlir);
                                                ?>
                                                    <div class="">
                                                    <img src="image/<?=$urowr['img']?>" alt="" width="45px" height="45px" class="img-fluid rounded-start float-start">

                                                    
                                                    </div>
                                                    <div class="container-flulid">

                                                        <blockquote class="blockquote mb-0">
                                                        <p style="font-size:14px;text-transform:uppercase; font-weight:bolder; margin-left:5px"><?=$urowr['name']?></p>
                                                        <footer style="font-size:14px" class="blockquote-footer"><code><?=$rep['comment']?>.</code> <cite title="<?=$urowr['name'].', '.$rep['date'].', '.$urowr['phone'].', '.$urowr['unions'].', '.$urowr['upazila'].', '.$urowr['district'].', '.$urowr['division'].', '.$urowr['email']?>"><?=$rep['time']?></cite></footer>
                                                        </blockquote>


                                                    <div class="replyCom">

                                                    <span style="font-size:13px; color:#e40046" class="float-end" id="love_loop_com_<?=$rep['id']?>"><?=$rep['love_count']?></span>
                                                    <button style="background-color:#e40046; height:20px; width:45px; font-size:15px; border:1px solid #e40046; color:#e40046; border-radius:6px" class="float-end bg-dark" onclick="love_update_com('<?=$rep['id']?>')"><i class="bi bi-heart-fill"></i></button>

                                                    <span style="font-size:13px" class="float-end text-primary" id="dislike_loop_com_<?=$rep['id']?>"><?=$rep['dislike_count']?></span>
                                                    <button style="height:20px; width:45px; font-size:15px; border:1px solid; border-radius:6px" class="float-end text-primary border-primary bg-dark" onclick="dislike_update_com('<?=$rep['id']?>')"><i class="bi bi-hand-thumbs-down-fill"></i></button>

                                                      <span style="font-size:13px;" class="float-end text-light" id="like_loop_com_<?=$rep['id']?>"><?=$rep['like_count']?></span>
                                                    <button style="height:20px; width:45px; font-size:15px; border:1px solid ghostwhite; border-radius:6px" class="float-end border-light text-light bg-dark" onclick="like_update_com('<?=$rep['id']?>')"><i class="bi bi-hand-thumbs-up-fill"></i></button>


                                                    </div>

                                                    
                                                    <a style="text-decoration:none" href="p.php?p_id=<?=$rep['post_id']?>&com_id=<?=$roww['id']?>&to=<?=$urowr['name']?>"><button type="button" style="height:20px; width:45px; font-size:15px; border:1px solid ghostwhite; border-radius:6px" class=" bg-secondary float-end"><i class="bi bi-reply-fill"></i></button></a>
                                                    
                                                                


                                                    </div>

                                            </div>

                                                  <?php
                                                }
                                              }
                                          ?>




                                
                                        <?php
                                      }
                                    }
    

}

if(isset($_POST['posta'])){
    $postid = $_POST['post_id'];
    $cmntmsg = $_POST['comment_msg'];
    $uid = $_POST['uuid'];
    $parent=0;
    $mode='q';
    // echo $cmntmsg.' '.$postid.' '.$uid.' '.$user.' '.$cmntmsg;

    $con->query("INSERT INTO comment_box(post_id, parent_id, comment, user, post_user, mode) VALUES('$postid','$parent','$cmntmsg','$user','$uid', '$mode')");
    $sql="UPDATE qute SET com_count=com_count+1 WHERE id=$postid ";
    $rowt=mysqli_query($con,$sql);
    
    if($con){
        echo "Successfully added";
    }else{
        echo "Something went wrong";
    }
}

if(isset($_POST['comment_load_data'])){
  $postid = $_POST['postid'];


  $comments_query = "SELECT * FROM comment_box WHERE parent_id='0' AND post_id='$postid' AND mode='q' order by id DESC";
  $comments_query_run = mysqli_query($con, $comments_query);
  $numrow = mysqli_num_rows($comments_query_run);

  $array_result = [];

  if($numrow > 0){

    $comments_query_run_select = mysqli_fetch_assoc($comments_query_run);

    foreach($comments_query_run as $row){
      $user_id = $row['user'];
      $users_query = "SELECT * FROM users WHERE unique_id='$user_id'";
      $users_query_run = mysqli_query($con, $users_query);
      $user_result = mysqli_fetch_array($users_query_run);

      array_push($array_result, ['cmt' =>$row, 'user'=>$user_result]);

    }

    header('Content-type: application/json');
    echo json_encode($array_result);

  }
  else{
    echo "Give a comment";
  }

}



if(isset($_POST['view_comment_data'])){

  $commentid=mysqli_real_escape_string($con, $_POST['commt_id']);

  $query = "SELECT * FROM comment_box WHERE parent_id='$commentid' AND mode='q' order by id DESC";
  $comments_query_run = mysqli_query($con, $query);
  $numrow = mysqli_num_rows($comments_query_run);

  $result_array = [];

  if($numrow > 0){

    $comments_query_run_select = mysqli_fetch_assoc($comments_query_run);

    foreach($comments_query_run as $row){
      $user_id = $row['user'];
      $users_query = "SELECT * FROM users WHERE unique_id='$user_id'";
      $users_query_run = mysqli_query($con, $users_query);
      $user_result = mysqli_fetch_array($users_query_run);

      array_push($result_array, ['cmtt' =>$row, 'userr'=>$user_result]);

    }

    header('Content-type: application/json');
    echo json_encode($result_array);

  }
  else{
    echo "Give a comment";
  }


}







if(isset($_POST['reply_add'])){

  $parent = $_POST['comm_id'];
  $cmntmsg = $_POST['reply_mssg'];

  $pselect = "SELECT * FROM comment_box WHERE id='$parent' AND mode='q'";
  $pselect_run = mysqli_query($con, $pselect);
  $pselect_row=mysqli_fetch_assoc($pselect_run);

  if(mysqli_num_rows($pselect_run) == 1){

    $uid = $pselect_row['post_user'];

  $postid = $pselect_row['post_id'];
  // echo $cmntmsg.' '.$postid.' '.$uid.' '.$user.' '.$cmntmsg;
  $mode='q';

  $con->query("INSERT INTO comment_box(post_id, parent_id, comment, user, post_user, mode) VALUES('$postid','$parent','$cmntmsg','$user','$uid','$mode')");
  $sql="UPDATE qute SET com_count=com_count+1 WHERE id=$postid ";
  $rowt=mysqli_query($con,$sql);

  $sql1="UPDATE comment_box SET view_reply=view_reply+1 WHERE id=$parent AND mode='q'";
  $rowt1=mysqli_query($con,$sql1);
  
  if($con){
      echo "Successfully added";
  }else{
      echo "Something went wrong";
  }



  }else{

    echo "sorry! Comment is deleted!";

  }
  
}






if(isset($_POST['sub_reply_add'])){

  $po = $_POST['commm_id'];
  $cmntmsg = $_POST['sub_reply_mssg'];

  $pselect = "SELECT * FROM comment_box WHERE id='$po' AND mode='q'";
  $pselect_run = mysqli_query($con, $pselect);
  $pselect_row=mysqli_fetch_assoc($pselect_run);

  if(mysqli_num_rows($pselect_run) == 1){

    $uid = $pselect_row['post_user'];
    $parent = $pselect_row['parent_id'];
    $c_user = $pselect_row['user'];

    $Upselect = "SELECT * FROM users WHERE unique_id='$c_user'";
    $Upselect_run = mysqli_query($con, $Upselect);
    $Upselect_row=mysqli_fetch_assoc($Upselect_run);
    $cc_user=$Upselect_row['name'];

    $mainComment = '@'.$cc_user.', '.$cmntmsg;

  $postid = $pselect_row['post_id'];
  // echo $cmntmsg.' '.$postid.' '.$uid.' '.$user.' '.$cmntmsg;
  $mode='q';

  $con->query("INSERT INTO comment_box(post_id, parent_id, comment, user, post_user, mode) VALUES('$postid','$parent','$mainComment','$user','$uid','$mode')");
  $sql="UPDATE qute SET com_count=com_count+1 WHERE id=$postid ";
  $rowt=mysqli_query($con,$sql);

  $sql1="UPDATE comment_box SET view_reply=view_reply+1 WHERE mode='p' AND id=$po ";
  $rowt1=mysqli_query($con,$sql1);
  
  
  if($con){
      echo "Successfully added";
  }else{
      echo "Something went wrong";
  }



  }else{

    echo "sorry! Comment is deleted!";

  }
  
}




?>



