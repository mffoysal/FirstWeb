<!-- Edit Product -->
<div class="modal fade" id="editproduct<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Product</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="editproduct.php?product=<?php echo $row['id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Product Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['title']; ?>" name="pname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category:</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control" name="category">
                                    <option value="<?php echo $row['categoryname']?>"><?php echo $row['categoryname']?></option>
                                    <?php
                                        $sql="select * from category where catname != '".$row['categoryname']."'";
                                        $cquery=$conn->query($sql);

                                        while($crow=$cquery->fetch_array()){
                                            ?>
                                            <option value="<?php echo $crow['catname']; ?>"><?php echo $crow['catname']; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Price:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo $row['price']; ?>" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="img">
                            </div>
                        </div>
                    </div>
                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Product -->
<div class="modal fade" id="deleteproduct<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Product</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row['title']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="delete_product.php?product=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>







<!-- details edit delete -->


<div class="modal fade w-75" id="editdetails<?php echo $row1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div style="width:100%" class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form method="POST" action="editdetails.php?details=<?php echo $row1['id']; ?>" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 form-floating">
                            <label class="control-label">Product ID:</label>    
                            <input type="text" class="form-control w-50" value="<?php echo $row1['pro_id']; ?>" name="pro_id">
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 ">
                            
                            <label class="control-label">Orginal Price:</label>
                            
                                <input  type="text" class="form-control" value="<?php echo $row1['orginal_price']; ?>" name="orginal_price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            
                            <div style="width:90%" class="col-md-9 w-50">
                            <label class="control-label">Details Tittle:</label>

                            <input  type="text" class="form-control" value="<?php echo $row1['d_title']; ?>" name="d_title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                             <div style="width:90%" class="col-md-9 w-50">
                             
                             <label class="control-label">Pic Title</label>   
                             <input type="text" class="form-control" value="<?php echo $row1['pic_title']; ?>" name="pic_title">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">Status</label>    
                            <input  type="text" class="form-control" value="<?php echo $row1['status']; ?>" name="status">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">Details1:</label>    
                            <input  name="details1" class="form-control" id="" value="<?php echo $row1['details1'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">Details2:</label>    
                            <input name="details2" class="form-control" id="" value="<?php echo $row1['details2'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">Footer Title:</label>    
                            <input name="footer_title" class="form-control" id="" value="<?php echo $row1['footer_title'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">footer1:</label>    
                            <input name="f1" class="form-control" id="" value="hllw <?php echo $row1['footer1'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                                   
                                <label class="control-label">footer2:</label>
                                <input name="f2" class="form-control" id="" value="<?php echo $row1['footer2'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">footer3:</label>    
                            <input  name="f3" class="form-control" id="" value="<?php echo $row1['footer3'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">footer4:</label>    
                            <input  name="f4" class="form-control" id="" value="<?php echo $row1['footer4'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div style="width:90%" class="col-md-9 w-50">
                            
                            <label class="control-label">footer5:</label>    
                            <input  name="f5" class="form-control" id="" value="<?php echo $row1['footer5'] ?>" cols="30">
                            </div>
                        </div>
                    </div>
                    


                </div>
			</div>
            <div style="width:95%" class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Delete Product -->
<div class="modal fade" id="deletedetails<?php echo $row1['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Details</h4></center>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><?php echo $row1['pro_id']; ?></h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <a href="deletedetails.php?details=<?php echo $row1['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>