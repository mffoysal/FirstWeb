<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
    <script src="../jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
 
    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="../jquery-3.5.1.min.js"></script>
    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <!-- <link rel="stylesheet" href="stylec.css" /> -->
  <link rel="stylesheet" href="user.css">
    <!-- swap -->

    <link rel="stylesheet" href="../bootstrap.min.css">
    <!-- <script src="../bootstrap.budle.min.js"></script> -->

    <style>
      #msg-2{
    display: none;
}
#msg-3{
    display: none;
}
#msg-4{
    display: none;
}
#msg-5{
    display: none;
}
    </style>
    
  </head>
  <body style="background-color: teal">




  <div class="container">
<div class="count">
      <div class="count-down">
          <div class="box">
            <h3 id="day">000</h3>
            <span>Day</span>
          </div>
          <div class="box">
            <h3 id="hour">00</h3>
            <span>Hour</span>
          </div>
          <div class="box">
            <h3 id="minute">00</h3>
            <span>Minute</span>
          </div>
          <div class="box">
            <h3 id="second">00</h3>
            <span>Second</span>
          </div>
      </div>
    </div>
</div>

<div class="container content">
  <h2><?=$urow['name']; ?></h2>
  <h2><?=$urow['name']; ?></h2>
</div>




<div class="container">
  <div class="profile-header">
    <div class="profile-img">
      <img src="../upload/1936546914.jpg" width="200" alt="">
    </div>
    <div class="profile-nav-info">
      <h3 class="user-name">Farhad Foysal</h3>
      <div class="address">
        <p class="state">#natunoffice, Cox, BD</p>
        <span class="country">BD</span>
      </div>
    </div>
    <div class="profile-option">
      <div class="notification">
        <i class="fa fa-bell"></i>
        <span class="alert-message">1</span>
      </div>
    </div>
  </div>
  <div class="main-bd">
    <div class="left-side">
      <div class="profile-side">
        <p class="mobile-number"><i class="far fa-phone">
          +8801585855075
        </i></p>
        <p class="user-mail"><i class="fa fa-envelope">
          mff@gmail.com
        </i></p>
        <h3>Bio</h3>
        <div class="user-bio bio">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid eum molestias vitae accusamus quod commodi iure in nemo incidunt optio. Dolores minima dolorum, fugiat doloribus error et, quasi accusamus a dignissimos aliquid molestias nesciunt blanditiis eos porro quia odio consequuntur illum quas architecto rerum omnis magni. Eius placeat quod a quaerat, ab expedita blanditiis aspernatur quos cum minima necessitatibus error recusandae nesciunt voluptates nemo dignissimos, reprehenderit deserunt voluptatem labore ipsum quibusdam architecto ut? Ea perspiciatis fugit impedit! Alias repellendus sapiente odio suscipit et, natus optio id minus iste inventore voluptatibus quidem cupiditate, officiis, repellat possimus sint? Nihil illum officia voluptatum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque quae repellendus veniam eveniet. Sit, dolorem vitae sapiente necessitatibus cupiditate at!</div>
     
     

        <div class="profile-btn">
            <button class="chatbtn"><i class="fa fa-comment">Chat</i></button>
            <button class="createbtn"><i class="fa fa-plus">Create</i></button>
          </div>
          <div class="user-rating">4.5
          
          <div class="rate">
            <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            </div>
            <span class="no-user"><span>123</span>&nbsp;&nbsp;reviews</span>
          </div>
          </div>

     
      </div>
          



    </div>
    <div class="right-side">
      <div class="nav">
        <ul>
          <li onclick="tabs(0)" class="user-post active">Posts</li>
          <li onclick="tabs(1)" class="user-review">reviews</li>
          <li onclick="tabs(2)" class="user-setting">settings</li>
          <li onclick="tabs(3)" class="user-video">Video</li>
        </ul>
      </div>
      <div class="profile-body">

        <div class="profile-posts tab">
            <h1>YOur post</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quae, voluptatem veritatis soluta dolorum quod eos vero ipsum architecto, distinctio voluptatum aperiam provident quas doloribus accusamus dolor itaque expedita earum!</p>
        </div>
        
        <div class="profile-review tab">
        <h1>User reviews</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quae, voluptatem veritatis soluta dolorum quod eos vero ipsum architecto, distinctio voluptatum aperiam provident quas doloribus accusamus dolor itaque expedita earum!</p>
        </div>
        
        <div class="profile-settings tab">
        <h1>Account Setting</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quae, voluptatem veritatis soluta dolorum quod eos vero ipsum architecto, distinctio voluptatum aperiam provident quas doloribus accusamus dolor itaque expedita earum!</p>
        </div>

        <div class="profile-videos tab">
          <header class="header2">
              <nav class="navbar">
                      <a class="btn-1" href="#home"><i class="fa fa-home"><span>Home</span></i></a>
                      <a class="btn-2" href="#about"><i class="fa fa-person"><span>About</span></i></a>
                      <a class="btn-3" href="#gallery"><i class="fa fa-gallery"><span>Gallery</span></i></a>
                      <a class="btn-4" href="#portfolio"><i class="fa fa-web"><span>Portfolio</span></i></a>
                      <a class="btn-5" href="#contact"><i class="fa fa-phone"><span>Contact</span></i></a>
              </nav>
          </header>

          <div id="msg-1" class="container msg-1">
                <h1>Home</h1>
          </div>
          <div id="msg-2" class="container msg-2">
                <h1>About</h1>
          </div>
          <div id="msg-3" class="container msg-3">
                <h1>Gallery</h1>
          </div>
          <div id="msg-4" class="container msg-4">
                <h1>Portfolio</h1>
          </div>
          <div id="msg-5" class="container msg-5">
                <h1>Contact</h1>
          </div>
          <!-- <div class="container">
            <section id="home" class="section">Home</section>
            <section id="about" class="section">About</section>
            <section id="gallery" class="section">Gallery</section>
            <section id="portfolio" class="section">Portfolio</section>
            <section id="contact" class="section">Contact</section>
          </div> -->
        <h1>Video Setting</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quae, voluptatem veritatis soluta dolorum quod eos vero ipsum architecto, distinctio voluptatum aperiam provident quas doloribus accusamus dolor itaque expedita earum!</p>
        </div>

      </div>
    </div>
  </div>
