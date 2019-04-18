<?php
include '../includes/connection.php';
if(isset($_POST['submit'])){
    // get data from webform 
    $cat_name = $_POST['cat_name'];
    
    $query = "insert into categories(cat_name)
              values('$cat_name')";
    // perform query 
    mysqli_query($con, $query);
    
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
                                    <input id="cc-pament" required="required" name="cat_name" type="text" class="form-control">
                                </div>
                                
                                <div class="row">
                                    <div>
                                        <button id="payment-button" type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                                            
                                            <span id="payment-button-amount">Create</span>
                                            
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
                <!-- DATA TABLE-->
                <div class="table-responsive m-b-40">
                    <table class="table table-borderless table-data3">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cat Name</th>                                
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "select * from categories";
                            $result = mysqli_query($con, $query);
                            while($adminSet = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$adminSet['cat_id']}</td>";                                
                                echo "<td>{$adminSet['cat_name']}</td>";
                                echo "<td><a href='edit_cat.php?cat_id={$adminSet['cat_id']}'>Edit</a></td>";
                                echo "<td><a href='delete_cat.php?cat_id={$adminSet['cat_id']}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE-->
            </div>
        </div>
    </div>

</div>
<?php include '../includes/admin_footer.php'; ?>