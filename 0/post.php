<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
if(isset($_SESSION['name'])){
    $text = $_POST['text'];

    $cb = fopen("log.html", 'a');
    fwrite($cb, "<b style='text-transform:uppercase'><div class='msgln'>".$_SESSION['name']."</b><b>(".date("h:i A").")</b>:</br> ------> ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($cb);
}
?>