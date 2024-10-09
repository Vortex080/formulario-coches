<?php
include 'logIn.php';
iniciaSession();
$name = $_GET['name'];

if(isset($_GET['marca'])){
    $nombre = $_GET['marca'];
}


// Lee el archivo de texto
$archivo = 'BD/'.$nombre.'.txt';
$contenido = file_get_contents($archivo);

// Separa las marcas por el carácter ';'
$duplicado = explode(';', $contenido);

// Elimina posibles espacios en blanco
$duplicado = array_map('trim', $duplicado);

// Elimina las marcas duplicadas
$marcas = array_unique($duplicado);

echo '<h1>'.$nombre.'</h1>';

foreach($marcas as $marca => $url){

    echo '<form action="comprar.php?name='.$name.'&marca='.$nombre.'&coche='.$url.'" method="POST">
    <input name="coche" value="'.$url.'"disabled>    <button type="submit" id="">AÑADIR AL CARRITO</button><BR></BR>
    </form>';
}

$_SESSION[$name];

echo '<form action="carrito.php?name='.$name.'&marca='.$nombre.'" method="POST"><button type="submit">VER CARRITO</button></form>';

$ruta = 'marcas.php?name='.$name;
echo '<form action='.$ruta.' method="POST"><button type=submit>VOLVER</button></form>';