<?php
session_start();
if (!empty($_GET)) {
$id = $_GET["IDproduto"];
session_unset($_SESSION["carrinho"][$id]);
$_SESSION["carrinho"] = array_values($_SESSION["carrinho"]);
header("location: carrinho.php");
}
?>