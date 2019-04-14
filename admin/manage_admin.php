<?php
include '../includes/connection.php';
if(isset($_POST['submit'])){
    // get data from webform 
    $admin_email    = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $full_name      = $_POST['full_name'];
    
    $query = "insert into admin(admin_email,admin_password,full_name)
              values('$admin_email','$admin_password','$full_name')";
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
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="" method="post" novalidate="novalidate">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Admin Email</label>
                                    <input id="cc-pament" name="admin_email" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group has-success">
                                    <label for="cc-name" class="control-label mb-1">Admin Password</label>
                                    <input id="cc-name" name="admin_password" type="password" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                           autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                    <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="cc-number" class="control-label mb-1">Full Name</label>
                                    <input id="cc-number" name="full_name" type="tel" class="form-control cc-number identified visa" value="" data-val="true"
                                           data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                                           autocomplete="cc-number">
                                    <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
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
                                <th>Email</th>
                                <th>Full Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "select * from admin";
                            $result = mysqli_query($con, $query);
                            while($adminSet = mysqli_fetch_assoc($result)){
                                echo "<tr>";
                                echo "<td>{$adminSet['admin_id']}</td>";
                                echo "<td>{$adminSet['admin_email']}</td>";
                                echo "<td>{$adminSet['full_name']}</td>";
                                echo "<td><a href='edit_admin.php?admin_id={$adminSet['admin_id']}'>Edit</a></td>";
                                echo "<td><a href='delete_admin.php?admin_id={$adminSet['admin_id']}'>Delete</a></td>";
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