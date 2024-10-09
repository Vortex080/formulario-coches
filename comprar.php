<?php
include 'logIn.php';
iniciaSession();
$coche = $_GET['coche'];

if(!in_array($coche, $_SESSION[$_GET['name']])){
    $_SESSION[$_GET['name']][] = $coche;
}


header('Location:'. getenv('HTTP_REFERER'));
