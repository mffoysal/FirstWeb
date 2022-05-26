$(document).ready(function(){
    load_comment();
    function load_comment(){

        var postid = $('#postid').val();

        $.ajax({
            url:'./getdata6.php',
            type:'post',
            data:{
                postid: postid,
                comment_load_data:true
            },
            success: function(response){
                $('.comment-content').html('');
                // load_comment();
                // console.log(response);
                
                $.each(response, function (key, value){
                $('.comment-content').
                append('<div style="border: 1px dotted; border-radius:6px" class="reply_box border-dotted p-2 mb-2">\
                <div style="display:inline" class=""><img style="border-radius:50%; height:50px; width:50px;" src="image/'+value.user['img']+'" class="border-rounded" alt="hii"></div>\
                <div style="display:inline" class=""><h6 style="display:inline" class="border-bottom text-uppercase d-inline username"> '+value.user['name']+' : </h6><code style="display:inline" class="">'+value.cmt['time']+'</code></div>\
                <p style="margin-left:10%; border-radius:8px;" class="para shadow-lg bg-secondary p-1">'+value.cmt['comment']+'</p><div class="">\
                <button value="'+value.cmt['id']+'" style="background:black" class="badge btn btn-warning replymainbtn reply_btnn">Reply</button>\
                <button value="'+value.cmt['id']+'" style="background:black" class="badge btn btn-danger view_reply_btn">View <i style="color:" class="bi bi-chat-text text-warning"></i> '+value.cmt['view_reply']+'</button><i style="color:red;font-size:19px;margin-left:;" class="bi bi-heart-fill  ms-2" onclick="love_update_com('+value.cmt['id']+')"></i><span style="color:;font-size:12px" class="text-danger" id="love_loop_com_'+value.cmt['id']+'">'+value.cmt['love_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-down text-warning ms-2" onclick="dislike_update_com('+value.cmt['id']+')"></i><span style="color:yellow;font-size:12px" class="" id="dislike_loop_com_'+value.cmt['id']+'">'+value.cmt['dislike_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-up text-info ms-2" onclick="like_update_com('+value.cmt['id']+')"></i><span style="color:cyan;font-size:12px" class="" id="like_loop_com_'+value.cmt['id']+'">'+value.cmt['like_count']+'  </span>\
                <div id="'+value.cmt['id']+'" class="type float-end view_reply_btn2"><div style="background:black;font-size:10px" class="spinner-grow text-secondary" role="status">\
                <span class="visually-hidden">Loading...</span>\
                </div></div>\
                <div class="ml-4 reply_section">\
                </div>\
                </div>\
                ');
                                    
            });
            }
        })
    }


    $(document).on('click', '.reply_btnn', function(){
        var thisClicked = $(this);
        var cmt_id = thisClicked;

        $('.reply_section').html("");
        thisClicked.closest('.reply_box').find('.reply_section').
        html('<input type="text" id="replyMsge" class="reply-msgg form-control my-2" placeholder="Reply Here">\
        <div class="text-end">\
            <button class="badge btn btn-warning text-dark reply_add_btnnn ">Reply</button>\
            <button class="badge btn btn-danger cancel_btn">Cancel</button>\
        </div>');
    })

    $(document).on('click', '.cancel_btn', function(){
        $('.reply_section').html("");
    });

   


     
    $(document).on('click', '.reply_add_btnnn', function(e){
        e.preventDefault();
        var thisClicked = $(this);
        var cmmt_id = thisClicked.closest('.reply_box').find('.replymainbtn').val();
        var cmmt_msg = thisClicked.closest('.reply_box').find('#replyMsge').val();

        $.ajax({
            url: './getdata6.php',
            type:'post',
            data: {
                comm_id : cmmt_id,
                reply_mssg : cmmt_msg,
                reply_add : true
            },
            success: function(response){

                thisClicked.closest('.reply_box').find('#replyMsge').val("");
                $('.reply_section').html("");
                alert(response);

                load_comment();

                $('#load_videos').load('getdata7.php');
            }
        });
    });

    $(document).on('click', '.view_reply_btn', function(e){
        e.preventDefault();


        var thisClicked = $(this);
        var cmnt_id = thisClicked.val();

        $.ajax({
            url:'./getdata6.php',
            type:'post',
            data: {
                commt_id:cmnt_id,
                view_comment_data:true
            },
            success: function(response){

                $('.reply_section').html("");
                $.each(response, function (key, value){

                thisClicked.closest('.reply_box').find('.reply_section').
                append('<div style="margin-left:10px" class="sub_reply_box border-start p-2 mb-2">\
                <div style="display:inline" class=""><img style="border-radius:50%; height:50px; width:50px;" src="image/'+value.userr['img']+'" class="border-rounded" alt="hii"></div>\
                <div style="display:inline" class=""><h6 class="border-bottom text-uppercase d-inline username"> '+value.userr['name']+' : </h6><code>'+value.cmtt['time']+'</code></div>\
                <p style="margin-left:8%; border-radius:8px;" id="'+value.cmtt['parent_id']+'" class="para p-1 shadow-lg bg-info">'+value.cmtt['comment']+'</p>\
                <button value="'+value.cmtt['id']+'" class="badge btn btn-warning subreplymainbtn sub_reply_btnn">Reply</button><i style="color:red;font-size:19px;margin-left:;" class="bi bi-heart-fill text- ms-2" onclick="love_update_com('+value.cmtt['id']+')"></i><span style="color:;font-size:12px" class="text-danger" id="love_loop_com_'+value.cmtt['id']+'">'+value.cmtt['love_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-down text-warning ms-2" onclick="dislike_update_com('+value.cmtt['id']+')"></i><span style="color:yellow;font-size:12px" class="" id="dislike_loop_com_'+value.cmtt['id']+'">'+value.cmtt['dislike_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-up text-info ms-2" onclick="like_update_com('+value.cmtt['id']+')"></i><span style="color:cyan;font-size:12px" class="" id="like_loop_com_'+value.cmtt['id']+'">'+value.cmtt['like_count']+'  </span>\
                <div class="ml-4 sub_reply_section">\
                </div>\
                </div><hr>\
                ');

            });

            }      
        });


    });


    $(document).on('click', '.view_reply_btn2', function(e){
        e.preventDefault();


        var thisClicked = $(this);
        var cmnt_id = thisClicked.attr('id');

        $.ajax({
            url:'./getdata6.php',
            type:'post',
            data: {
                commt_id:cmnt_id,
                view_comment_data:true
            },
            success: function(response){

                $('.reply_section').html("");
                $.each(response, function (key, value){

                thisClicked.closest('.reply_box').find('.reply_section').
                append('<div style="margin-left:10px" class="sub_reply_box border-start p-2 mb-2">\
                <div style="display:inline" class=""><img style="border-radius:50%; height:50px; width:50px;" src="image/'+value.userr['img']+'" class="border-rounded" alt="hii"></div>\
                <div style="display:inline" class=""><h6 class="border-bottom text-uppercase d-inline username"> '+value.userr['name']+' : </h6><code>'+value.cmtt['time']+'</code></div>\
                <p style="margin-left:8%; border-radius:8px;" id="'+value.cmtt['parent_id']+'" class="para p-1 shadow-lg bg-info">'+value.cmtt['comment']+'</p>\
                <button value="'+value.cmtt['id']+'" class="badge btn btn-warning subreplymainbtn sub_reply_btnn">Reply</button><i style="color:red;font-size:19px;margin-left:;" class="bi bi-heart-fill text- ms-2" onclick="love_update_com('+value.cmtt['id']+')"></i><span style="color:;font-size:12px" class="text-danger" id="love_loop_com_'+value.cmtt['id']+'">'+value.cmtt['love_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-down text-warning ms-2" onclick="dislike_update_com('+value.cmtt['id']+')"></i><span style="color:yellow;font-size:12px" class="" id="dislike_loop_com_'+value.cmtt['id']+'">'+value.cmtt['dislike_count']+'  </span><i style="color:;font-size:19px" class="bi bi-hand-thumbs-up text-info ms-2" onclick="like_update_com('+value.cmtt['id']+')"></i><span style="color:cyan;font-size:12px" class="" id="like_loop_com_'+value.cmtt['id']+'">'+value.cmtt['like_count']+'  </span>\
                <div class="ml-4 sub_reply_section">\
                </div>\
                </div><hr>\
                ');

            });

            }      
        });


    });



    
   





    $(document).on('click', '.sub_reply_btnn', function(e){
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.val();
        $('.sub_reply_section').html("");
        thisClicked.closest('.sub_reply_box').find('.sub_reply_section').
        append('<input type="text" id="subreplyMsge" class="sub_reply-msgg form-control my-2" placeholder="Reply Here">\
        <div class="text-end">\
            <button class="badge btn btn-warning text-dark sub_reply_add_btnnn ">Reply</button>\
            <button class="badge btn btn-danger sub_cancel_btn">Cancel</button>\
        </div>');
    });

    $(document).on('click', '.sub_cancel_btn', function(){
        $('.sub_reply_section').html("");
    });

     
    $(document).on('click', '.sub_reply_add_btnnn', function(e){
        e.preventDefault();
        var thisClicked = $(this);
        var cmmmt_id = thisClicked.closest('.sub_reply_box').find('.subreplymainbtn').val();
        var cmmmt_msg = thisClicked.closest('.sub_reply_box').find('#subreplyMsge').val();

        $.ajax({
            url: './getdata6.php',
            type:'post',
            data: {
                commm_id : cmmmt_id,
                sub_reply_mssg : cmmmt_msg,
                sub_reply_add : true
            },
            success: function(response){
                load_comment();
                thisClicked.closest('.sub_reply_box').find('#subreplyMsge').val("");
                thisClicked.closest('.reply_box').find('.view_reply_btn').trigger("click");
                $('.sub_reply_section').html("");
                // $('.reply_section').html("");
                alert(response);
                $('#load_videos').load('getdata7.php');
            }
        });
    });




    $('#sendbtn3').click(function (e){
        e.preventDefault();

        var poid = $('#postid').val();
        var postuid = $('#postuId').val();
        // var comMsg = $('#comMsg').val();
        // var cid = $('#comid').val();
        // var toid = $('#toid').val();

        var comment_messege = $('.comment_box3').val();
        if($.trim(comment_messege).length == 0){
            error_msg = "Please, Type Your Comment below the textarea...!";
            $('#error_status2').text(error_msg);
        }else{
            error_msg = "";
            $('#error_status2').text(error_msg);
        }

        if(error_msg != ''){
            return false;
        }else{

            $.ajax({
                url:'getdata6.php',
                type:'post',
                data: {
                  comment_msg: comment_messege,
                  post_id: poid,
                  uuid: postuid,
                  posta: true,
                },
                success: function(response){
                  $('#error_status2').html(response);
                  load_comment();
                  alert(response); 
                $('.comment_box3').val("");
                $('#load_videos').load('getdata7.php');

  
                }
              });


        }
    });
});


  
function love_update(id){
      
    jQuery.ajax({
      url:'update_love_upost.php',
      type:'post',
      data:'type=love&id='+id,
      success:function(result){
        var cur_count=jQuery('#love_loop_'+id).html();
        cur_count++;
        jQuery('#love_loop_'+id).html(cur_count);
        $('#load_videos').load('getdata7.php');
      }
    })
  }

  function love_updatee(id){
    
    jQuery.ajax({
      url:'update_love_upost.php',
      type:'post',
      data:'type=love&id='+id,
      success:function(result){
        var cur_count=jQuery('#love_loope_'+id).html();
        cur_count++;
        jQuery('#love_loope_'+id).html(cur_count);

      }
    })
  }

  
  function like_updatee(id){
     
    jQuery.ajax({
      url:'update_love_upost.php',
      type:'post',
      data:'type=like&id='+id,
      success:function(result){
        var cur_count=jQuery('#like_loope_'+id).html();
        cur_count++;
        jQuery('#like_loope_'+id).html(cur_count);
        $('#load_videos').load('getdata7.php');
      }
    })
  }

     

  

  function dislike_updatee(id){
    
    jQuery.ajax({
      url:'update_love_upost.php',
      type:'post',
      data:'type=dislike&id='+id,
      success:function(result){
        var cur_count=jQuery('#dislike_loope_'+id).html();
        cur_count++;
        jQuery('#dislike_loope_'+id).html(cur_count);
        $('#load_videos').load('getdata7.php');
      }
    })
  }

