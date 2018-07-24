<?php

$cnx = mysqli_connect("localhost", "root", "", "loja");

/* check connection */
if (!$cnx) {
    echo("Deu errado " . mysqli_connect_error());
}


?>