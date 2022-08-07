 <?php
    require_once  'core.php';
    $valid['success'] = array('success' => false, 'messages' => array());
    if ($_POST) {
        $productName = $_POST['productName'];
        $Quantity = $_POST['Quantity'];
        $rate = $_POST['rate'];
        $productStatus = $_POST['productStatus'];
        $type = explode('.', $_FILES['productImage']['name']);
        $type = $type[count($type) - 1];
        $url = '../assets/images/' . uniqid(rand()) . '.' . $type;
        // echo $url

        if (in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'PNG', 'JPEG', 'GIF'))) {
            if (is_uploaded_file($_FILES['productImage']['tmp_name'])) {
                if (move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {

                    $sql = "INSERT INTO product (product_name,product_image,quantity,rate,status) VALUES ('$productName','$url','$Quantity','$rate','$productStatus')";
                    if ($connect->query($sql) == TRUE) {
                        $valid['success'] = true;
                        $valid['messages'] = 'Successfully added';
                    } else {    
                        $valid['success'] = false;
                        $valid['messages'] = "Error While adding";
                    }
                } else {
                    return false;
                }
            }
        }
    

        echo json_encode($valid);
    }