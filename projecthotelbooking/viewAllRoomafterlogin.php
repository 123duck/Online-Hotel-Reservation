<?php
// super global variable
session_start();
if(!isset($_SESSION['user']))
{
    header("Location:login.php");
}
?>



<!doctype html>
<html lang="en">
<head>
    
    <title>Online Hotel Booking</title>
    <!--Font awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container"><h4>GG Hotel </h4>
            <nav class="nav">
                <a href="index.php" class="logo">
                <img src="./images/logo.png"  alt="">
                </a>
                <div class="hamburger-menu">
                    <i class="fa fa-bars" aria-hidden="true""></i>
                    <i class="fas fa-times"></i>
                </div>
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="afterlogin.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                       <a href="about.html" class="nav-link">About</a>
                   </li>
                   <li class="nav-item">
                       <a href="contact.html" class="nav-link">Contact</a>
                   </li>
                   <li class="nav-item">
                       <a href="myacc.php" class="nav-link " id = "log">My-Account</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>  
      
    <main>      
        <section class="hotel">
            <div class="container">
                <h5 class="section-head">
                    <span class="heading">Explore</span>
                    <span class="sub-heading">Our Comfy Rooms</span>
                </h5>
                <div class="grid">

                    <!-- insert room from database -->
                    <?php

                        include ("connection.php");

                        $query = "SELECT * FROM room";
                        $result = mysqli_query($con, $query);
                        $count = 0;
                        if($result)
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $count++;
                                $rid = $row['Room_id'];
                                $room_no = $row['Room_no'];
                                $room_availability=$row['Availibility'];
                                $room_type = $row['Room_type'];
                                $price = $row['Price'];
                                $picture = $row['images'];
                                $offer = $row['offer'];
                                
                                if($offer!=0)
                                {
                                    $offer = $row['offer']."% OFF";
                                    $offer_room_type = $row['Room_type'];
                                    $offer_picture = $row['images'];
                                }
                                else{
                                    $offer = "";
                                }
                                          

                        echo "<div class='grid-item featured-hotels'>
                        <img src='$picture' alt='' class='hotel-image' > 
                        <h6 class='hotel-name'>$room_no / Available=$room_availability</h6>
                        <h5 class='hotel-name'>$room_type</h5>
                        <span class='hotel-price'>$price.NPR/Night</span>
                                <div class='offerr' style='color:white; font-size:22px;'>$offer</div>                            
                        <a href='book.php?room_no=$room_no' class='btn btn-gradient'>Book Now
                            <span class='dots'><i class='fas fa-ellipsis-h'></i></span>
                        </a>
                        </div>";
                    }
                }  

            ?>

                </div>
            </div>
        </section>
   </main>

    <!--FO0TER-->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-content-brand">
                    <a href="afterlogin.php" class="logo">
                     <img  class="logo-image" src="./images/logo.PNG" alt="">
                    </a>
                    <div class="paragraph">
                        Why waste your time running around to find the suitable hotels when you can simply book your desired rooms in one click.
                    </div>
                </div>
                    <div class="social-media-wrap">
                        <h4 class="footer-heading">Follow Us </h4>
                        <div class="social-media">
                        <a href="#" class="sm-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="sm-link"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" class="sm-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="sm-link"><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <script src="main.js"></script>
</body>
</html>