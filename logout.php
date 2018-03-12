<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION['valid']);
   foreach ($_COOKIE as $name => $value) {
       setcookie($name, '', 1);
   }
   echo '<script type="text/javascript"> window.location = "https://healthcalc.uchenici.bg/index.html" </script>';
   die();
