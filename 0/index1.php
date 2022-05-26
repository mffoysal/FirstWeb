<?php
if(!isset($_REQUEST['name'])){
    $_POST=$_REQUEST['name']; 
}else{
    $_POST['name']=$_REQUEST['name'];
}

session_start ();
function loginForm() {
    echo '
	<div class="form-group">
		<div id="loginform">
			<form action="index1.php" method="post">
			<h1>EdULearn Group Live Chat</h1><hr/>
				<label for="name">Enter Your Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />
			</form>
		</div>
	</div>
   ';
}

 

if (isset ( $_POST ['name'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "log.html", 'a' );
        fwrite ( $cb, "<div class='msgln'><i> ><b>" . $_SESSION ['name'] . "</b> ~> Assalamualaikum...</i><br></div>" );
        fclose ( $cb );
    } else {
        echo '<span class="error">Please Enter Your Name</span>';
    }
}

if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><i> ><b> " . $_SESSION ['name'] . "</b> -> Allah Hafez...</i><br></div>" );
    fclose ( $cb );
    session_destroy ();
    header ( "Location: index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>EdULearn Online Group Live Chat</title>
	<link rel="stylesheet" href="css/style2.css">
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="bootstrap.min.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<?php



	if (! isset ( $_SESSION ['name'] )) {
	loginForm ();
	} else {
?>
<div style="background-color:" class="container bg-info" id="wrapper">
	<div id="menu">
	<h4>EdULearn Group</h4><p class="logout"><a id="exit" href="#" class="btn btn-primary">Exit Live Chat</a></p><hr/>
    
		<p style="margin:0 auto" class="welcome text-center"><b>Assalamualaikum - <a class="text-uppercase"><?php echo $_SESSION['name']; ?></a></b></p>
		
	<div style="clear: both"></div>
	</div>
	<div class="container" id="chatbox">
	<?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
		$handle = fopen ( "log.html", "r" );
		$contents = fread ( $handle, filesize ( "log.html" ) );
		fclose ( $handle );

		echo $contents;
		}
	?>
	</div>
<form name="message" action="">

	<input style="display:inline; width:80%" name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Type Your Message"/>
	<input style="display:inline" name="submitmsg" class="btn btn-warning" type="submit" id="submitmsg" value="Send" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are You Sure You Want To Leave This Page?");
        if(exit==true){window.location = 'index1.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script>
<?php
}
?>
<?php
include('navbar.php');
?>
</body>
</html>