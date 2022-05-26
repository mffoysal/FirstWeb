<?php
        
    //     date_default_timezone_set("Asia/Dhaka");
        
    //     function getdateTimeDiff($date){
    //         $now_timestamp = strtotime(date('Y-m-d H:i:s'));
    //         $diff_timestamp = $now_timestamp - strtotime($date);

    //         if($diff_timestamp < 60){
    //             return ' few seconds ago';
    //         }else if($diff_timestamp >=60 && $diff_timestamp <3600){
    //             return round($diff_timestamp/60).' mins ago';
    //         }else if($diff_timestamp >=3600 && $diff_timestamp < 86400){
    //             return round($diff_timestamp/3600).' hours ago';
    //         }else if($diff_timestamp >=86400 && $diff_timestamp < (86400*30)){
    //             return round($diff_timestamp/(86400)).' days ago';
    //         }else if($diff_timestamp >=(86400*30) && $diff_timestamp < (86400*365)){
    //             return round($diff_timestamp/(86400*30)).' months ago';
    //         }
    //         else{
    //             return round($diff_timestamp/(86400*365)).' years ago';
    //         }
    //     }

    //     $time = date(y-m-d h:i:s);

    //     echo '<p>Current Time is: <strong>'.date('y-m-d H:i:s').'</strong></p>';
    //     echo '<p>'.date('y-m-d H:i:s').'</p>';
    //     echo '<p>'.getdateTimeDiff(date('Y-m-d H:i:s')).'</p>';
    //     echo "<p>".getdateTimeDiff("2021-07-29 17:21:00")."</p>";
    // ?>

<?php



