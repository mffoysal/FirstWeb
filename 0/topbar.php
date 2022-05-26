<!DOCTYPE html>
<html>
<head>
<style>

.tophead{
    font-family:'Poppins', sans-serif;
    margin:0;
    padding:0;
    outline: none;
    border: none;
    text-decoration:none;
    text-transform:capitalize;
    scroll-behavior:smooth;
    top: 3px;
    left:0;
    right:0;
    height: 70px;
    z-index: 1000;

}

.topheader .topnav{
    display:flex;
    background:cyan;

}
.topheader .topnav a{
    flex:1;
    text-align:center;
    font-size: 14px;
    line-height:50px;
    text-decoration:none;
    color:white;
    text-transform:capitalize;
    font-family:'Poppins', sans-serif;


} 
.topheader .topnav a span{
    padding-left:5px;


}
.topheader .topnav a:hover{
    filter:brightness(.7);
    color:black;

}
.topheader .topnav a:nth-child(1){
    background: #e74c3c;
}

.topheader .topnav a:nth-child(2){
    background: #27ae60;
}

.topheader .topnav a:nth-child(3){
    background: #2980b9;
}

.topheader .topnav a:nth-child(4){
    background: #8e44ad;
}

.topheader .topnav a:nth-child(5){
    background: #f39c12;
}

.topcontainer{
    /* display:flex; */
    /* color:black; */

}


#postUser, #postOthers, #signUp, #logIn{
  display:none;
}


</style>
</head>
<body style="background:black;color:white">
    
    
<div class="topheader">
    <header class="tophead">
        <nav class="topnav">
            <a href="#main" class="btttnu-1"><i class="bi bi-house"><span class="">Home</span></i></a>
            <a href="#user" class="btttnu-2"><i class="bi bi-chat"><span class="">User</span></i></a>
            <a href="#others" class="btttnu-3"><i class="bi bi-phone"><span class="">Others</span></i></a>
            <a href="#signup" class="btttnu-4"><i class="bi bi-plus-fill"><span class="">SIgnUp</span></i></a>
            <a href="#login" class="btttnu-5"><i class="bi bi-door"><span class="">Login</span></i></a>

        </nav>
    </header>
</div>

<div class="container topcontainer">
    <section id="mainHome" class="section msssgu-1">

    <h1>farhad foysla</h1>

    </section>
    <section id="postUser" class="section msssgu-2">User


    </section>
    <section id="postOthers" class="section msssgu-3">Other


    </section>
    <section id="signUp" class="section msssgu-4">signUp


    </section>
    <section id="logIn" class="section  msssgu-5">Login


    </section>

</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('.btttnu-1').click(function(){
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-1').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-2').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-2').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-3').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-2').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-3').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-4').click(function(){
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-1').css('display','none');
            $('.msssgu-5').css('display','none');
            $('.msssgu-4').css('display','block'); 
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.btttnu-5').click(function(){
            $('.msssgu-1').css('display','none');
            $('.msssgu-2').css('display','none');
            $('.msssgu-3').css('display','none');
            $('.msssgu-4').css('display','none');
            $('.msssgu-5').css('display','block'); 
        });
    });
</script>


</body>
</html>



