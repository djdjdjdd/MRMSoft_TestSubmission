<?php

$localhost="127.0.0.1";
$username="root";
$password="";
$dbname="ims_test";


$connect = new mysqli ($localhost,$username,$password,$dbname);  

if($connect -> connect_error){
    die("Connection failed :" . $connect -> connect_error);
} else{
    echo "Successfully Connected";
}

?>  