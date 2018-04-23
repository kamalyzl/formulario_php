<?php
 
// conectarnos con el servidor 
$contectar=mysqli_connect('localhost', 'root', '');
// Verificamos si la conexion es correcta
if (!$contectar) {
    echo "No se pudo conectar con el servidor";
} else {
    $base=mysql_select_db('comunal_formulario');
    if (!$base) {
        echo "No se encontró la base de datos";
    }
}
// Recuperar las variables de la base de datos
$nombre = $_POST['nombre']; 
$email = $_POST['email']; 
$mensaje = $_POST['mensaje']; 

//Hacemos la sentencia sql para guardar la variable
// $sql = "INSERT INTO datos VALUES ('$nombre', '$email', '$mensaje' ) ";
$sql = "INSERT INTO datos(nombre email  mensaje)";   

// Ejecutamos la sentencia 
$ejecutar = mysql_query($sql);

// Verificar la ejecución
if (!$ejecutar) {
    echo "Hubo un error";
} else {
    echo "Datos guardados correctamente <a href='index.html'>Volver</a>";
    
}  
?>