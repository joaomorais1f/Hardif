<?php
session_start();
session_unset($_SESSION["logado"]);
session_destroy();
header("location: index1.php");

?>