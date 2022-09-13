<?php
    include ("connection.php");

    $id = $_POST['uid'];
    $name = $_POST['username'];
    $address = $_POST['Address'];
    $age = $_POST['Age'];
    $phone = $_POST['Phone_no'];
    $email = $_POST['Email'];

    $query = "UPDATE user set username = '$name' ,Address='$address', Age='$age', Phone_no = '$phone', Email='$email' where User_id = '$id'";
    $result = mysqli_query($con,$query);

    if($result){
        header('location:ManageUser.php');
    }
    else{
        echo "error";
    }
?>