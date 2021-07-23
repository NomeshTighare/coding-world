<?php
    $thisPage="Company";

    include 'config.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/head.php';?>
</head>

<body>
  <?php include 'includes/navbar1.php';?>
  <div class="container">
    <h2 class="h1 team">Company</h2>
    <hr>
    <img src="img/connect.jpg" height="300px" width="100%">
    <h4 class="hhh">Our mission is to empower young Students to be the inventors and creators.</h4>
    <div class="row">
      <div class="col-6 hh">
        Coding World !! partners with more than 200 leading universities and companies to bring flexible, affordable,
        job-relevant online learning to individuals and organizations worldwide. We offer a range of learning
        opportunities—from hands-on projects and courses to job-ready certificates and degree programs.

      </div>
      <div class="col-6">
        <img src="img/partner-logos.png">
      </div>

    </div>
  </div>
  <hr>
  <div class="container">
    <div class="row" style="margin-top:10px">
      <div class="col-4">
        <h3> Contact Us </h3>
        <h6> Address : Manewada, Nagpur 440034</h6>
        <h6> Mobile : 8956579244 </h>

      </div>
      <div class="col-8">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29779.47213328165!2d79.09634593476959!3d21.09525604134423!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd4b8c1908ca131%3A0xf779994f4b4ba0f2!2sNagpur%2C%20Maharashtra%20440034!5e0!3m2!1sen!2sin!4v1626861005460!5m2!1sen!2sin"
          width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

      </div>
    </div>

  </div>
  <div class="container" >

  <div id='afscontainer1'></div>

<script type="text/javascript" charset="utf-8">

  var pageOptions = {
    "pubId": "pub-9616389000213823", // Make sure this the correct client ID!
    "query": "udemy",
    "adPage": 1
  };

  var adblock1 = {
    "container": "afscontainer1",
    "width": "1000",
    "number": 1
  };

  _googCsa('ads', pageOptions, adblock1);

</script>

        
</div>
  <?php include 'includes/footer.php';?>
  <?php include 'includes/script.php';?>
</body>

</html>