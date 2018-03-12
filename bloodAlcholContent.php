<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Blood alcohol content calculator</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="calculator.css" media="screen">
<script type="text/javascript" src="calculateAlcoholContent.js"></script>
<script type="text/javascript" src="loggedOrNot.js"></script>
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded" style="background-image:url('images/demo/backgrounds/01.png');" onload='getCook("username")'>
  <div id="pageintro" class="hoc split clear">
    <article class="box bg-coloured clear">
      <!-- ################################################################################################ -->
      <h2 class="heading">Blood alcohol content</h2>
      <p>This is a calculator that would help calculate your blood alcohol content. Thus help you become healthier.</p>
      <footer>
        <ul class="nospace inline pushright">
            <li><a class="btn" href="index.html">Home</a></li>
          <li><a id="loggedOrNot" class="btn inverse" href = 'logout.php'>Logout</a></li>
        </ul>
      </footer>
      <!-- ################################################################################################ -->
    </article>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1 style="float: left"><a href="calculator.php">Health Calculator</a></h1>
        <h1 style="float: left"><a href="bloodAlcholContent.php">/ /Blood Alcohol Content Calculator</a></h1>
        <h1 style="float: left"><a href="calciumCalculator.php">/ /Vitamin D Int.</a></h1>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear">
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="group">
        <arcticle class="one_third first">
            <h3>Ever wonder what is your blood alcohol content?</h3>
    Current weight:<br>
  <input type="text" id="weight">
  <br>
   Drinking period in hours:<br>
  <input type="text" id="drinkPeriod">
  <br>
 The number of <a href="https://en.wikipedia.org/wiki/Standard_drink">standard drinks</a><br>
  <input type="text" id="numOfDrinks">
  <br>
  Gender:<br>
   <select id="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
  </select>
  <br>
  <br>
  <p id="alcoholContent">  </p>
  <button onclick="calc()">Calculate</button>
  <br>
  </arcticle>
        <article class="one_third">
            <h3>Your condition</h3>
            <p id="info">This is your condition:</p>
        </article>
        <article class="one_third">
            <h3 id="headingThird">What could you do?</h3>
            <p id="way"></p>
        </article>

  </div>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    </div>
<div id="chart-1"></div>
</div>
  </main>
<div class="wrapper row5">
  <footer id="footer" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="center btmspace-80 clear">
      <h6 class="font-x3 uppercase">Contact us</h6>
      <p><a onclick=" window.open('contact.html','',' scrollbars=no,menubar=no,width=500, resizable=no,toolbar=no,location=no,status=no')">If you have any questions, please feel free to contact us!</a></p>
    </div>
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row6">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Health Calculator</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
