<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.theme.min.css">
<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" type="text/css" href="custom/css/custom.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/datatables/datatables.min.css">
<link rel="stylesheet" type="text/css" href="assets/plugins/fileinput/css/fileinput.min.css">
<script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
<link rel="stylesheet" type="text/javascript" href="assets/jquery ui/jquery-ui.min.css">
<script type="text/javascript" src="assets/jquery ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/datatables.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Homes</a></li>
            <li class="active">Product</li>
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i>Manage Product</div>
            <div class="panel-body">
                <div class="remove-message"></div>
                <div class="div-action">
                    <button class="btn btn-default" data-toggle="modal" data-target="#addProductModal"><i class="glyphicon glyphicon-plus-sign"></i>Add Product</button>
                </div>




                <table class="table" id="manageProductTable" border="3">
                    <thead>
                        <tr>
                            <th>photo</th>
                            <th>product_name</th>
                            <th>quantity</th>
                            <th>rate</th>
                            <th style="width:15%;">status</th>
                        </tr>
                    </thead>
                    <?php
                    $localhost = "127.0.0.1";
                    $username = "root";
                    $password = "";
                    $dbname = "ims_test";
                    $connect = new mysqli($localhost, $username, $password, $dbname);
                    if ($connect->connect_error) {
                        die("Connection failed :" . $connect->connect_error);
                    }

                    $sql = "SELECT product_image,product_name,quantity,rate,status FROM product";
                    $result = $connect->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr><td>" . ("<img src=" . $row["product_image"]) . ' width=100px height="100px">' . "</td><td>" . $row["product_name"] . "</td><td>" . $row["quantity"] . "</td><td>" . $row["rate"] . "</td><td>" . $row["status"] . "</tr><td>";
                        }
                        echo "</table>";
                    } else {
                        "0 result";
                    }

                    $connect->close()

                    ?>
                </table>

            </div>
        </div>

    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="addProductModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss='modal' , aria-label="Close"> <span aria-hidden="true"></span></button>
                <h5 class="modal-title"><i class="fa fa-plus"></i>Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="post" enctype="multipart/form-data">
                <div class="modal-body" style="max-height:450px;overflow:auto">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">ProductImage :</label>
                        <div class="col-sm-10">
                            <div id="kv-avatar-errors-1" class="center-block" style="display:none"></div>
                            <div class="kv-avatar center-block text-center" style="width:200px">
                                <input id="productImage" name="productImage" type="file" class="file-loading" style="width:auto" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productName" class="control-label col-sm-2" for="pwd">Product Name :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="productName" name="productName" placeholder="productName" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Quantity" class="control-label col-sm-2" for="pwd">Quantity</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rate" class="control-label col-sm-2" for="pwd">rate :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rate" name="rate" placeholder="rate" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productStatus" class="control-label col-sm-2" for="pwd">status :</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="productStatus" name="productStatus" required>
                                <option value="">~~select~~</option>
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>

                </div>

            </form>

        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="editProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tit le">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="removeProductModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
?>
<script type="text/javascript" src="custom/js/product.js"></script>