<?php
$link = mysqli_connect("localhost", "root", "", "php_ims");


if (!$link) {
    die("Erro de conexão: " . mysqli_connect_error());
}
?>
