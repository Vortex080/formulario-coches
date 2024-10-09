<?php
include 'logIn.php';
iniciaSession();
$name = $_GET['name'];

// Lee el archivo de texto
$archivo = 'BD/marcas.txt';
$contenido = file_get_contents($archivo);

// Separa las marcas por el carácter ';'
$duplicado = explode(';', $contenido);

// Elimina posibles espacios en blanco
$duplicado = array_map('trim', $duplicado);

// Elimina las marcas duplicadas
$marcas = array_unique($duplicado);

echo '<h1>MARCAS</h1>';

foreach($marcas as $marca => $url){

    echo '<a href="coches.php?name='.$name.'&marca='.$url.'">'.$url.'</a> <br>';
}


echo '<form action="carrito.php?name='.$name.'" method="POST"><button type="submit">VER CARRITO</button></form>';
echo '<form action="logout.php?name='.$name.'" method="POST"><button type=submit>LOGOUT</button></form>';
