<?php
include '../includes/connection.php';
$query  = "select * from categories where cat_id = {$_GET['cat_id']}";
$result = mysqli_query($con, $query);
$catSet = mysqli_fetch_assoc($result);


if(isset($_POST['submit'])){
    // get data from webform 
    $cat_name = $_POST['cat_name'];
    
    $query = "update categories set cat_name='$cat_name'
        where cat_id = {$_GET['cat_id']}";
    // perform query 
    mysqli_query($con, $query);
    header("location:manage_category.php");
    
}

?>
<?php include '../includes/admin_header.php'; ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">Manage Category</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Category</h3>
                            </div>
                            <hr>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <input id="cc-pament" required="required" name="cat_name" type="text" class="form-control"
                                      value="<?php echo $catSet['cat_name'] ?>">
                                </div>
                                
                                <div class="row">
                                    <div>
                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                            
                                            <span id="payment-button-amount">Update</span>
                                            
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>

</div>
<?php include '../includes/admin_footer.php'; ?>