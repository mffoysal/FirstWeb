<?php
    
    // $connection = new mysqli('localhost', 'root', '', 'foysal') or die(mysqli_error($connection->error));
    // $tbl = "invoice";

    // $qry = "SELECT pro_id FROM $tbl order by pro_id desc";
    // $rslt = mysqli_query($connection,$qry);
    // $row = mysqli_fetch_array($rslt);

    // $lastnumber = $row['pro_id'];

    // if(empty($lastnumber)){
    //     $number = "MF-F-0000001";
    // }else{
    //     $idd = str_replace("MF-F-","",$lastnumber);
    //     $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
    //     $number = 'MF-F-' .$id;
    // }

?>
<?php
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     $product_id = $_POST['pro_id'];
    //     $tel = $_POST['tel'];
    //     $name = $_POST['name'];
    //     $district = $_POST['district'];
    //     $address = $_POST['address'];
    //     $house = $_POST['house'];
    //     $cart_item = $_POST['cart_item'];
    //     $item = $_POST['item'];
    //     $total_item = $_POST['total_item'];
    //     $price_sum = $_POST['price_sum'];
    //     $coupon = $_POST['coupon'];
    //     $price_total = $_POST['price_total'];
    //     $payment = $_POST['payment'];
    //     $payment_number = $_POST['payment_number'];
    //     $payment_trx = $_POST['payment_trx'];
    //     $msg = $_POST['msg'];

        
    //     if(!$connection){
    //         die("connection failed" .mysqli_connect_error());
    //     }
    //     else{
            
    //        $sql = $connection->query("INSERT INTO $tbl(pro_id, tel, name, district, address, house, cart_item, item,total_item, price_sum, coupon, subtotal, payment_method, payment_number, payment_trx, msg) VALUES('".$product_id."','".$tel."','".$name."','".$district."','".$address."','".$house."','".$cart_item."','".$item."','".$total_item."','".$price_sum."','".$coupon."','".$price_total."','".$payment."','".$payment_number."','".$payment_trx."','".$msg."')") or die($connection->error);

    //         echo 'Record Added Successfully!';

    //         if(mysqli_query($connection,$sql)){
    //             $connection = new mysqli("localhost","root","","foysal") or die(mysqli_error($connection->error));
    //             $tbl = "invoice";
            
            
    //             $qry = "SELECT pro_id FROM $tbl order by pro_id desc";
            
    //             $rslt = mysqli_query($connection,$qry);
    //             $row = mysqli_fetch_array($rslt);
            
    //             $lastnumber = $row['pro_id'];
            
    //             if(empty($lastnumber)){
    //                   $number = "MF-F-0000001";
    //             }else{
    //                 $idd = str_replace("MF-F-","",$lastnumber);
    //                 $id = str_pad($idd + 1, 7,0, STR_PAD_LEFT);
    //                 $number = 'MF-F-' .$id;
    //             }
    //         }
    //     }
    // }
    // else{
    //     echo "Record added failed";    
    // }

?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place order Cart Item</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>

<?php

        // include('product.php');
        include('invoicecard.php');

?>

