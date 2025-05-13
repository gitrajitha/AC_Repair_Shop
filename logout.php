<?php

session_start();

session_destroy();

echo "<script>window.open('Login/login.php','_self')</script>";

?>