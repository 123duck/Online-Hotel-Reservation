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

        <h1>User Details</h1>
    </div> 
    <div class = "addbtn">
        <a href="signup.php"><input type="button" value="Add User" id = "button"></a>
          
    </div>

    <div class = "table">
        <?php
              $con = mysqli_connect("localhost","root","","hotelbooking_db")or die();

              $result = mysqli_query($con, "SELECT * FROM user");

              $totalrow = mysqli_num_rows($result);

              $sn = 0;


              if($totalrow!=0)
              {
                  ?>

                    <table border="1" cellspacing="0">
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Addres</th>
                            <th>Age</th>
                            <th>Phone No</th>
                            <th>Email</th>
                            <th colspan="2">Action</th>
                        </tr>
                    
                    
             


                  <?php

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $sn = $sn + 1;

                        echo "<tr>
                                  <td> ".$sn."</td>
                                  <td> ".$row['username']."</td>
                                  <td> ".$row['Address']."</td>
                                  <td> ".$row['Age']."</td>
                                  <td> ".$row['Phone_no']."</td>
                                  <td> ".$row['Email']."</td>
                                  
                                  <td><a href='Updateuser.php?id=$row[User_id]'> Edit </a></td>
                                  <td><a href='delete.php?id=$row[User_id]'> Delete </a></td>

                                  </tr>";
                    }

              

              }
              else
              {
                  echo "No Record found";
              }


         ?>
</table><br>
<div class = "addbtn">
        <a href="admindashboard1.php"><input type="button" value="Dashboard" id = "button"></a>
          
    </div>
    </div>
</body>
</html>