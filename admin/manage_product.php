<?php
include '../includes/connection.php';
if (isset($_POST['submit'])) {
    $path = "../uploads/";
    $tmp_name = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    move_uploaded_file($tmp_name, $path . $file_name);

    // get data from webform 
    $pro_name = $_POST['pro_name'];
    $pro_desc = $_POST['pro_desc'];
    $pro_price = $_POST['pro_price'];
    $cat_id = $_POST['cat_id'];

    $query = "insert into products(pro_name,pro_desc,pro_price,pro_image,cat_id)
              values('$pro_name','$pro_desc','$pro_price','$file_name',$cat_id)";
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
                            <form action="" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Product Name</label>
                                    <input id="cc-pament" name="pro_name" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                </div>
                                <div class="form-group">
                                    <label for="cc-payment" class="control-label mb-1">Category Name</label>
                                    <select id="cc-pament" name="cat_id" class="form-control">
                                    <?php
                                    $query = "select * from categories";
                                    $result = mysqli_query($con, $query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='{$row['cat_id']}'>{$row['cat_name']}</option>";
                                    }
                                        ?>
                                        </select>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Description</label>
                                        <input id="cc-name" name="pro_desc" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                               autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Price</label>
                                        <input id="cc-name" name="pro_price" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card"
                                               autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="cc-number" class="control-label mb-1">Product Image</label>
                                        <input id="cc-number" name="image" type="file" class="form-control cc-number identified visa" value="" data-val="true"
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
    $query = "select * from products";
    $result = mysqli_query($con, $query);
    while ($adminSet = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$adminSet['pro_id']}</td>";
        echo "<td>{$adminSet['pro_name']}</td>";
        echo "<td><img src='../uploads/{$adminSet['pro_image']}' width='200' height='300'></td>";
        echo "<td><a href='edit_admin.php?admin_id={$adminSet['pro_id']}'>Edit</a></td>";
        echo "<td><a href='delete_admin.php?admin_id={$adminSet['pro_id']}'>Delete</a></td>";
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