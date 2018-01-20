<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['valid']);
   echo '<p>You have cleaned session</p>';
   header("Location: https://healthcalc.uchenici.bg/index.html");