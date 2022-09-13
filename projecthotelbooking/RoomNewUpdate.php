<?php
    include ("connection.php");
    if(isset($_POST['updateroombtn']))
    {
        $rid = $_POST['rid'];
        $room_type = $_POST['roomtype'];
        $room_no  = $_POST['roomno'];
        $availibility  = $_POST['availibility'];
        $price = $_POST['price'];

        $new_image = $_FILES['new_image']['name'];
        

        if($new_image=='')
        {            
            $update_filename = $_POST['old_image'];
        }
        else
        {
            $update_filename = "uploadroom/".$_FILES['new_image']['name'];
        }

        $query = "UPDATE room set Room_type = '$room_type', Room_no='$room_no', Availibility='$availibility', Price = '$price', images='$update_filename' where Room_id = '$rid'";
        $result = mysqli_query($con,$query);

        if($result){
            header('location:manageroom.php');
        }
        else{
            echo "error";
        }
    }

?>