<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        #button{
            padding:12px 16px;
            font-size:20px;
            color:white;
            background-color: blue;
            border:none;
            border-radius: 2px;
            margin-bottom: 15px;
        }
        .header
        {
            padding:30px;
            background-color: pink;
            margin-bottom: 15px;
        }
        .header h1
        {
            text-align: center;
        }
        th, td
        {
            padding:10px;
        }
    </style>
</head>
<body>
    <div class="header">

        <h1>Booking Details</h1>
    </div> 

    <div class = "table">
        <?php
            include ("connection.php");

            $result = mysqli_query($con, "SELECT * FROM booking");
            $sn = 0;
            
            echo "<table border='1' cellspacing='0'>";
                    echo "<tr style= background-color:lightblue; color:white;>
                            <th>SN</th>
                            <th>Room No</th>
                            <th>Customer name</th>
                            <th>Customer Phone</th>
                            <th>Check_in Date</th>
                            <th>Check_out Date</th>
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
                    } 
         ?>
</table><br>
<div class = "addbtn">
        <a href="admindashboard1.php"><input type="button" value="Dashboard" id = "button"></a>
          
    </div>
    </div>
</body>
</html>