<?php
    include("connection.php");

    $query = "DELETE FROM user WHERE User_id ='$_GET[id]'";
    
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>";
        echo "alert('User Deleted Successfully!')";
        echo "</script>";
        
        header("location:ManageUser.php");
    }
    else
    {
        echo "Sorry, Delete process failed";
    }

?>