<div class="modal fade " id="cart" tabindex="-1" role="dialog" aria-labelledby="cartTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content  modal-fullscreen-sm-down">
                <div class="modal-header">
                    <div class="">
                        <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                        <h4 class="modal-title text-center" id="cartTitle">Your Choosen Item|Cart: মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span></h4>          
                        <h3>মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳~><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cart3">Place Order</button></h3>
                        
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                      <div class="table-responsive">
                          <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-danger">
                              <thead class="table-primary">
                                  <tr>
                                  <th>ITEM ID</th>
                                  <th>ITEM NAME</th>
                                  <th>PRICE</th>
                                  <th>QUANTITY</th>
                                  <th>ACTION</th>
                                  <th>TOTAL</th>
                                  </tr>
                              </thead>
                                  <?php if(isset($_SESSION['Cart'])) : ?>
                                      <?php foreach($_SESSION['Cart'] as $k=> $item) : ?>
                              <tbody class="table-striped">
                                  <tr>
                                  <td><?php echo $item['id']; ?></td>
                                  <td><?php echo $item['name'].' * ['.$item['qnt'].']'; ?></td>
                                  <td><?php echo '৳  '.number_format($item['price'], 2).'/=    *    ['.$item['qnt'].']'; ?></td>
                                  <td><?php echo $item['qnt'].'টি'; ?></td>
                                  <td><a href="index.php?action=delete&id=<?php echo $item['id']; ?>"><span id="dlt" onclick="dlt()" class="btn btn-danger">Delete</span></a></td>
                                  <td><?php echo '৳'.number_format($item['qnt'] * $item['price'], 2).'/='; ?></td>
                                  </tr>
                              </tbody>    
                                      <?php endforeach;?>
                                      <?php endif?>
                              <tfoot class="table-dark">
                                  <tr>
                                  <td align="left">নির্বাচিতঃ <span class='btn btn-danger'><?php if(isset($_SESSION['Cart'])){
                                          echo count($_SESSION['Cart']);}?></span>
                                  </td>
                                  <td> &copy;MF CART: <span class="btn btn-info"><?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo '('.$mf['id'].')'.$mf['name'].''.'*['.$mf['qnt'].'], ' ;
                                      }
                                  } ?></span></td>
                                  <td>TOTAL : <span class="btn btn-success"><?php if(isset($_SESSION['Cart'])){
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo number_format($mf['qnt'] * $mf['price'], 2).'৳  +';
                                      }
                                  } ?></span>
                                  </td>
                                  <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                                  <td>মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span></td>
                                  <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</td>
                              </tr>
                              </tfoot>
                          </table>
                      </div>

                </div>
                <div class="modal-footer">
                <?php  if(isset($_GET['action'])){
                            if($_GET['action'] =="clearall"){
                                unset($_SESSION['Cart']);
                                echo '<script>window.location="index.php"</script>';
                            }
                        }?>
                    <a href="index.php?action=clearall"><button type="button" class="btn btn-danger">Clear</button></a>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#cart2">Show Full Screen</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cart3">Place Order</button>
                </div>
            </div>
        </div>
    </div>
    



    <div class="modal fade " id="cart2" tabindex="-1" role="dialog" aria-labelledby="cartTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content  modal-fullscreen">
                <div class="modal-header">
                    <div class="">
                    <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                        <h4 class="modal-title text-center" id="cartTitle">Your Choosen Item|Cart: মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span> | মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</h4>          
                        <h3></h3>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                      <div class="table-responsive">
                          <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-danger">
                              <thead class="table-primary">
                                  <tr>
                                  <th>ITEM ID</th>
                                  <th>ITEM NAME</th>
                                  <th>PRICE</th>
                                  <th>QUANTITY</th>
                                  <th>ACTION</th>
                                  <th>TOTAL</th>
                                  </tr>
                              </thead>
                                  <?php if(isset($_SESSION['Cart'])) : ?>
                                      <?php foreach($_SESSION['Cart'] as $k=> $item) : ?>
                              <tbody class="table-striped">
                                  <tr>
                                  <td><?php echo $item['id']; ?></td>
                                  <td><?php echo $item['name'].' * ['.$item['qnt'].']'; ?></td>
                                  <td><?php echo '৳  '.number_format($item['price'], 2).'/=    *    ['.$item['qnt'].']'; ?></td>
                                  <td><?php echo $item['qnt'].'টি'; ?></td>
                                  <td><a href="index.php?action=delete&id=<?php echo $item['id']; ?>"><span id="dlt" onclick="dlt()" class="btn btn-danger">Delete</span></a></td>
                                  <td><?php echo '৳'.number_format($item['qnt'] * $item['price'], 2).'/='; ?></td>
                                  </tr>
                              </tbody>    
                                      <?php endforeach;?>
                                      <?php endif?>
                              <tfoot class="table-dark">
                                  <tr>
                                  <td align="left">নির্বাচিতঃ <span class='btn btn-danger'><?php if(isset($_SESSION['Cart'])){
                                          echo count($_SESSION['Cart']);}?></span>
                                  </td>
                                  <td> &copy;MF CART: <span class="btn btn-info"><?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo '('.$mf['id'].')'.$mf['name'].''.'*['.$mf['qnt'].'], ' ;
                                      }
                                  } ?></span></td>
                                  <td>TOTAL : <span class="btn btn-success"><?php if(isset($_SESSION['Cart'])){
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo number_format($mf['qnt'] * $mf['price'], 2).'৳  +';
                                      }
                                  } ?></span>
                                  </td>
                                  <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                                  <td>মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span></td>
                                  <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</td>
                              </tr>
                              </tfoot>
                          </table>
                      </div>

                </div>
                <div class="modal-footer">
                <?php  if(isset($_GET['action'])){
                            if($_GET['action'] =="clearall"){
                                unset($_SESSION['Cart']);
                                echo '<script>window.location="index.php"</script>';
                            }
                        }?>
                    <a href="index.php?action=clearall"><button type="button" class="btn btn-danger">Clear</button></a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cart3">Place Order</button>
                </div>
            </div>
        </div>
    </div>



    <form action="" method="POST">
