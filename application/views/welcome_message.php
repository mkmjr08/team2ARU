<!DOCTYPE html>
<html>
<head>
<title>Hera Funds</title>
<link rel="icon" type="image/x-icon" href="img/icon.jpg">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('assets/homePage/css/style.css'); ?>">
</head>
<body>
<!-- Navbar (sit on top) -->
<nav class="navbar">
<!-- LOGO -->
<div class="logo">Hera &nbsp;<h6 style="font-family: cursive; font-size: 15px;">The Perfect Place</h6></div>
 <!-- NAVIGATION MENU -->
 <ul class="nav-links">
    <!-- NAVIGATION MENUS -->
    <div class="menu">
        <li class="services">
        <div style="display: inline-block; cursor: pointer;">
            <div style="width: 10px; height: 2px; background-color: white; margin: 6px 0; transition: 0.4s;"></div>
            <div style="width: 10px; height: 2px; background-color: white; margin: 6px 0; transition: 0.4s;"></div>
            <div style="width: 10px; height: 2px; background-color: white; margin: 6px 0; transition: 0.4s;"></div>
        </div>
        <!-- DROPDOWN MENU -->
        <ul class="dropdown">
            <li><a href="<?php echo base_url(); ?>signIn">Sign In </a></li>
            <li><a href="<?php echo base_url(); ?>userRegistration">Create Account</a></li>
        </ul>
        </li>
        <li><a href="#aboutus">Abouts</a></li>
        <li><a href="#contactus">Contact Us</a></li>
    </div>
</ul>
</nav>
<!-- Header -->
<div class="header" id="home">
  <div class="info">
  <h4 style="color: white;">HERA</h4>
    <h1 style="color: white;">Your Perfect Place</h1>
  </div>
</div>
<section class="content">
<p style=" font-size: 32px; text-align: center;">“Marketing’s job is never done. It’s about perpetual motion. We must continue to innovate every day.”</p>
<br>
<p style=" font-size: 18px; text-align: center;">Beth Comstock, Former CMO & Vice Chair, GE</p><br><br><br><br>
<p style=" font-size: 32px; text-align: center;">“Integrated marketing offers opportunities to break through to consumers in new markets.”</p>
<br>
<p style=" font-size: 18px; text-align: center;">Betsy Holden, Senior Advisor, McKinsey & Co.</p><br><br>
</section>
 <!-- About Section -->
 <div class="about-section" id="aboutus">
  <h1>About Us</h1>
</div>
<br><br>
<h2 style="text-align:center; color: white;">Our Team</h2>
<br><br><br><br>
<div class="row">
  <div class="column">
    <div class="card">
      <img src="<?php echo base_url('assets/homePage/img/team1.jpg'); ?>" alt="RDJ" style="width:100%">
      <div class="container">
        <h2>Robert Downey Jr.</h2>
        <p class="title">Founder</p><br>
        <p>Robert John Downey Jr. is an American investor and billionaire. </p><br>
        <p  align="right">rdj@hera.com</p><br>
        <p><button class="button"><a href = "mailto:rdj@hera.com" style="color: white">Contact</a></button></p><br>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="<?php echo base_url('assets/homePage/img/team2.jpg'); ?>" alt="tom" style="width:100%">
      <div class="container">
        <h2>Tom Holland</h2>
        <p class="title">Director</p><br>
        <p>Tom Holland is a British investor, who also manages many companies like Marvel.</p><br>
        <p align="right">tholland@hera.com</p><br>
        <p><button class="button"><a href = "mailto:tholland@hera.com" style="color: white">Contact</a></button></p><br>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <img src="<?php echo base_url('assets/homePage/img/team3.jpg'); ?>" alt="Emma" style="width:100%">
      <div class="container">
        <h2>Emma Watson</h2>
        <p class="title">CEO</p><br>
        <p>Emma Charlotte Duerre Watson is an English investor and activist.</p><br>
        <p align="right">emma@hera.com</p><br>
        <p><button class="button"><a href = "mailto:emma@hera.com" style="color: white">Contact</a></button></p><br>
      </div>
    </div>
  </div>
</div>
<!-- Contact Section -->
<div id="contactus">
  <div style="text-align:center">
    <h2>Contact Us</h2>
    <p style=" font-family: monospace;">Below is the details.</p>
  </div>
  <div style="text-align:center;">
    <div style="float: left; width: 50%; margin-top: 6px; padding: 20px;">
      <img src="<?php echo base_url('assets/homePage/img/map.jpg'); ?>" style="width:100%">
    </div>
    <div style="float: left; width: 50%; margin-top: 6px; padding: 20px;">         
        <svg style=" height:48px; width: 48px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M256 480c-88.366 0-160-71.634-160-160 0-160 160-352 160-352s160 192 160 352c0 88.366-71.635 160-160 160zm0-258c-54.124 0-98 43.876-98 98s43.876 98 98 98 98-43.876 98-98-43.876-98-98-98zm-62 98a62 62 1260 1 0 124 0 62 62 1260 1 0-124 0z" transform="scale(1 -1) translate(0 -480)"/>
        </svg>   
        <h1>Address</h1> <br>
        <br><br><h3>Anglia Ruskin Univeristy</b><br />East Road<br />Cambridge, CB1 1PT<h3>
    </div>
    <div style="float: left; width: 50%; margin-top: 6px; padding: 20px;">
    <svg  class="mk-svg-icon" data-name="mk-moon-phone-4" data-cacheid="icon-63f4fab910453" style=" height:48px; width: 48px; "  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M321.788 371.146c-11.188 6.236-20.175 2.064-32.764-4.572-11.46-8.748-45.402-35.438-81.226-71.188-26.156-33.084-46.162-64.288-55.375-79.293-.625-1.66-.944-2.632-.944-2.632-5.397-13.476-8.771-22.92-1.324-33.521 6.854-9.727 9.5-12.383 18.24-20.108l-87.79-130.124c-10.604 7.728-27.018 25.106-40.509 44.378-12.538 18.317-23.154 38.587-26.049 53.055 15.295 55.117 52.258 157.896 120.583 231.325l-.021.308c65.73 81.028 170.165 131.43 225.571 153.226 14.679-1.385 35.938-9.844 55.456-20.404 20.598-11.415 39.567-25.945 48.329-35.685l-120.288-100.829c-8.597 7.91-11.498 10.254-21.889 16.064zm-116.178-242.488c7.241-5.302 5.313-14.944 1.926-20.245l-66.579-101.913c-4.344-5.291-13.396-8.064-21.252-5.579l-27.433 18.381 88.034 129.879 25.304-20.523zm287.339 269.188l-94.473-76.788c-4.93-3.918-14.313-6.838-20.325-.188l-23.046 23.05 120.047 101.015 21.136-25.357c3.285-7.564 1.467-16.857-3.339-21.732z"/>
    </svg>
    <h1>Phone</h1> <br>
        <h3>+44 7891230360<br>+44 7539824570<br><h3>
    </div>
  </div>
</div>
<!-- End page content -->
</div>
</body>
</html>
