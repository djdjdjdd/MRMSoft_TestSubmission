<?php
require_once 'php_action/db_connect.php';


session_start();

$errors=array();

if($_POST){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];

    if(empty($username) || empty($password) || empty($email)){
        if($username==""){
            $errors[]="Username is required";
        }

        if($password==""){
            $errors[]="password is required";
        }
        if($email==""){
            $errors[]="email is required";
        }
    }   else{
        $sql="SELECT * FROM  user WHERE username = '$username'";
        $result=$connect->query($sql);
        
        if ($result->num_rows>0){
            $mainSql="SELECT * FROM user WHERE username='$username' AND password='$password' AND email='$email' ";
            $mainResult=$connect->query($mainSql);

            if ($mainResult->num_rows==1){
                $value=$mainResult->fetch_assoc();
                $user_id=$value['user_id'];

                $_SESSION['userId']=$user_id;
                header('location:http://localhost:3000/product.php');


            } else{
                    $errors[]='Incorrrect Combo Of User Name And Password AND Email';
            }

        }   else{
            $errors[]='Username does Not Exist';
        }
                

            }
        }
        
    


 
?>

<!DOCTYPE html>

<html>

<head>
    <title>Ims System test</title>

    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.theme.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="custom/css/custom.css">
    <script type="text/javascript" src="assets/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/javascript" href="assets/jquery ui/jquery-ui.min.css">
    <script type="text/javascript" src="assets/jquery ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row vertical">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-tile">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <div class="messages">
                            <?php if($errors){
                                foreach($errors as $key =>$value){
                                        echo '<div class="alert alert-warning" role="alert">
                                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                                        '.$value.'</div>';
                                }
                            
                            }?> 
                        </div>
                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="loginForm">
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i>Sign-in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>