<div class="modal fade " id="cart3" tabindex="-1" role="dialog" aria-labelledby="cartTitle" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen" role="document">
            <div class="modal-content  modal-fullscreen">
                <div class="modal-header">
                    <div class="">
                    <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                        <h4 class="modal-title text-center" id="cartTitle">Your Choosen Item|Cart: মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span> | মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</h4>          
                        <h3><?php  if(isset($_GET['action'])){
                            if($_GET['action'] =="clearall"){
                                unset($_SESSION['Cart']);
                                echo '<script>window.location="index.php"</script>';
                            }
                        }?>
                    <a href="index.php?action=clearall"><button type="button" class="btn btn-danger">Clear</button></a></h3>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                        <div class="container bg-light">
                            <div class="row g-3 form-floating">
                            <div class="col-md-4 form-floating">
                                  <div class="form-floating">
                                  <input aria-label="INVOICE" class="btn btn-info bg-warning text-center form-control" id="invoice_no" type="text" name="product_id" value="<?php echo $number; ?>" readonly>
                                  <label for="invoice_no">INVOICE NO:</label>
                                  
                                  </div>
                                  <h6><span id="check-phone"></span></h6>
                                  <div class="form-floating needs-validation">
                                  <input class="form-control text-center" id="tel" onInput="checkPhone()" type="number" name="tel" placeholder="Type Your Phone Number" required>
                                  <label for="tel">Valid Phone Number: <span class="text-muted">[OPTIONAL]</span></label>
                                  <div class="valid-feedback">
                                    Apni Puration user hole bakitukut puron na korleo colbe. Thanks!
                                  </div>
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="name" type="text" name="name" placeholder="Enter Your Name" >
                                  <label for="name">Your Name:</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="district" type="text" name="district" placeholder="Enter Your District or Zip code">
                                  <label for="district">District | Zip Code:</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="address" type="text" name="address" placeholder="Enter Your Address">
                                  <label for="address">Address:</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="house" type="text" name="house" placeholder="Enter Your House & Street NO" >
                                  <label for="house">House & Street No:</label>
                                  
                                  </div>
                                </div>  
                                
                                <div class="col-md-4 form-floating">
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="cart_item" type="text" name="cart_item" value="<?php if(isset($_SESSION['Cart'])){
                                          echo count($_SESSION['Cart']);}?>" readonly>
                                  <label for="cart_item">CART:</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="item" type="text" name="item" value="<?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo '('.$mf['id'].')'.$mf['name'].''.'*['.$mf['qnt'].'], ' ;
                                      }
                                  } ?>" readonly>
                                  <label for="item">ITEM NAME:</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="total_item" type="text" name="price_sum" value="<?php if(isset($_SESSION['Cart'])){
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo number_format($mf['qnt'] * $mf['price'], 2).'৳  +';
                                      }
                                  } ?>" readonly>
                                  <label for="total_item">Pric Sum :</label>
                                  
                                  </div>
                                  <div class="form-floating">
                                  <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                                  <input class="form-control text-center" id="price_sum" type="text" name="total_item" value="<?php echo number_format($qntotal).'টি';?>" readonly>
                                  <label for="price_sum">Total Item:</label>
                                  
                                  </div>
                                  <h6><span id="check-coupon"></span></h6>
                                  <div class="form-floating">
                                  <!-- <h6><span id="check-coupon"></span><h6> -->
                                  <input style="border:2px solid black" onInput="checkCoupon()" class="btn brn-light text-center form-control" id="coupon_str" type="text" name="coupon" value="<?php ?>" placeholder="Coupon">
                                  <label for="coupon_str">COUPON</label>
                                  </div>
                                  <button type="button" class="hi btn btn-dark" onclick="apply()">APPLY</button>
                                  
                                  <button class="btn btn-success text-center" id="total" type="button" name="price_total" value="<?php echo number_format($total, 2).'৳';?>"><?php echo number_format($total, 2).'৳';?></button>            
                                  
    
                                  <div class="form-floating">
                                  <input class="form-control text-center" id="total_price" type="text" name="price_total" value="<?php echo ($total)?>" readonly>                                 
                                  <label class="" for="total">subTOTAL:</label>
                                  
                                  </div>
                                                                   
                                </div>
                                
                                <div id="payment" class="col-md-4 bg-light form-floating">
                                  <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="check1" name="payment" value="Cash" checked>
                                    <label style="color: red" for="check1">Cash On Delivery</label>
                                  </div>
                                  <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="check2" name="payment" value="Bkash" >
                                    <label style="color: red" for="check2">Bkash</label>
                                  </div>
                                  <div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="check3" name="payment" value="Nagad" >
                                    <label style="color: red" for="check3">Nagad</label>
                                  </div><div class="form-check form-switch">
                                    <input type="checkbox" class="form-check-input" id="check4" name="payment" value="DBBL" >
                                    <label style="color: red" for="check4">DBBL</label>
                                  </div>
                                  

                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Cash On Delivery #1
                                        </button>
                                        </h2>
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                                                Dear Brothers & Sisters,......
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Bkash #2
                                        </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.
                                        <div class="form-floating">
                                                <input class="form-control text-center" id="bkash" type="text" name="payment_number" placeholder="Enter Your Bkash No" value="<?php ?>">
                                                <label for="bkash">Your Bkash Account NO:</label>
                                                
                                                </div>
                                                <div class="form-floating">
                                                <input class="form-control text-center" id="trx" type="text" name="payment_trx" placeholder="Enter Your TrxID" value="<?php ?>">
                                                <label for="trx">TrxID:</label>
                                                
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Nagad #3
                                        </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.
                                        <div class="form-floating">
                                                <input class="form-control text-center" id="bkash" type="text" name="payment_number" placeholder="Enter Your " value="<?php ?>">
                                                <label for="bkash">Your Nagad Account NO:</label>
                                                
                                                </div>
                                                <div class="form-floating">
                                                <input class="form-control text-center" id="trx" type="text" name="payment_trx" placeholder="Enter Your " value="<?php ?>">
                                                <label for="trx">TrxID:</label>
                                                
                                                </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingFour">
                                        <button style="color: red" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            DBBL Payment #4
                                        </button>
                                        </h2>
                                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.
                                        <div class="form-floating">
                                                <input class="form-control text-center" id="bkash" type="text" name="payment_number" placeholder="Enter Your " value="<?php ?>">
                                                <label for="bkash">DBBL Account NO:</label>
                                                
                                                </div>
                                                <div class="form-floating">
                                                <input class="form-control text-center" id="trx" type="text" name="payment_trx" placeholder="Enter Your " value="<?php ?>">
                                                <label for="trx">TrxID:</label>
                                                
                                                </div>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="form-contro form-floating">
                                        <textarea class="form-control" name="msg" id="msg" cols="30" rows="10"></textarea>
                                        <label for="msg">Your Message</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="save" >Submit</button>

                                    </div>
                                    </div>
                            </div>
                        </div>
                                
                      <div class="table-responsive ">
                          <table class="table w-100 m-auto table-light table-hover table-striped table-borderd border-danger">
                              
                              <tfoot class="table-dark">
                                  <tr>
                                  <td align="left">নির্বাচিতঃ <span class='btn btn-danger'><?php if(isset($_SESSION['Cart'])){
                                          echo count($_SESSION['Cart']);}?></span>
                                  </td>
                                  <td> &copy;MF CART: <span class="btn btn-info"><?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo '('.$mf['id'].')'.$mf['name'].''.'*['.$mf['qnt'].'], ' ;
                                      }
                                  } ?></span></td>
                                  <td>TOTAL : <span class="btn btn-success"><?php if(isset($_SESSION['Cart'])){
                                      foreach($_SESSION['Cart'] as $m=> $mf){
                                          echo number_format($mf['qnt'] * $mf['price'], 2).'৳  +';
                                      }
                                  } ?></span>
                                  </td>
                                  <?php if(empty($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                  }?>
                                  <?php if(isset($_SESSION['Cart'])){
                                      $total = 0;
                                      $qntotal = 0;
                                      foreach($_SESSION['Cart'] as $k=> $item){
                                          $total = $total + ($item['qnt'] * $item['price']);
                                          $qntotal = $qntotal +$item['qnt'];
                                          
                                      }
                                  }?>
                                  <td>মোটঃ <span class='btn btn-primary'><?php echo number_format($qntotal).'টি';?></span></td>
                                  <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'><?php echo number_format($total, 2).'৳';?></span>টাকা৳</td>
                              </tr>
                              </tfoot>
                          </table>
                      </div>

                </div>
                <div class="modal-footer bg-dark">
                <?php  if(isset($_GET['action'])){
                            if($_GET['action'] =="clearall"){
                                unset($_SESSION['Cart']);
                                echo '<script>window.location="index.php"</script>';
                            }
                        }?>
                    <a href="index.php?action=clearall"><button type="button" class="btn btn-danger">Clear Cart</button></a>        
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
                    <a href="index.php?action=clearall"><button type="submit" class="btn btn-primary" name="save" data-bs-toggle="modal" data-bs-target="#" >Order Here</button></a>
                </div>
                
            </div>
        </div>

        
    </div>
</form>
    









    <!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

 Modal
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
<script>
    // function apply() {
    //     var coupon=jQuery('#coupon').val();
    //     if(coupon!=''){
    //         jQuery.ajax({
    //             url: 'coupon.php',
    //             type: 'post',
    //             data: 'coupon='+coupon,
    //             success: function(result){
    //                 console.log(result);
    //             }
    //         })
    //     }
    // }
</script>
    <script src="script.js"></script>
    <script src="jquery-3.4.1.min.js"></script>
    <script src="sweetalert2.all.min.ljs"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        function checkCoupon(){

                jQuery.ajax({
                    url: "check_coupon.php",
                    data: 'coupon=' +$("#coupon_str").val(),
                    type: "POST",
                    success: function (data){
                        $("#check-coupon").html(data);
                     },
                    error: function (){}
                });
                }

        function checkPhone(){

                 jQuery.ajax({
                    url: "check_phone.php",
                    data: 'tel=' +$("#tel").val(),
                    type: "POST",
                    success: function (data){
                        $("#check-phone").html(data);
                    },
                    error: function (){}
                });
                }        
    </script>

</body>
</html>