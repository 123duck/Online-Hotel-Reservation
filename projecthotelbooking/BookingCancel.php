<?php
    include("connection.php");

    $query = "DELETE FROM booking WHERE Booking_id ='$_GET[id]'";
    
    $result = mysqli_query($con,$query);

    if($result)
    {
        echo "<script>";
        echo "alert('booking Deleted Successfully!')";
        echo "</script>";
        
        header("location:BookingView.php");
    }
    else
    {
        echo "Sorry, Delete process failed";
    }

?>