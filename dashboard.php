<!DOCTYPE html>
<html>

<head>
    <title>
        pms System test
    </title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.theme.min.css">
    <link rel="stylesheet" type="text/css" href="custom/css/custom.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">dashboard</a>
                    </li>



                </ul>
            </div>
        </div>
    </nav>
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

    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/purify.min.js"></script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/canvas-to-blob.min.js"></script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/plugins/sortable.min.js"></script>
    <script type="text/javascript" src="assets/plugins/fileinput/js/fileinput.min.js"></script>
    <script type="text/javascript" src="assets/plugins/datatables/datatables.min.js"></script>
</body>

</html>