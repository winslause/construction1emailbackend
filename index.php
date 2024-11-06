<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Composer's autoloader
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];  // Sender's email from the form
  $message = $_POST['message'];

  // Validate inputs
  if (!empty($name) && !empty($email) && !empty($message)) {

    // PDO Database connection
    $dsn = 'mysql:host=localhost;dbname=building';  // Update with your database name
    $db_username = 'root';  // Update with your DB username
    $db_password = '';  // Update with your DB password

    try {
      // Connect to the database
      $pdo = new PDO($dsn, $db_username, $db_password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Insert the form data into the database
      $sql = "INSERT INTO form_submissions (name, email, message) VALUES (:name, :email, :message)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);

      // Send email using PHPMailer
      $mail = new PHPMailer(true);

      try {
        // Server settings
        $mail->SMTPDebug = 0;                               // Disable verbose debug output
        $mail->isSMTP();                                    // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                             // Enable SMTP authentication
        $mail->Username = 'wenbusale383@gmail.com';         // Your company email address
        $mail->Password = 'bfmd neqb ltiv txrp';              // App Password (or regular password if no 2FA)
        $mail->SMTPSecure = 'tls';                          // Enable TLS encryption
        $mail->Port = 587;                                  // TCP port to connect to

        // Set the sender's email from the form (customer's email)
        $mail->setFrom($email, $name);                      // Customer's email and name

        // Set receiver's email (your company email)
        $mail->addAddress('wenbusale383@gmail.com');         // Receiver's email (you)

        // Content
        $mail->isHTML(true);                                // Set email format to HTML
        $mail->Subject = 'New email from your website';
        $mail->Body    = "Name: $name<br>Email: $email<br>Message: $message";

        // Send the email
        $mail->send();
        echo '<script>alert("Email Message has been sent!")</script>';
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }

      // echo "<Form submitted successfully!";
    } catch (PDOException $e) {
      echo "Database Error: " . $e->getMessage();
    }
  } else {
    echo "All fields are required.";
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <title>const</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta name="description" content="We are working through online path, here we are sharing online links. As per issues and problems we can also serve at community level. Our service is not limited in one sector we provide all kinds of services in social, economic, financial, educational, emotional cultural and environmental issues.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <style>
    /* Navbar styles */
    .navbar {

      background-color: #ffffff;
      padding: 15px 0;

    }

    .navbar-brand {
      font-weight: bold;
      color: #0056b3 !important;
      font-size: 24px;
    }

    .nav-link {
      color: #36abdd !important;
      font-weight: 500;
      transition: color 0.3s ease, transform 0.2s ease;
      padding: 10px 15px;
    }

    .nav-link:hover {
      color: #0056b3 !important;
      transform: translateY(-2px);
    }

    .navbar-nav .nav-item {
      margin-right: 10px;
    }

    /* Responsive navbar toggler on the left and search icon on the right */
    @media (max-width: 991px) {

      /* Move the navbar-toggler to the left */
      .navbar-toggler {
        order: -1;
        /* Places the toggler before the brand */
      }

      /* Move the search icon to the right */
      .navbar-nav {
        width: 100%;
        display: flex;
        justify-content: space-between;
      }

      .navbar-nav .search-icon {
        order: 2;
        /* Moves search icon to the far right */
        margin-left: auto;
        /* Align it to the right */
      }

      .navbar-nav .nav-item {
        order: 1;
        /* Other menu items stay in the middle */
      }

      .navbar-brand {
        max-width: 80%;
      }

      .brand-text {
        font-size: 18px;
      }
    }

    /* Project image styles */
    .project-image,
    .project-image1 {
      filter: grayscale(0%);
      transition: filter 0.6s ease-in-out;
    }

    .project-image:hover,
    .project-image1:hover {
      filter: grayscale(0%);
    }

    @media (hover: none) {

      .project-image,
      .project-image1 {
        filter: grayscale(0%);
        transition: filter 0.6s ease-in-out;
      }

      .project-image:active,
      .project-image1:active {
        filter: grayscale(0%);
      }
    }

    /* Fading effect for project-image1 */
    .project-image1 {
      position: absolute;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }

    .project-image1.show {
      opacity: 1;
    }

    .navbar-brand {
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .brand-text {
      font-family: "Times New Roman", Times, serif;
      font-weight: 700;
      font-size: 24px;
      display: block;
      margin-bottom: 5px;
    }

    .navbar-brand p {
      font-family: "Lucida Calligraphy", cursive;
      font-size: 14px;
      margin: 0;
      display: block;
      color: black;
      line-height: 1;
    }

    @media (max-width: 576px) {
      .brand-text {
        font-size: 16px;
      }

      .navbar-brand p {
        font-size: 10px;
      }
    }

    .bg-dark a:hover {
      color: #0056b3 !important;
      transition: color 0.3s ease;
    }

    @media (max-width: 991px) {
      .bg-dark .d-flex {
        align-items: center;
        justify-content: center;
        text-align: center;
      }

      .bg-dark .d-flex.flex-column.flex-lg-row.gap-2.gap-lg-4.justify-content-lg-end {
        flex-direction: row !important;
        justify-content: center;
      }

      .bg-dark .col-lg-8,
      .bg-dark .col-lg-4 {
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
      }

      .bg-dark .d-flex.flex-column.flex-lg-row {
        align-items: center;
      }
    }

    @media (max-width: 991px) {
      .navbar .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .navbar-toggler {
        order: 1;
      }

      .navbar-brand {
        order: 2;
        margin: 0;
      }

      .search-icon-mobile {
        order: 3;
        margin-left: auto;
      }

      .navbar-collapse {
        order: 4;
      }

      .search-icon {
        display: none;
      }
    }

    /* Update the search bar styles */
    #searchBar {
      transform: translateY(-100%);
      transition: transform 3s ease;
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1000;
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
      padding: 1rem 0;
    }

    #searchBar.show {
      transform: translateY(100%);
    }

    /* Center the carousel text */
    .carousel-caption {
      position: absolute;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;

      color: white;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);

    }

    /* Ensure the caption is visible on all screen sizes */
    @media (max-width: 768px) {
      .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent background */
      }

      #why {
        font-size: 30px;
      }
    }

    /* Make the text bold */
    .carousel-caption h1,
    .carousel-caption p {
      font-weight: bold;
    }

    /* Adjust font size for responsiveness */
    @media (min-width: 768px) {
      .carousel-caption h1 {
        font-size: 3rem;
      }

      .carousel-caption p {
        font-size: 1.5rem;
      }
    }

    h2 {
      font-size: 80px;
    }

    @media (max-width: 768px) {
      h2 {
        font-size: 50px;
      }

      #why {
        font-size: 30px;
      }
    }

    .icon-circle {
      width: 100px;
      height: 100px;
      border: 10px solid #50C9F5;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto;
      margin-bottom: 20px;
    }

    .icon-circle-inner {
      width: 80px;
      height: 80px;
      background-color: #072D4B;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #why {
      color: #50C9F5;
      text-align: center;
      margin-bottom: 50px;
    }

    .service-title {
      color: #50C9F5;
      margin-top: 15px;
    }

    h1 {
      font-size: 80px;

    }

    /* General layout for full-width text and image centered at the bottom on small screens */
    .custom-layout .row {
      display: flex;
      flex-direction: column;
      /* Default layout (image below text) */
    }

    .custom-layout .content {
      padding: 0 20px;
      /* Adds padding around text */
    }

    /* Center text for smaller screens */
    .custom-layout .text-center {
      text-align: center;
    }

    /* Image container adjustments */
    .custom-layout .image-container {
      margin-top: 20px;
      /* Adds space between text and image for small screens */
    }

    /* For large screens (from 992px and above) */
    @media (min-width: 992px) {
      .custom-layout .row {
        flex-direction: row;
        /* Row layout for large screens */
        align-items: center;
        /* Vertically align image and text */
      }

      .custom-layout .content {
        width: 60%;
        /* Text takes 60% of the width */
        text-align: left;
        /* Align text to the left */
      }

      .custom-layout .image-container {
        width: 40%;
        /* Image takes the remaining 40% */
        margin-top: 0;
        /* Remove top margin */
        text-align: right;
        /* Align the image to the right */
      }

      /* Adjust image size on large screens if necessary */
      .custom-layout img {
        max-width: 100%;
        height: auto;
      }
    }

    .text-deepblue {
      color: deepskyblue;
    }

    .text-darkgray {
      color: #555;
    }

    .card:hover {
      transform: scale(1.05);
    }


    /* Adjust text size for smaller screens */
    @media (max-width: 768px) {
      #contact-us h2 {
        font-size: 1.8rem;
      }

      #contact-us p {
        font-size: 1rem;
      }
    }

    /* Adjust form fields for visual appeal */
    .form-control-lg {
      border-radius: 0.25rem;
      border: 1px solid #ccc;
    }

    .form-control-lg::placeholder {
      color: #555;
    }

    /* Styling for the button */
    .btn-light {
      background-color: #ffffff;
      color: #0096c7;
      font-weight: bold;
      border-radius: 0.25rem;
    }

    .btn-light:hover {
      background-color: #005f87;
      color: #ffffff;
    }


    footer {
      color: white;
      position: relative;
    }

    /* Ensure footer content has margin from the edges of the background image */
    footer .container {
      position: relative;
      z-index: 2;
    }

    /* Light-blue overlay with padding and border-radius for rounded corners */
    footer .overlay {
      background-color: rgba(173, 216, 230, 0.8);
      /* Light-blue shading */
      padding: 20px;
      margin: 20px;
      /* Space from the edges */
      border-radius: 10px;
      /* Rounded corners */
    }

    /* Styling for icons */
    .fa-facebook,
    .fa-instagram,
    .fa-linkedin {
      color: #2d2d72;
      /* Icon color */
      transition: color 0.3s ease;
    }

    .fa-facebook:hover,
    .fa-instagram:hover,
    .fa-linkedin:hover {
      color: #0056b3;
      /* Hover effect for social media icons */
    }

    /* Responsive spacing for the columns */
    @media (max-width: 768px) {
      footer h5 {
        font-size: 1.2rem;
      }

      footer p {
        font-size: 1rem;
      }
    }



    /* Loader styles */
    .loader-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      /* Full viewport height for the loader */
      position: fixed;
      /* Fixes the loader in place */
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: deepskyblue;
      /* Set background color to DeepSkyBlue */
      z-index: 9999;
      /* Ensure loader is on top */
    }

    .loader {
      margin: auto;
      width: 50px;
      height: 50px;
      background-color: #FF5C35;
      animation: spin 2s cubic-bezier(0.68, -0.55, 0.27, 1.55) infinite;
    }

    @keyframes spin {

      0%,
      100% {
        transform: scale(1) rotate(0deg);
      }

      50% {
        transform: scale(0.5) rotate(180deg);
      }
    }
  </style>
