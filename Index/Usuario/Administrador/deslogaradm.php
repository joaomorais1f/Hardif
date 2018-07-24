<?php
session_start();
session_unset($_SESSION["logadm"]);
session_destroy();

header("location: ../index1.php");


?>