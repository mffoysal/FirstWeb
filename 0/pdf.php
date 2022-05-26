<?php
include('db.php');

if(isset($_POST['down'])){
    $tel = $_POST['phone'];
}

$query ="SELECT * FROM users WHERE phone='$tel'";
$result =mysqli_query($con,$query);
$row =mysqli_fetch_assoc($result);
$count=mysqli_num_rows($result);

if($count==1){
    $user=$row['user'];
    $name=$row['name'];
    $email=$row['email'];
    $phone=$row['phone'];
    $divisionq=$row['division'];
    $districtq=$row['district'];
    $upazilaq=$row['upazila'];
    $unionq=$row['unions'];
    $word=$row['word'];
    $village=$row['village'];
    $acType=$row['actype'];
    // $=$row[''];
    // $=$row[''];
}


require('vendor/autoload.php');

                
                 
$html='<div style="margin: 0 auto; background-image: url(f.jpg); background-repeat: no repeat; background-position: center; background-size: cover ">';               
$html.='<h1 style="margin: 0 auto; text-align:center">EduLearn</h1>';
$html.='<h3 style="margin: 0 auto; text-align:center">Educox.com|Online Shop</h3>';
$html.='<h3 style="margin: 0 auto; text-align:center">|User Sign Up Reciept|</h3>';
$html.='<h1>                                                                               </h1>';
$html.='<h1>                                                                               </h1>';
$html.='<h1>                                                                               </h1>';

$html.='<h3 style="color: yellow; margin-left:30px; margin-right:30px; background: green; border: 2px solid blue">     User ID : '.$user.' </h3>';
$html.='<h2 style="color:cyan; background: blue; margin-right:30px; margin-left:30px">Name : ' .$name. '</h2>';               
$html.='<h2 style="margin-left:30px; margin-right:30px; background: cyan; color:red; border: 2px solid blue">Email : '.$email.'</h2>';
$html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow">Phone : ' .$phone. '</h2>'; 
$html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow" >Division: '.$divisionq.'</h2>';             
$html.='<h2 style="margin-left:30px; margin-right:30px; background:red; color:yellow" >District: '.$districtq.'</h2>';             
$html.='<h2 style="margin-left:30px; margin-right:30px; color:blue" >Upazila: '.$upazilaq.'</h2>';             
$html.='<h2 style="margin-left:30px; margin-right:30px; color:cyan" >Union: '.$unionq.' </h2>';             
$html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Word: '.$word.' </h2>'; 
$html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Village|House: '.$village.'</h2>'; 
$html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >A/C Type: '.$acType.'</h2>';
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
// $html.='<h1>                                                                               </h1>'; 
// $html.='<h1>                                                                               </h1>'; 

$html.='<h1>                                                                               </h1>'; 
$html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     EdULearn~~> Farhad Foysal</h2>'; 
$html.='<h1>                                                                               </h1>'; 

$html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     Edu Address: Islampur, Natun Office, Coxsbazar</h2>'; 
$html.='<h1>                                                                               </h1>'; 

$html.='<h2 style="color:green; margin: 0 auto; text-align:center" >     Phone: 01585855075</h2>';
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='<h1>                                                                               </h1>'; 
$html.='</div>';
 

 $mpdf=new \Mpdf\Mpdf([
     'default_font' => 'solaimani',
     'mode' => 'utf-8'
 ]);
 $mpdf->WriteHTML($html);
 $file='EdUMF/'.$user.'/'.$name.'.pdf';
 $mpdf->output($file, 'D');
//  echo '<script>location.replace("success.php")</script>';  
// pdf





?>