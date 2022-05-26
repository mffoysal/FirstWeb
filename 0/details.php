<?php

include('db.php');

if(isset($_REQUEST['link'])){
    $dlink = $_REQUEST['link'];
}

// $conn = new mysqli('localhost','root','','foysal');
// database connect and select


    
    $sqli= "SELECT * FROM shopping WHERE id='".$dlink."' ";
    $result = mysqli_query($con,$sqli);
    $rowh = mysqli_fetch_assoc($result);



?>
<?php

    $d_pid = $rowh['id'];

    $sqlii= "SELECT * FROM details_product WHERE pro_id='".$dlink."' ";
    
        
        $resultp = mysqli_query($con,$sqlii);
        $num=mysqli_num_rows($resultp);
        if($num==1){
            $rowp = mysqli_fetch_assoc($resultp);
        }else{ 
            $rowp['details1']="এই প্রোডাক্ট এর ডিটেইলস এখনও যুক্ত করা হয় নি, ০১৫৮৫৮৫৫০৭৫ এই নম্বরে ফোন করে বিস্তারিত জেনে নিন ";
            $rowp['details2']="";
            $rowp['footer_title']="";
            $rowp['footer1']="";
            $rowp['footer2']="";
            $rowp['footer3']="";
            $rowp['footer4']="";
            $rowp['footer5']="";
            $rowp['pic_title']="";
            $rowp['orginal_price']="";
            $rowp['d_title']="";
        }
        
 
    


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $rowh['title']; ?> | PRODUCT DETAILS | <?php echo $row['title']?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        .img2{
    /* border: 5px solid rgb(241, 17, 73); */
    border: 5px solid black;
    border-radius: 5%;
    background-color: blue;
    width: 500px;
    height: 400px;
    text-align: center;
    margin: 0 auto;
    opacity: 1;
    transition: 0.8s;

}

.img3{
    width: 300px;
    height: 300px;
    padding-top: 50px;
    opacity: 0.6;
    transition: 0.7s;
    border-radius: 30%;

}
.img2:hover{
    width:600px;
    height:500px;
    background-color: chartreuse;
    border: 100px solid aqua;
    border-radius: 50%;
    transform: rotate(360deg);
}
.img3:hover{
    opacity: 1;
    transform: scale(4, 2.5);
    border-radius: 40%;
}
    </style>
</head>
<body>
    
<?php
include("navbar.php");
?>

<div class="container text-center m-auto mt-5">
    <button type="button" class="btn btn-info d-inline tex-center position-relative rounded-pill" data-bs-toggle="modal" data-bs-target="#details" style="color:#0bdcf4; background-color:#FCFC08">বিস্তারিত দেখতে ক্লিক করুন | Details Here
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"><?php echo $dlink ?></span>
                <span class="visually-hidden">Unread Message</span>
    </button>
</div>


<div class="modal fade" id="details" aria-labelledby="detailsaria">
        <div class="modal-dialog modal-lg modal-fullscreen-md-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                
            <div class="modal-header">
                    <h3 class="modal-title text-center"><?php echo $rowh['header'] ?></h3>
                    
                    <button class="btn btn-danger"><?php echo $rowp['orginal_price']?></button>

                    <button type=""  class="btn btn-primary d-inline rounded-pill" onclick="mfoysal()" name="add" style="color:white; background-color:#F58D44"><?php echo $rowh['price'] ?> BD &#2547 </button>

                    <form action="index.php" method="POST">
                    <button type=""  class="btn btn-primary d-inline rounded-pill" onclick="mfoysal()" name="add" style="color:white; background-color:#F58D44">Add to Cart</button>
                    <input class="text-danger d-inline w-25 text-center rounded-pill" type="number" name="quantity" value="1"> 
                    <input type="hidden" name="pro_id" value="<?php echo $rowh['id'] ?>">            
                    <input type="hidden" name="pro_title" value="<?php echo $rowh['title'] ?>">            
                    <input type="hidden" name="pro_price" value="<?php echo $rowh['price'] ?>"> 
                    </form>     

                   
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">

                <div style="text-align: justify" class="jumbotron shadow-lg text-justify p-3">
                <div class="row">
                    <div class="col-md-4">
                    <h4 class="text-center"><?php echo $rowp['d_title']?></h4>
                    <br>
                        <div class="carousel carousel-dark slide" id="carousel1" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="mf1"></button>
                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" class="" aria-current="" aria-label="mf2"></button>
                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" class="" aria-current="" aria-label="mf3"></button>
                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="3" class="" aria-current="" aria-label="mf4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="image<?php echo $rowh['img2'] ?>" id="" alt="" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4></h4>
                                        <p><?php echo $rowp{'pic_title'}?></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="image<?php echo $rowh['img3'] ?>" id="" alt="" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4></h4>
                                        <p><?php echo $rowp{'pic_title'}?></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="image<?php echo $rowh['img4'] ?>" id="" alt="" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4></h4>
                                        <p><?php echo $rowph{'pic_title'}?></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="image<?php echo $rowh['img'] ?>" id="" alt="" class="d-block w-100">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4></h4>
                                        <p><?php echo $rowp{'pic_title'}?></p>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel1" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel1" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
    
                    </div>
                    <div class="col-md-8">
                    <h3>...<?php echo $rowh['title']?>...</h3>
                    <p class="text-justify" ><span style="font-size:27px; color:red">Product Details Here......</span> <br> <?php echo $rowp['details1']?> <br> </p>
                    <br>
                    <p style="color:red"><?php echo $rowp['details2']?></p>
                    <div class="container">
                        <button class="btn btn-danger"><?php echo $rowp['footer_title']?></button>
                        <h6 class="d-block"><?php echo $rowp['footer1']?></h6>
                        <h6 class="d-block"><?php echo $rowp['footer2']?></h6>
                        <h6 class="d-block"><?php echo $rowp['footer3']?></h6>
                        <h6 class="d-block"><?php echo $rowp['footer4']?></h6>
                        <h6 class="d-block"><?php echo $rowp['footer5']?></h6>
                    </div>
                    </div>
                </div>
              <div class="row">
                
                
              </div>
          </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">&times; Close</button>
                    <button class="btn btn-primary">|More|</button>
                </div>
            </div>
        </div>
    </div>
    



    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <img src="image<?php echo $rowh['img'] ?>" id="myimage" style="width: 250px;" alt="">
            </div>
        </div>
    </div>
   
    <div class="img2 bg-info"><img class="img3" src="image/bg.jpg" alt="FMNF"></div>

    <!-- <script src="jquery-3.4.1.min.js"></script> -->
    <script src="sweetalert.min.js"></script>
    <script>
        // $('#dlt').on(click, function(e){
        //     e.preventDefault();
        //     const href = $(this).attr('href')

        //     swal({
        //         title: 'Are you sure?',
        //         text: 'Record will be deleted!',
        //         type: 'warning',
        //         buttons: true,
        //         dangerMode: true,
        //     })
        // }) 
        function details1(){
            swal({
                title: "Delete Item!!!",
                icon: "warning",
                text: "Your Product delete from cart!",
                button: false,
                timer: 3000,
             })
        }
        
    </script>





    <script src="js/popper.min.js"></script>
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="jquery/zoomsl.min.js"></script>
    <script>
        $('#myimage').imagezoomsl();
    </script>


    
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>

</body>
</html>