function product($h_f_c,$header,$image,$stylebc,$body,$title,$details,$link,$d_value,$price,$time,$pro_id,$footer,$a_not_a,$active,$off,$img2,$img3,$img4){
    
    $pro = " <div class=\"col-md-3 mt-5 text-center bg-transparent shadow p-3 mb-5 bg-body rounded h-100\">
    <form method=\"POST\">
    <div class=\"card bg-transparent border-danger text-white h-100\">
    <div class=\"card-header bg-$h_f_c\">$header</div>
    <img style=\"height: 225px;\" src=\"image$image\" class=\'card-img text-dark\' alt=\"MFPIc\">
    <div style=\"background-color:$stylebc\" class=\"card-body bg-$body\" >
        <h4 class=\"card-title bg-danger rounded-pill\">$title</h4>
        <p style=\"color:#EF08AB\">
            $details <a href=\"details.php?link=$pro_id\"><h6 class=\"d-inline\">$link Read More</h6></a>
            <button type=\"button\" class=\"btn btn-info d-inline position-relative rounded-pill\" data-bs-toggle=\"modal\" onclick=\"details()\" id=\"detail\" value=\"details.php?link=$pro_id\" data-bs-target=\"\" style=\"color:#0bdcf4; background-color:#FCFC08\"><a style=\"text-decoration:none\" href=\"details.php?link=$pro_id\"><span class=\"bi bi-three-dots-vertical\"></span> DETAILS</a>
            <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger\">$d_value</span>
            <span class=\"visually-hidden\">Unread Message</span>
            </button>
        </p>
        <h5 class=\"rounded-pill position relative bg-light text-dark\">&#2547 $price TK</h5>
        <p style=\"font-size:12px\" class=\"text-muted\">ছাড়! $time থেকে আগামী $d_value দিন...</p>
        <button type=\"\"  class=\"btn btn-primary d-inline rounded-pill\" onclick=\"mfoysal()\" name=\"add\" style=\"color:white; background-color:#F58D44\"><span class=\"bi bi-cart-plus-fill\"></span> Add to Cart</button>
        <input class=\"text-danger d-inline w-25 text-center rounded-pill\" type=\"number\" name=\"quantity\" value=\"1\">            
        <span style=\"font-size:12px\" class=\"text-muted\">আজকের কুপন $link , ছাড় পেতে এই কুপনটি ইউজ করুন.. ধন্যবাদ</span>
        <input type=\"hidden\" name=\"pro_id\" value=\"$pro_id\">            
        <input type=\"hidden\" name=\"pro_title\" value=\"$title\">            
        <input type=\"hidden\" name=\"pro_price\" value=\"$price\">            

    </div>
    <div class=\"card-footer bg-dark \">&copy; $footer </div>
    <button type=\"button\" class=\"btn btn-$h_f_c d-inline position-relative\" data-bs-toggle=\"modal\" data-bs-target=\"#details$pro_id\">$a_not_a
    <span class=\"position-absolute top-0 start-100 translate-middle p-2 border border-warning rounded-circle bg-$active\"></span>
                    <span class=\"visually-hidden\">New Alert</span>
    </button>
    <span class=\"position-absolute top-0 start-100 translate-middle p-2 border border-info rounded-circle bg-$body\" style=\"color:cyan;background-color:$stylebc\"><span class=\"bi bi-trophy-fill\"></span> $off% ছাড়!</span>
                    <span class=\"visually-hidden\">New Alert</span>
    </div>
    </form>
    </div> 
    <div class=\"modal fade\" id=\"details$pro_id\" aria-labelledby=\"detailsaria\">
        <div class=\"modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable\">
            <div class=\"modal-content\">
                <div class=\"modal-header\">
                    <h3 class=\"modal-title text-center\">$header</h3>
                    <button type=\"\"  class=\"btn btn-primary d-inline rounded-pill\" onclick=\"mfoysal()\" name=\"add\" style=\"color:white; background-color:#F58D44\">$price ৳</button>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\">&times;</button>
                </div>
                <div class=\"modal-body\">

                <div style=\"text-align: justify\" class=\"jumbotron shadow-lg text-center\">
                <div class=\"row\">
                    <div class=\"col-md-4\">
                    <h4 class=\"text-center\">Hello World!!</h4>
                    <br>
                        <div class=\"carousel carousel-dark slide\" id=\"carousel1\" data-bs-ride=\"carousel\">
                            <div class=\"carousel-indicators\">
                                <button type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide-to=\"0\" class=\"active\" aria-current=\"true\" aria-label=\"mf1\"></button>
                                <button type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide-to=\"1\" class=\"\" aria-current=\"\" aria-label=\"mf2\"></button>
                                <button type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide-to=\"2\" class=\"\" aria-current=\"\" aria-label=\"mf3\"></button>
                                <button type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide-to=\"3\" class=\"\" aria-current=\"\" aria-label=\"mf4\"></button>
                            </div>
                            <div class=\"carousel-inner\">
                                <div class=\"carousel-item active\">
                                    <img src=\"$img2\" alt=\"\" class=\"d-block w-100\">
                                    <div class=\"carousel-caption d-none d-md-block\">
                                        <h4></h4>
                                        <p>hellow</p>
                                    </div>
                                </div>
                                <div class=\"carousel-item\">
                                    <img src=\"$img3\" alt=\"\" class=\"d-block w-100\">
                                    <div class=\"carousel-caption d-none d-md-block\">
                                        <h4></h4>
                                        <p>hellow</p>
                                    </div>
                                </div>
                                <div class=\"carousel-item\">
                                    <img src=\"$img4\" alt=\"\" class=\"d-block w-100\">
                                    <div class=\"carousel-caption d-none d-md-block\">
                                        <h4></h4>
                                        <p>hellow</p>
                                    </div>
                                </div>
                                <div class=\"carousel-item\">
                                    <img src=\"$image\" alt=\"\" class=\"d-block w-100\">
                                    <div class=\"carousel-caption d-none d-md-block\">
                                        <h4></h4>
                                        <p>hellow</p>
                                    </div>
                                </div>
                                <button class=\"carousel-control-prev\" type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide=\"prev\">
                                    <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                                    <span class=\"visually-hidden\">Previous</span>
                                </button>
                                <button class=\"carousel-control-next\" type=\"button\" data-bs-target=\"#carousel1\" data-bs-slide=\"next\">
                                    <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                                    <span class=\"visually-hidden\">Next</span>
                                </button>
                            </div>
                        </div>
    
                    </div>
                    <div class=\"col-md-8\">
                    <h3>...\\\ $title ///...</h3>
                    <p> $details <br>  .</p>
                    <div class=\"container\">
                        <button class=\"btn btn-danger\">footer title:</button>
                        <h6 class=\"d-block\">#footer</h6>
                        <h6 class=\"d-block\">#footer2</h6>
                        <h6 class=\"d-block\">#footer3</h6>
                        <h6 class=\"d-block\">#footer4</h6>
                        <h6 class=\"d-block\">#footer5</h6>
                    </div>
                    </div>
                </div>
              <div class=\"row\">
                
                
              </div>
          </div>

                </div>
                <div class=\"modal-footer\">
                    <button class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">&times; Close</button>
                    <button class=\"btn btn-primary\">|More|</button>
                </div>
            </div>
        </div>
    </div>";
echo $pro;
};
?>
