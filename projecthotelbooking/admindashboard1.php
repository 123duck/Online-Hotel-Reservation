<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Admin Panel</title>
</head>
<style>
   
</style>
<body>
    <div class="side-menu">
        <div class="logo">
        <a href="index.php" ><img src="./images/logo.PNG" alt="" height="100px" width="100px" ></a>
        </div>
        <ul>
        <li> <span class="las la-igloo"></span>
            <span>Dashboard</span></li>

            <li> <a href="manageUser.php"><span class="las la-users"></span>
            <span>Users</span></a></li>
            
            <li> <a href="Manageroom.php"><span class="las la-clipboard-list"></span>
            <span>Manage Rooms</a></span></li>
            
            <li> <a href="BookingView.php"><span class="las la-calendar"></span>
            <span>Booking</span></a></li>
            
            <li> <a href="login.php"><span class="las la-sign-out-alt"></span>
            <span>Logout</span></a></li>   
        </ul>
    </div>
    <div class="container">
       
        <div class="content">
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2> Booking </h2>
                        <a href="BookingView.php" class="btn">View All</a>
                    </div>
                    <?php
            include ("connection.php");

            $result = mysqli_query($con, "SELECT * FROM booking");
            $sn = 0;
            
            echo "<table>";
                    echo "<tr>
                            <th>SN</th>
                            <th>Room No</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Check_in</th>
                            <th>Check_out</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th colspan='2'>Actions</th>
                        </tr>";
                    

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $sn = $sn + 1;

                        echo "<tr>
                                  <td> ".$sn."</td>
                                  <td> ".$row['Room_no']."</td>
                                  <td> ".$row['Username']."</td>
                                  <td> ".$row['Phone_no']."</td>
                                  <td> ".$row['Check_in']."</td>
                                  <td> ".$row['Check_out']."</td>
                                  <td> ".$row['Adults']."</td>
                                  <td> ".$row['Children']."</td>
                                  
                                  <td><a href='BookingCancel.php?id=$row[Booking_id]'> Cancel </a></td>

                                </tr>";
                            if($sn==8)
                            {
                                break;
                            }
                    } 
         ?>
                    <!-- <table>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>room Types</th>
                            <th>room capicity</th>
                            <th>room id</th>
                            <th>Address</th>
                        </tr>
                        <tr>
                            <td>indira guragai</td>
                            <td>indira@gmail.com</td>
                            <td>single room</td>
                            <td>vip</td>
                            <td>100</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>Miss jayanti Ghising</td>
                            <td>jayanti@gmail.com</td>
                            <td>single</td>
                            <td>vip</td>
                            <td>103</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>kripa chalise</td>
                            <td>kripa@gmail.com</td>
                            <td>double</td>
                            <td>veconomy</td>
                            <td>110</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        
                    </table> -->
            
            </div>
        </div>
    </div>
</body>

</html>