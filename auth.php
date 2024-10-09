<?php
include 'logIn.php';
iniciaSession();



//Nombre archivo
$nombreArchivo = 'datos.csv';
// Array de datos
$datos = [];

// Verificación del archivo si existe
if (file_exists($nombreArchivo)){
    // Lectura del archivo
    $archivo = fopen($nombreArchivo, 'r+');

} else {
    // Creación del archivo
    $archivo = fopen($nombreArchivo, 'w');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Variable nombre
    $name = $_POST['name'];
    // Variable apellidos
    $surname = $_POST['surname'];
    // Variable email
    $email = $_POST['email'];
    // Variable password
    $pass = $_POST['password'];
    // Encriptación de contraseña
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // Verificación llenado de datos
    //var_dump($datos);

    // Rellenamos el array de datos
    while(($datos = fgetcsv($archivo)) !==false){
        // Verificamos si el email existe
        if(array_search($email, $datos)){
            echo 'Usuario ya creado <br>';
            // Verificamos si la contraseña es correcta
            if (!password_verify($pass, $datos[3])){
                echo 'Contraseña incorrecta <br>';
            } else {
                // Variable guarda el host
                $host = $_SERVER['HTTP_HOST'];
                // Ruta del servidor
                $ruta = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
                // Archivo de la ruta
                $html = 'marcas.php';
                // Redirección al html
                header("Location:http://$host$ruta/$html?name=$name");
                $_SESSION["$name"];
                logIn($name);
                if (!isset($_SESSION[$name])){
                    $_SESSION[$name] = [];
                }
            }
        } else {
            echo 'Usuario inexistente';
        }
    }



} else {
    echo 'ERROR: Se esperaba un metodo POST y se a recibido ' . $_SERVER['REQUEST_METHOD'];
}

fclose($archivo);

