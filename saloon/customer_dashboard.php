<?php
    if(isset($_GET['status'])){
       echo '
        <script>    
    
            alert("Added successfully Please wait for your confirmation :) ");
    
        </script>
    ';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            margin: 0;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            position: fixed;
            top: 0;
            width: 100%;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active) {
            background-color: #111;
        }
        img {
            display: inline;
        }
        h3 {
            display: inline;
        }
        .active {
            background-color: #04AA6D;
        }
        #services {
            text-align: center;
            padding: 50px;
        }
        .service-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }
        .service {
            margin: 30px;
            text-align: center;
            max-width: 350px;
        }
        .service img {
            max-width: 100%;
            height: auto;
        }
        #about {
            text-align: center;
            padding: 50px;
        }
        #contact {
            text-align: center;
            padding: 50px;
        }
        form {
            display: inline-block;
            text-align: left;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            display: block;
            margin-bottom: 20px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 3px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        input[type="submit"] {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 10px 30px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #111;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="appointment.php">Appointment</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="status.php">Pending status</a></li>
        <li><a href="analysis.php">Analysis</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <p>We offer a range of hair, nail, skin, and massage therapy services</p>
    <section id="services">
        <h2>Our Services</h2>
        <hr>
        <div class="service-container">
            <div class="service">
                <img src="hair.jpg" alt="Hair">
                <h3>Hair Services</h3>
                <p>We offer haircuts, styling, coloring, and more to help you look your best.</p>
            </div>
            <div class="service">
            <img src="skin.jpg" alt="Skin">
                <h3>Skin Services</h3>
                <p>Our skin care specialists provide a variety of treatments including facials, peels, and more.</p>
            </div>
            <div class="service">
                <img src="massage.jpg" alt="Massage">
                <h3>Massage Therapy</h3>
                <p>Relax and rejuvenate with our selection of massage therapy options.</p>
            </div>
        </div>
    </section>
    <section id="about">
        <h2>About Us</h2>
        <hr>
        <p>We are a full-service salon and spa dedicated to providing our clients with the highest level of service and expertise. Our team of experienced professionals are committed to helping you look and feel your best.</p>
    </section>
    <section id="contact">
        <h2>Contact Us</h2>
        <hr>
        <form action="submit.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>
            <input type="submit" value="Submit">
        </form>
    </section>
</body>
</html>