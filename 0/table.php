<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        


    ?>
<div class="table-responsive">
    <table class="table w-75 m-auto table-light table-hover table-striped table-borderd border-danger">
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

</body>
</html>