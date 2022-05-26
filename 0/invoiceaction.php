<?php

include('db.php');
    //  $conn = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($conn->error));
     $tbl = "invoice";
     
     if(isset($_POST['save'])){
             $product_id = $_POST['product_id'];
             $tel = $_POST['tel'];
             $name = $_POST['name'];
             $district = $_POST['district'];
             $address = $_POST['address'];
             $house = $_POST['house'];
             $cart_item = $_POST['cart_item'];
             $item = $_POST['item'];
             $total_item = $_POST['total_item'];
             $price_sum = $_POST['price_sum'];
             $coupon = $_POST['coupon'];
             $price_total = $_POST['price_total'];
             $payment = $_POST['payment'];
             $payment_number = $_POST['payment_number'];
             $payment_trx = $_POST['payment_trx'];
             $msg = $_POST['msg'];
             $email = $_POST['email'];
             
             $error = array();
     
             if(empty($tel)){
                 $telError = "Please enter your Phone Number!";
                 array_push($error,$telError);
             }
     
             if(count($error) == 0){
                 $con->query("INSERT INTO $tbl(pro_id, phone, name, district, address, house, cart_item, item,total_item, price_sum, coupon, subtotal, payment_method, payment_number, payment_trx, msg, email) VALUES('$product_id','$tel','$name','$district','$address','$house','$cart_item','$item','$total_item','$price_sum','$coupon','$price_total','$payment','$payment_number','$payment_trx','$msg','$email')") or die($con->error);
                
                        // $connection = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($connection->error));
                        $tbl = "invoice";
                        
                        $qry = "SELECT pro_id FROM $tbl order by pro_id desc";
                        $rslt = mysqli_query($con,$qry);
                        $row = mysqli_fetch_array($rslt);

                        $lastnumber = $row['pro_id'];

                        if(empty($lastnumber)){
                            $number = "MF-F-0000001";
                        }else{
                            $idd = str_replace("MF-F-","",$lastnumber);
                            $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
                            $number = 'MF-F-' .$id;
                        }
                        
                        
                 require('vendor/autoload.php');

                
                 
                $html='<div style="margin: 0 auto; background-image: url(f.jpg); background-repeat: no repeat; background-position: center; background-size: cover ">';               
                $html.='<h1 style="margin: 0 auto; text-align:center">EduLearn</h1>';
                $html.='<h3 style="margin: 0 auto; text-align:center">Educox.com|Online Shop</h3>';
                $html.='<h3 style="margin: 0 auto; text-align:center">|Online Order Reciept|</h3>';
                $html.='<h1>                                                                               </h1>';
                $html.='<h1>                                                                               </h1>';
                $html.='<h1>                                                                               </h1>';

                $html.='<h3 style="color: yellow; margin-left:30px; margin-right:30px; background: green; border: 2px solid blue">     Invoice ID : '.$product_id.' </h3>';
                $html.='<h2 style="color:cyan; background: blue; margin-right:30px; margin-left:30px">Name : ' .$name. '</h2>';               
                $html.='<h2 style="margin-left:30px; margin-right:30px; background: cyan; color:red; border: 2px solid blue">Payment Method : '.$payment.'</h2>';
                $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow">Phone : ' .$tel. '</h2>'; 
                $html.='<h2 style="margin-left:30px; margin-right:30px; background: red; color:yellow" >Cart Item: '.$item.'</h2>';             
                $html.='<h2 style="margin-left:30px; margin-right:30px; background:red; color:yellow" >One by one Price: '.$price_sum.'</h2>';             
                $html.='<h2 style="margin-left:30px; margin-right:30px; color:blue" >SubTotal: '.$price_total.' /=</h2>';             
                $html.='<h2 style="margin-left:30px; margin-right:30px; color:cyan" >Coupon:  </h2>';             
                $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >District: </h2>'; 
                $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Address: </h2>'; 
                $html.='<h2 style="margin-left:30px; margin-right:30px; color:teal" >Message: </h2>';
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
                 

                 $mpdf=new \Mpdf\Mpdf();
                 $mpdf->WriteHTML($html);
                 $file='EdUMF/'.$product_id.'/'.$tel.'.pdf';
                 $mpdf->output($file, 'I');

                //  header('location: farhad.php');
                echo '<script>location.replace("success.php")</script>';  
         

            }

     
     
     
     }
 
 
 
?>