</head>

<body>
  <!-- Loader animation -->
  <div class="loader-container" id="loader">
    <div class="loader"></div>
  </div>


  <!-- Section -->
  <section class="text-dark py-2" style="background-color: deepskyblue; color:#555;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <div class="d-flex flex-column flex-lg-row gap-2 gap-lg-4 justify-content-center justify-content-lg-start text-center text-lg-start">
            <a href="tel:+254723106522" class="text-dark text-decoration-none">
              <i class="fas fa-phone-alt me-2"></i>+254 723 106522
            </a>
            <a href="mailto:info@danhillconstructioncompany.co.ke" class="text-dark text-decoration-none">
              <i class="fas fa-envelope me-2"></i>info@danhillconstructioncompany.co.ke
            </a>
            <span class="text-dark">
              <i class="far fa-clock me-2"></i>Mon - Sat 9:00 - 19:00
            </span>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="d-flex justify-content-center justify-content-lg-end gap-3">
            <a href="#" class="text-light"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="#" class="text-light"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="#" class="text-light"><i class="fab fa-linkedin fa-lg"></i></a>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- Search Bar -->
  <div id="searchBar" class="container-fluid py-3" style="display: none; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">
    <div class="container">
      <div class="position-relative">
        <input style="margin-left: 30px; margin-right: 30px;" type="text" class="form-control" placeholder="Search..." aria-label="Search">
        <button class="btn position-absolute end-0 top-50 translate-middle-y border-0" type="button" id="closeSearch" style="background: none; padding-right: 15px;">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
  </div>



  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #072D4B;">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a style="margin: 10px;" class="navbar-brand d-flex align-items-center" href="#">
        <span class="brand-text" style="color: rgba(0, 0, 0, 0.5);">DANHILL CONSTRUCTION</span>
        <p style="color: deepskyblue;"><i>WE BUILD YOUR VISION</i></p>
      </a>
      <a class="nav-link d-lg-none search-icon-mobile" href="#">
        <i class="fas fa-search"></i>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">About us</a></li>
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">Our Process</a></li>
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">Portfolio</a></li>
          <li class="nav-item"><a style="color: #ffffff !important;" class="nav-link" href="#">Contact Us</a></li>
          <li class="nav-item search-icon d-none d-lg-block">
            <a class="nav-link" href="#">
              <i class="fas fa-search" style="color: #36abdd !important;"></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- slideshow -->
  <section id="slideshow">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img1.png" height="500px" class="d-block w-100" alt="...">
          <div class="carousel-caption text-center">
            <h5 class="display-6 display-md-5 display-lg-4" style="margin: 10px;">Your Vision, Our Expertise</h5>
            <h1 class="display-1 display-md-2 display-lg-1" style="margin: 10px;">Transforming Spaces</h1>
            <h1 class="display-1 display-md-2 display-lg-1" style="color: cornflowerblue; margin:10px;">Innovative & Elegant</h1>
            <p class="lead" style="margin: 10px;">At DanhillCo, we blend artistry with engineering to create stunning interior spaces that reflect your personal style. Our team of certified professionals is dedicated to bringing your vision to life.</p>
            <p class="lead"></p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img2.png" height="500px" class="d-block w-100" alt="...">
          <div class="carousel-caption text-center">
            <h5 class="display-6 display-md-5 display-lg-4" style="margin: 10px;">Commitment to Excellence</h5>
            <h1 class="display-1 display-md-2 display-lg-1" style="margin: 10px;">Crafting Exceptional Spaces</h1>
            <!-- <h1 class="display-1 display-md-2 display-lg-1"></h1> -->
            <h1 class="display-3" style="color: cornflowerblue; margin:10px;">Functional & Aesthetic</h1>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img3.png" height="500px" class="d-block w-100" alt="...">
          <div class="carousel-caption text-center">
            <h5 class="display-6 display-md-5 display-lg-4" style="margin: 10px;">Precision & Professionalism</h5>
            <h1 class="display-1 display-md-2 display-lg-1" style="margin: 10px;">Setting New Standards</h1>
            <h1 class="display-1 display-md-2 display-lg-1" style="color: cornflowerblue; margin:10px ">Quality & Detail</h1>
            <p class="lead" style="margin: 10px">Our passion for design drives us to enhance every corner of your home or office. We understand each project is unique, tailoring our approach to meet your specific needs and standards.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>




  <!-- vission, mission -->
  <section class="container py-5 custom-layout">
    <div class="row">
      <!-- Content Section -->
      <div class="content col-lg-7">
        <h2 class="mb-4 text-center text-lg-start"><b style="color: deepskyblue;">Who We Are</b></h2>
        <p class="text-center text-lg-start">With over a decade of experience, Danhill Construction is a premier architectural and interior design company based in Kenya. Our team of dedicated professionals specializes in delivering innovative and high-quality solutions to bring your visions to life.</p>

        <h3 class="mt-5 mb-4 text-center text-lg-start"><b>Our Mission</b></h3>
        <p class="text-center text-lg-start">To deliver innovative architectural and interior design solutions that exceed client expectations. By leveraging over a decade of experience and a commitment to excellence, we aim to transform visions into reality with precision, professionalism, and unparalleled quality.</p>

        <h3 class="mt-5 mb-4 text-center text-lg-start"><b>Our Vision</b></h3>
        <p class="text-center text-lg-start">To be the leading construction and design firm in Kenya, recognized for our dedication to craftsmanship, innovation, and client satisfaction. We strive to create spaces that inspire and elevate the human experience, setting new standards in the industry.</p>
      </div>

      <!-- Image Section -->
      <div class="image-container col-lg-5 text-center text-lg-end">
        <img src="img1.png" alt="DanHill Construction Image" class="img-fluid">
      </div>
    </div>
  </section>





  <!-- why schoose us -->
  <section style="background-color: #072D4B;
            color: white; text-align: center; justify-content:center; align-items: center;">
    <div class="container text-center">
      <h2 id="why" style="">WHY CHOOSE US?</h2>
      <p class="mb-5">
        Our dedication to quality and customer satisfaction sets us apart. We are not just builders; we are artists who create beautiful and functional interiors tailored to your lifestyle.
      </p>
      <div class="row">
        <div class="col-md-3">
          <div class="icon-circle">
            <div class="icon-circle-inner">
              <img alt="" src="https://img.icons8.com/ios-filled/50/50C9F5/leaf.png" />
            </div>
          </div>
          <h5 class="service-title">WE DELIVER QUALITY</h5>
          <p>Every project is completed with precision and attention to detail, ensuring the highest quality standards.</p>
        </div>

        <div class="col-md-3">
          <div class="icon-circle">
            <div class="icon-circle-inner">
              <img alt="" src="https://img.icons8.com/ios-filled/50/50C9F5/clock.png" />
            </div>
          </div>
          <h5 class="service-title">ON-TIME COMPLETION</h5>
          <p>We respect your time and ensure projects are completed on schedule without compromising quality.</p>
        </div>

        <div class="col-md-3">
          <div class="icon-circle">
            <div class="icon-circle-inner">
              <img alt="" src="https://img.icons8.com/ios-filled/50/50C9F5/like.png" />
            </div>
          </div>
          <h5 class="service-title">PASSIONATE TEAM</h5>
          <p>Our team is passionate about design and construction, bringing enthusiasm to every project we undertake.</p>
        </div>

        <div class="col-md-3">
          <div class="icon-circle">
            <div class="icon-circle-inner">
              <img alt="" src="https://img.icons8.com/ios-filled/50/50C9F5/briefcase.png" />
            </div>
          </div>
          <h5 class="service-title">PROFESSIONAL SERVICES</h5>
          <p>From consultation to project management, we offer a full range of professional services for seamless execution.</p>
        </div>
      </div>
    </div>

  </section>




  <!-- OUR SERVICES Section -->
  <section id="services" class="py-5">
    <div class="container">
      <!-- Title -->
      <h2 class="text-center text-lightblue font-weight-bold mb-5" style="color: deepskyblue;">OUR SERVICES</h2>

      <div class="row">
        <!-- Card 1: Architectural Drawings -->
        <!-- <div class="col-lg-4 col-md-6 col-12 mb-4">
        <div class="card h-100">
          <img src="img1.png" height="200px" class="card-img-top" alt="Architectural Drawings">
          <div class="card-body">
            <h5 class="card-title" style="color: deepskyblue;">Architectural Drawings</h5>
            <p class="card-text">
              We craft detailed, innovative blueprints that are both aesthetically pleasing and structurally robust, serving as the foundation for your projects.
            </p>
          </div>
        </div>
      </div> -->
        <!-- Card 1: Architectural Drawings -->
        <div class="col-lg-4 col-md-6 col-12 mb-4">
          <div class="card h-100">
            <img src="img1.png" height="200px" class="card-img-top" alt="Architectural Drawings">
            <div class="card-body">
              <h5 class="card-title" style="color: deepskyblue;">Architectural Drawings</h5>
              <p class="card-text">
                We craft detailed, innovative blueprints that are both aesthetically pleasing and structurally robust, serving as the foundation for your projects.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2: Interior Design -->
        <div class="col-lg-4 col-md-6 col-12 mb-4">
          <div class="card h-100">
            <img src="img2.png" height="200px" class="card-img-top" alt="Interior Design">
            <div class="card-body">
              <h5 class="card-title" style="color: deepskyblue;">Interior Design</h5>
              <p class="card-text">
                We deliver bespoke interior design solutions that blend functionality with beauty, enhancing your quality of life.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3: Project Management -->
        <div class="col-lg-4 col-md-6 col-12 mb-4">
          <div class="card h-100">
            <img src="img3.png" height="200px" class="card-img-top" alt="Project Management">
            <div class="card-body">
              <h5 class="card-title" style="color: deepskyblue;">Project Management</h5>
              <p class="card-text">
                From inception to completion, our project management services ensure every project runs smoothly, delivering on time and within budget.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 4: HVAC Services -->
        <div class="col-lg-4 col-md-6 col-12 mb-4">
          <div class="card h-100">
            <img src="img4.png" height="200px" class="card-img-top" alt="HVAC Services">
            <div class="card-body">
              <h5 class="card-title" style="color: deepskyblue;">HVAC Services</h5>
              <p class="card-text">
                We provide top-tier HVAC solutions to ensure your buildings are equipped with efficient systems for optimal air quality and comfort.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Our Process Section -->
  <section id="process" class="py-5">
    <div class="container">
      <!-- Title -->
      <h2 class="text-center text-deepblue font-weight-bold mb-4" style="font-size: 2.5rem;">Our Process</h2>

      <!-- Subtitle -->
      <h4 class="text-center text-darkgray font-weight-bold mb-3">Designing and Building with Danhill Construction</h4>

      <!-- Paragraph -->
      <p class="text-center text-muted mb-5" style="font-size: 1rem;">
        We take a structured approach to each project, ensuring your vision is realized with precision, professionalism, and excellence.
      </p>

      <div class="row">
        <!-- Card 1: Consultation -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">1. Consultation</h5>
              <p class="card-text">
                We begin with an in-depth consultation to understand your needs, preferences, and vision for the project.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 2: Conceptual Design -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">2. Conceptual Design</h5>
              <p class="card-text">
                Our team creates initial design concepts, incorporating your feedback to ensure alignment with your vision.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 3: Detailed Drawings -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">3. Detailed Drawings</h5>
              <p class="card-text">
                We develop detailed architectural and interior drawings, ensuring every aspect of the project is meticulously planned.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 4: Approval & Permits -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">4. Approval & Permits</h5>
              <p class="card-text">
                We handle all necessary approvals and permits, ensuring compliance with local regulations.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 5: Construction -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">5. Construction</h5>
              <p class="card-text">
                Our skilled professionals execute the construction phase with precision, adhering to the highest standards of quality and safety.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 6: Project Management -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">6. Project Management</h5>
              <p class="card-text">
                Throughout the project, our project managers ensure everything runs smoothly, from scheduling to budget management.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 7: Final Touches -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">7. Final Touches</h5>
              <p class="card-text">
                We add the finishing touches, ensuring every detail meets your expectations.
              </p>
            </div>
          </div>
        </div>

        <!-- Card 8: Handover -->
        <div class="col-lg-6 col-md-6 col-12 mb-4">
          <div class="card h-100 shadow-lg p-3" style="transition: transform 0.3s ease;">
            <div class="card-body">
              <h5 class="card-title text-deepblue font-weight-bold">8. Handover</h5>
              <p class="card-text">
                Upon completion, we conduct a thorough walkthrough with you to ensure your satisfaction before handing over the project.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!-- Our gallery -->
  <style>
    /* Gallery Container */
    #gallery {
      position: relative;
      background-image: url('img5.png');
      /* Set the background image */
      background-size: cover;
      /* Cover the entire section */
      background-position: center;
      /* Center the background image */
      padding: 20px;
      overflow: hidden;
    }

    /* Dark shading overlay */
    #gallery::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 86, 179, 0.5);
      /* Adjusted shading color to be lighter */
      opacity: 1;
      /* Fully opaque */
      z-index: 1;
      /* Position it above the background image */
    }

    /* Ensuring content is above the overlay */
    #gallery>* {
      position: relative;
      /* Ensure children are above the shading */
      z-index: 2;
      /* Higher than the overlay */
    }

    /* Dark shading on hover for larger screens */
    @media (min-width: 992px) {
      .gallery-container {
        position: relative;
        /* Make it a positioning context for the pseudo-element */
      }

      .gallery-container::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #072D4B;
        /* Dark shading color */
        opacity: 0;
        /* Start hidden */
        transition: opacity 0.3s ease;
        /* Transition for smooth effect */
        z-index: 1;
        /* Position it above the container but below its children */
      }

      /* Show shading on hover */
      .gallery-container:hover::after {
        opacity: 1;
        /* Show the shading */
      }

      /* Ensure video and gallery content remain above the shading */
      .gallery-container>* {
        position: relative;
        /* Ensure they are above the shading */
        z-index: 2;
      }
    }

    /* Gallery Thumbnail Images */
    .gallery-image {
      width: 80px;
      /* Default thumbnail size for smaller screens */
      height: auto;
      margin: 0;
      display: block;
      transition: transform 0.3s ease;
    }

    /* Gallery Thumbnail Container */
    .gallery-thumbnail {
      display: flex;
      justify-content: center;
      /* Centering the image horizontally */
      align-items: center;
      /* Centering the image vertically */
      margin: 10px;
      /* Adding space around the thumbnails */
      position: relative;
      /* Make the thumbnail relative for absolute positioning of the icon */
    }

    /* Expand Icon on Hover */
    .expand-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      width: 30px;
      /* Width of the square icon */
      height: 30px;
      /* Height of the square icon */
      background-color: deepskyblue;
      /* Color of the square icon */
      border: 5px solid white;
      /* White border to create contrast */
      border-radius: 5px;
      /* Rounded corners */
      transform: translate(-50%, -50%);
      /* Center the icon */
      opacity: 0;
      /* Start hidden */
      transition: opacity 0.3s ease;
      pointer-events: none;
      /* Prevent hover on the icon itself */
    }

    /* Show icon on hover */
    .gallery-thumbnail:hover .expand-icon {
      opacity: 1;
      /* Show icon on hover */
    }

    /* Expanded Image size when clicked */
    .expanded img {
      max-width: 90%;
      max-height: 90%;
    }

    /* Expanded Image Overlay */
    .expanded {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgba(0, 0, 0, 0.8);
      z-index: 999;
    }

    /* Close button for expanded image */
    .close-expanded {
      position: absolute;
      top: 20px;
      right: 20px;
      color: white;
      font-size: 30px;
      cursor: pointer;
    }

    /* Navigation buttons */
    .btn-next {
      display: flex;
      justify-content: center;
      margin-top: 20px;
      align-items: center;
    }

    /* Centering the image container */
    .gallery-content .row {
      display: flex;
      justify-content: center;
      /* Center the images */
      flex-wrap: wrap;
      /* Wrap images to the next line if necessary */
    }

    /* Responsive Styles */

    /* Flex layout for large screens: video and gallery side by side */
    @media (min-width: 992px) {
      .gallery-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
      }

      /* Video size for large screens */
      .video-container {
        flex: 0 0 60%;
        /* Adjust video width to 60% */
        max-width: 60%;
        margin-left: 20px;
        height: 500px;
        /* Increased height for the video */
      }

      /* Gallery container taking 40% */
      .gallery-content {
        flex: 0 0 40%;
        /* Gallery takes 40%, reducing margin space */
        width: 40%;
        margin-left: 5px;
        /* Reduced margin between video and gallery */
      }

      /* Larger thumbnails on large screens */
      .gallery-image {
        width: 150px;
        /* Increase thumbnail size */
        height: auto;
        margin-left: 5px;
        /* Reduced margin between video and gallery */
      }

      /* Positioning buttons below the video at the center */
      .btn-next {
        justify-content: center;

        width: 60%;
        /* Align buttons to the width of the video */
        margin-top: 20px;
        margin-left: auto;
        margin-right: auto;
      }
    }

    /* Stacked layout for small screens */
    @media (max-width: 992px) {

      .video-container,
      .gallery-content {
        width: 100%;
        /* Full width on smaller screens */
      }

      /* Reset button styles for small screens */
      .btn-next {
        width: auto;
      }
    }
  </style>

  <!-- Updated Gallery Section -->
  <section id="gallery">
    <div class="row justify-content-center text-center">
      <h2 class="mb-4 text-light">GALLERY</h2>
      <p class="mb-5 text-light">
        Our gallery showcases the exceptional work we have done for clients, each project
        reflecting our commitment to quality and design excellence.
      </p>
    </div>

    <!-- Gallery Container: Video and Gallery side by side for larger screens -->
    <div class="gallery-container">
      <!-- Video Background Section -->
      <div class="video-container col-md-8">
        <video autoplay loop muted playsinline class="w-100">
          <source src="vid.mp4" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>

      <!-- Gallery Content -->
      <div class="gallery-content container">
        <div class="row" id="image-container">
          <!-- First set of images will be dynamically added here -->
        </div>
      </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="btn-next d-flex justify-content-center mt-4">
      <button class="btn btn-secondary mx-2" id="backBtn" style="display: none;">Back</button>
      <button class="btn btn-primary mx-2" id="nextBtn">Next</button>
    </div>
  </section>

  <!-- Expanded Image Overlay -->
  <div id="expanded-view" class="expanded" style="display: none;">
    <span class="close-expanded">&times;</span>
    <img id="expanded-img" src="" alt="Expanded Image">
  </div>

  <script>
    const imageSets = [
      [{
          src: 'img1.png',
          alt: 'Image 1'
        },
        {
          src: 'img2.png',
          alt: 'Image 2'
        },
        {
          src: 'img3.png',
          alt: 'Image 3'
        },
        {
          src: 'img4.png',
          alt: 'Image 4'
        }
      ],
      [{
          src: 'img5.png',
          alt: 'Image 5'
        },
        {
          src: 'img6.png',
          alt: 'Image 6'
        },
        {
          src: 'img7.png',
          alt: 'Image 7'
        },
        {
          src: 'img8.png',
          alt: 'Image 8'
        }
      ],
      [{
          src: 'img5.png',
          alt: 'Image 5'
        },
        {
          src: 'img2.png',
          alt: 'Image 6'
        },
        {
          src: 'img7.png',
          alt: 'Image 7'
        },
        {
          src: 'img4.png',
          alt: 'Image 8'
        }
      ]
    ];

    let currentSetIndex = 0;

    function loadImages(setIndex) {
      const galleryContainer = document.getElementById('image-container');
      galleryContainer.innerHTML = ''; // Clear current images
      imageSets[setIndex].forEach(image => {
        const thumbnail = document.createElement('div');
        thumbnail.classList.add('gallery-thumbnail');
        thumbnail.innerHTML = `
                <img src="${image.src}" class="gallery-image" alt="${image.alt}">
                <span class="expand-icon">&#128269;</span>
            `;
        galleryContainer.appendChild(thumbnail);

        // Add click event to expand the image
        thumbnail.addEventListener('click', function() {
          const expandedView = document.getElementById('expanded-view');
          const expandedImg = document.getElementById('expanded-img');
          expandedImg.src = image.src;
          expandedView.style.display = 'flex';
        });
      });
    }

    // Initially load the first set of images
    loadImages(0);

    // Expand Image Functionality
    document.querySelector('.close-expanded').addEventListener('click', function() {
      document.getElementById('expanded-view').style.display = 'none';
    });

    // Next Button Functionality
    document.getElementById('nextBtn').addEventListener('click', function() {
      if (currentSetIndex < imageSets.length - 1) {
        currentSetIndex++;
        loadImages(currentSetIndex);
        document.getElementById('backBtn').style.display = 'block';
      }

      // Hide next button when at the last set
      if (currentSetIndex === imageSets.length - 1) {
        this.style.display = 'none';
      }
    });

    // Back Button Functionality
    document.getElementById('backBtn').addEventListener('click', function() {
      if (currentSetIndex > 0) {
        currentSetIndex--;
        loadImages(currentSetIndex);
        document.getElementById('nextBtn').style.display = 'block';
      }

      // Hide back button when at the first set
      if (currentSetIndex === 0) {
        this.style.display = 'none';
      }
    });
  </script>


  <!-- Contact Us Section -->
  <section id="contact-us" class="py-5" style="background-color: #0096c7;">
    <div class="container">
      <div class="row align-items-center">
        <!-- Text Section -->
        <div class="col-lg-6 col-md-12 text-white mb-4 mb-lg-0">
          <h2 class="font-weight-bold" style="font-size: 2.5rem; color:#072D4B;">Do you have any questions?</h2>
          <p class="lead" style="font-size: 2rem; color:#072D4B;"><b>Feel free to contact us!</b></p>
        </div>

        <!-- Form Section -->
        <div class="col-lg-6 col-md-12">
          <form method="POST" action="index.php">
            <div class="mb-3">
              <input type="text" name="name" class="form-control form-control-lg" placeholder="Name" required>
            </div>
            <div class="mb-3">
              <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <textarea name="message" style="height: 20px;" class="form-control form-control-lg" placeholder="Message" rows="5" required></textarea>
            </div>
            <div class="text-center">
              <button type="submit" name="submit" style="background-color: rgb(40, 40, 72);" class="btn btn-light btn-lg">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>




  <!-- Footer -->
  <footer class="bg-dark text-light py-5" style="position: relative; background-image: url('img5.png'); background-size: cover; background-position: center;">
    <!-- Light-blue overlay shading -->
    <div style="background-color: rgba(0, 86, 179, 0.5); padding: 20px; margin: 20px; border-radius: 10px;">
      <div class="container">
        <div class="row">
          <!-- First Column: About Us -->
          <div class="col-md-4 mb-4 mb-md-0">
            <h5 class="text" style="color: #072D4B; font-weight: bold;">About Us</h5>
            <img src="img3.png" alt="DanhillCo Logo" class="img-fluid mb-3" style="max-width: 120px;">
            <p class="text" style="color: #ffffff;">At DanhillCo, we specialize in transforming spaces through innovative interior design and construction. Our passion for design ensures that we create beautiful, functional environments tailored to your needs.</p>

            <!-- Social Media Icons -->
            <div>
              <a href="#" class="text-dark me-2"><i class="fab fa-facebook fa-lg"></i></a>
              <a href="#" class="text-dark me-2"><i class="fab fa-instagram fa-lg"></i></a>
              <a href="#" class="text-dark me-2"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
          </div>

          <!-- Second Column: Contact Us -->
          <div class="col-md-4 mb-4 mb-md-0">
            <h5 class="text" style="color: #072D4B; ">Contact Us</h5>
            <ul class="list-unstyled text-light">
              <li><i class="fas fa-map-marker-alt"></i> Nairobi, Kenya</li>
              <li><i class="fas fa-envelope"></i> <a href="mailto:info@danhillconstructioncompany.co.ke" class="text-light">info@danhillconstructioncompany.co.ke</a></li>
              <li><i class="fas fa-phone"></i> <a href="tel:+254723106522" class="text-light">+254 723 106522</a></li>
            </ul>
          </div>

          <!-- Third Column: Download bronchure -->
          <div class="col-md-4">
            <!-- we can download the bronchure here -->
            <a href="bronchure.pdf" download="bronchure.pdf" class="btn btn-primary">Download Our Brochure</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Font Awesome for Icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>


  <!-- <div class="bg-dark text-center text-light py-2">
        <small>© 2024 All Rights Reserved const</small>
    </div> -->


  <script>
    AOS.init({
      debounceDelay: 50,
      throttleDelay: 99,
      offset: 120,
      delay: 0,
      duration: 1000,
      easing: 'ease',
      once: false,
      mirror: false,
      anchorPlacement: 'top-bottom',
    });
  </script>
  <script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.project-image1');

    function showSlides() {
      // Hide all images by removing the 'show' class
      slides.forEach(slide => {
        slide.classList.remove('show');
      });

      // Increment the slide index
      slideIndex++;

      // If we've reached the end of the slides, loop back to the start
      if (slideIndex > slides.length) {
        slideIndex = 1;
      }

      // Show the current slide by adding the 'show' class
      slides[slideIndex - 1].classList.add('show');

      // Change slide every 3 seconds (3000 milliseconds)
      setTimeout(showSlides, 4000);
    }

    // Initialize the slideshow when the page loads
    showSlides();
  </script>

  <script>
    // Search functionality
    const searchIcons = document.querySelectorAll('.search-icon, .search-icon-mobile');
    const searchBar = document.getElementById('searchBar');
    const closeSearch = document.getElementById('closeSearch');

    searchIcons.forEach(icon => {
      icon.addEventListener('click', (e) => {
        e.preventDefault();
        searchBar.style.display = 'block';
        // Use setTimeout to ensure display:block is applied before adding the show class
        setTimeout(() => {
          searchBar.classList.add('show');
          searchBar.querySelector('input').focus();
        }, 10);
      });
    });

    closeSearch.addEventListener('click', () => {
      searchBar.classList.remove('show');
      // Wait for transition to complete before hiding
      setTimeout(() => {
        searchBar.style.display = 'none';
      }, 1000);
    });
  </script>
  <script>
    // Hide loader and show content after page load
    window.onload = function() {
      document.getElementById('loader').style.display = 'none';
      document.getElementById('content').style.display = 'block';
    };
  </script>

  <script>
    $(document).ready(function() {
      // Button click handler to open the image in modal
      $('.img-container .icon').click(function(e) {
        var imgSrc = $(this).closest('.img-container').find('img').attr('src');
        $('#expandedImage').attr('src', imgSrc); // Set the image in the modal
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script src="
https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js
"></script>
</body>

</html>