</div>







  <div class="container mt-3">

<div class="row">
<div class="col-md-6">
          <div class="container-fluid  bg-light">

          </div>
      </div>
      <div class="col-md-3">

      </div>
      <div class="col-md-3">

      </div>

</div>
    

  </div>

  
    


  

  <script>
    $date = "jan 27, 2022 00:00:00";
    const date=$date;
  let countDate = new Date(date).getTime();

function countDown(){
    let now = new Date().getTime();
    gap = countDate - now;

    let second = 1000;
    let minute =  second * 60;
    let hour = minute * 60;
    let day = hour * 24;

    let d = Math.floor(gap / (day));
    let h = Math.floor((gap % (day)) / (hour));
    let m = Math.floor((gap % (hour)) / (minute));
    let s = Math.floor((gap % (minute)) / (second));
    
    document.getElementById('day').innerText = d;
    document.getElementById('hour').innerText = h;
    document.getElementById('minute').innerText = m;
    document.getElementById('second').innerText = s;
    
}

setInterval(function(){
    countDown();
},1000)
</script>


  <script type="text/javascript">
    $(document).ready(function(){
        $('.btn-1').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-2').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-3').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-4').click(function(){
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-1').css('display','none');
            $('.msg-5').css('display','none');
            $('.msg-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btn-5').click(function(){
            $('.msg-1').css('display','none');
            $('.msg-2').css('display','none');
            $('.msg-3').css('display','none');
            $('.msg-4').css('display','none');
            $('.msg-5').css('display','block'); 
        });
    });
</script>

<!-- swap -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
<script type="text/javascript" src="script.js"></script>
<script type="text/javascript" src="user.js"></script>
<!-- swap -->

  </body>
</html>
