<?php
    include("connection.php");

    $query = "DELETE FROM room WHERE Room_id ='$_GET[rid]'";
    
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>";
        echo "alert('Room Deleted Successfully!')";
        echo "</script>";
        
        header("location:manageroom.php");
    }
    else
    {
        echo "Sorry, Delete process failed";
    }

?>