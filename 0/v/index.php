<?php
session_start();
include('../db.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor |  Online </title>
    <link rel="stylesheet" href="../style.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="css/bounc.css"> -->
    <link rel="stylesheet" href="../css/bounc.js">
    <!-- <link rel="stylesheet" href="js/bootstrap.bundle.min.js"> -->
    <link rel="stylesheet" href="../bootstrap.min.css">
    <script src="../jquery-3.5.1.min.js"></script>
    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- swap -->
    
    

</head>
<body>
    

<div class="container-fluid">
    
<div class="table-responsive">
<table class="table w-75 m-auto table-light table-hover table-striped table-borderd border-danger">
    <thead class="table-primary">
        <tr>
        <th>ID</th>
        <th>Ip</th>
        <th>Details</th>
        <th>Time</th>
        <th>Details1</th>
        <th>Browser</th>
        <th>Unique</th>
        </tr>
    </thead>

            
    <tbody class="table-striped">
    <?php 
            $sql = "SELECT * FROM visitor order by id desc";
            $sqls = mysqli_query($con,$sql);
            
            while($sr=mysqli_fetch_assoc($sqls)){
        ?>
        <tr>
        <td data-bs-toggle="modal" data-bs-target="#location<?=$sr['id']?>"><?=$sr['id']?></td>
        <td><?=$sr['ip']?></td>
        <td><?=$sr['description2']?></td>
        <td><?=$sr['time']?></td>
        <td><?=$sr['description1']?></td>
        <td><?=$sr['browser']?></td>
        <td><?=$sr['unique_id']?></td>
        </tr>



<!-- Modal -->
<div class="modal fade" id="location<?=$sr['id']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><?=$sr['ip']?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
        <div style="border-radius:6px; border: 2px solid white;" class="container shadow-lg border border-light">
                            <img src="https://cache.ip-api.com/<?=$sr['lon']?>,<?=$sr['lat']?>,10" class="w-100" alt="ipLocation">
                        </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">hi</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->


        <?php
            }
        ?>

    </tbody>    


    <tfoot class="table-dark">
        <tr>
        <td align="left">নির্বাচিতঃ <span class='btn btn-danger'></span>
        </td>
        <td> &copy;MF CART: <span class="btn btn-info"></span></td>
        <td>TOTAL : <span class="btn btn-success"></span>
        </td>
        <?php?>
        <?php?>
        <td>মোটঃ <span class='btn btn-primary'></span></td>
        <td colspan="3" align="right">মোটঃ<span class='btn btn-warning text-dark'></span>টাকা৳</td>
    </tr>
    </tfoot>
</table>
</div>

</div>

<script src="../jsnav/bootstrap.bundle.js"></script>
    <script src="../jquery-3.4.1.min.js"></script>
</body>
</html>