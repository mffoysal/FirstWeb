<!-- Add Product -->
<div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-lg">
        <div class="modal-content modal-fullscreen-sm-down">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Product</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
            <form method="POST" action="addproduct.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                
                            </div>
                            <div class="col-md-9 form-floating">
                            <label class="control-label">Product Name:</label>    
                            <input type="text" class="form-control" name="pname" required>
                                
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                
                            </div>
                            <div class="col-md-9 form-floating">
                            <label class="control-label">Category:</label>
                            <select class="form-control" name="category">
                                    <?php
                                        $sql="select * from category order by categoryid asc";
                                        $query=$conn->query($sql);
                                        while($row=$query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $row['catname']; ?>"><?php echo $row['catname']; ?></option>
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
                                <input type="text" class="form-control" name="price" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo1:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo2:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo2">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo3:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo3">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Photo4:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="photo4">
                            </div>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Top Header:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="theader" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Top Offer:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="toffer" value="10" placeholder="Offer" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Card:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dcard" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Link:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="cardlink" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Card NOtification:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="notify" value="9">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Footer | Brand:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="footer" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Page Details 1:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="details1"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Page Details 2:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="details2"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER TITLE Details Page:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ftitle" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 1 Details Page:</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f1"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 2 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f2"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 3 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f3"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 4 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f4"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 5 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f5"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Pic Title:</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="pic_title" id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Available | or NOT:</label>
                            </div>
                            <div class="col-md-9">
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Yes|No:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="avail">
                                                

                                                        <option value="Available । ">Yes</option>
                                                        <option value="Not Available । ">NO</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Availability Color:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="avail_color">
                                                        <option value="success">GREEN</option>
                                                        <option value="danger">RED</option>
                                            </select>
                                        </div>
                                    
                                </div>
                    </div>

                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Status Yes|No:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status_color">
                                                

                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    
                                </div>
                    </div>

                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Card Header Color:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="card_h_color">
                                                
                                                        <option value="info">INFO</option>
                                                        <option value="primary">PRIMARY</option>
                                                        <option value="secondary">SECONDARY</option>
                                                        <option value="danger">DANGER</option>
                                                        <option value="dark">DARK</option>
                                                        <option value="warning">WARNING</option>
                                                        <option value="light">LIGHT</option>
                                                        <option value="cyan">CYAN</option>
                                                        <option value="teal">TEAL</option>
                                                        <option value="gray">GRAY</option>
                                                        <option value="black">BLACK</option>
                                                        <option value="yellow">YELLOW</option>
                                                        <option value="green">GREEN</option>
                                                        <option value="red">RED</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Card Body Color:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="card_body_color">
                                                
                                                        <option value="">select</option>
                                                        <option value="warning">WARNING</option>
                                                        <option value="primary">PRIMARY</option>
                                                        <option value="info">INFO</option>
                                                        <option value="secondary">SECONDARY</option>
                                                        <option value="danger">DANGER</option>
                                                        <option value="dark">DARK</option>
                                                        
                                                        <option value="light">LIGHT</option>
                                                        <option value="cyan">CYAN</option>
                                                        <option value="teal">TEAL</option>
                                                        <option value="gray">GRAY</option>
                                                        <option value="black">BLACK</option>
                                                        <option value="yellow">YELLOW</option>
                                                        <option value="green">GREEN</option>
                                                        <option value="red">RED</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Card Body Color Syle CSS:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="card_b_color" value="yellow">
                                        </div>
                                    
                                </div>
                    </div>
                    <!-- <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Color:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category">
                                                

                                                        <option value="primary">PRIMARY</option>
                                                        <option value="info">INFO</option>
                                                        <option value="secondary">SECONDARY</option>
                                                        <option value="danger">DANGER</option>
                                                        <option value="dark">DARK</option>
                                                        <option value="warning">WARNING</option>
                                                        <option value="light">LIGHT</option>
                                                        <option value="cyan">CYAN</option>
                                                        <option value="teal">TEAL</option>
                                                        <option value="gray">GRAY</option>
                                                        <option value="black">BLACK</option>
                                                        <option value="yellow">YELLOW</option>
                                                        <option value="green">GREEN</option>
                                                        <option value="red">RED</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    
                                </div>
                    </div>
                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Color:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="category">
                                                

                                                        <option value="primary">PRIMARY</option>
                                                        <option value="info">INFO</option>
                                                        <option value="secondary">SECONDARY</option>
                                                        <option value="danger">DANGER</option>
                                                        <option value="dark">DARK</option>
                                                        <option value="warning">WARNING</option>
                                                        <option value="light">LIGHT</option>
                                                        <option value="cyan">CYAN</option>
                                                        <option value="teal">TEAL</option>
                                                        <option value="gray">GRAY</option>
                                                        <option value="black">BLACK</option>
                                                        <option value="yellow">YELLOW</option>
                                                        <option value="green">GREEN</option>
                                                        <option value="red">RED</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    
                                </div>
                    </div> -->
                    


                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- modal 2 start -->



<div class="modal fade" id="addproduct1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-sm-down modal-lg modal-dialog-centered">
        <div class="modal-content modal-fullscreen-sm-down">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Product Details</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
            <form method="POST" action="addproduct1.php" >
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Product ID:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="number" class="form-control" name="pro_id" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Orginal Price:</label>
                            </div>
                            <div class="col-md-9">
                            <input type="number" class="form-control" name="o_price">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Page Details 1:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="details1"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Page Details 2:</label>
                            </div>
                            <div class="col-md-9">
                                <textarea class="form-control" name="details2"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER TITLE Details Page:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="ftitle" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 1 Details Page:</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f1"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 2 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f2"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 3 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f3"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 4 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f4"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">FOOTER 5 Details Page::</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="f5"  id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Details Pic Title:</label>
                            </div>
                            <div class="col-md-9">
                            <textarea class="form-control" name="pic_title" id="" cols="30" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Available | or NOT:</label>
                            </div>
                            <div class="col-md-9">
                            <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Yes|No:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <select class="form-control" name="status">
                                                

                                                        <option value="Available । প্রোডাক্ট ফুরিয়ে যাওয়ার আগে অর্ডার করুন">Yes</option>
                                                        <option value="Not Available । এই মুহূর্তে প্রোডাক্ট পরিমাণ ০">NO</option>
                                                      
                                               
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="form-group">
                                <div class="row">
                                        <div class="col-md-3" style="margin-top:7px;">
                                            <label class="control-label">Details page modal Title:</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="d_title" >
                                        </div>
                                    
                                </div>
                    </div>
        


                </div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>








<!-- Add Category -->
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add New Category</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="addcategory.php" enctype="multipart/form-data">
                    <div class="form-group" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-3" style="margin-top:7px;">
                                <label class="control-label">Category Name:</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="cname" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





<!-- show producdt details -->



<div class="modal fade" id="addproduct2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-fullscreen">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Product Details</h4></center>
            </div>
            <div style="overflow:scroll" class="modal-body">
            
                            <div class="container ">
                            <h1 class="page-header text-center">Details Setting</h1>
                            
                            <div style="margin-top:10px;">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>Product ID</th> 
                                        <th>Price</th>
                                        <th>Action</th>
                                        <td>Status</td>
                                        <td>Details Title</td>
                                        <td>Pic Title</td>
                                        <td>Details1</td>
                                        <td>Details2</td>
                                        <td>Footer Title</td>
                                        <td>footer1</td>
                                        <td>footer2</td>
                                        <td>footer3</td>
                                        <td>footer4</td>
                                        <td>footer5</td>
                                    </thead>
                                    <tbody>
                                        <?php
                                           
                                            $sqlii="SELECT * FROM details_product ";
                     
                                            $query2=$conn->query($sqlii);
                                            while($row1=$query2->fetch_array()){
                                                ?>
                                                <tr>
                                                    <td><?php echo $row1['pro_id']?></td>
                                                    
                                                    <td>&#2547; <?php echo number_format($row1['orginal_price'], 2); ?></td>
                                                    <td>
                                                        <a href="#editdetails<?php echo $row1['id']; ?>" data-toggle="modal" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-pencil"></span> Edit</a> || <a href="#deletedetails<?php echo $row1['id']; ?>" data-toggle="modal" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                                        <?php include('product_modal.php'); ?>
                                                    </td>
                                                    <td><?php echo $row1['status']; ?></td>
                                                    <td><?php echo $row1['d_title']; ?></td>
                                                    <td><?php echo $row1['pic_title']; ?></td>
                                                    <td><?php echo $row1['details1']; ?></td>
                                                    <td><?php echo $row1['details2']; ?></td>
                                                    <td><?php echo $row1['footer_title']; ?></td>
                                                    <td><?php echo $row1['footer1']; ?></td>
                                                    <td><?php echo $row1['footer2']; ?></td>
                                                    <td><?php echo $row1['footer3']; ?></td>
                                                    <td><?php echo $row1['footer4']; ?></td>
                                                    <td><?php echo $row1['footer5']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
</div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                <button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
          
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
























