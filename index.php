
<?php

$db_host = 'localhost';
$db_nombre = 'comunal_formulario';
$db_usuario = 'root';
$db_contra = '';
$conexion = mysqli_connect($db_host,$db_usuario,$db_contra); 
// especificamo la base de datos con la que deseamos conectar
mysqli_select_db($conexion,$db_nombre) or die ("No se encontró la bd");

// Recuperar las variables de la base de datos
$nombre = $_POST['nombre']; 
$email = $_POST['email']; 
$mensaje = $_POST['mensaje']; 


//Hacemos la sentencia sql para guardar la variable 
$insertar = "INSERT INTO datos(nombre, email,  mensaje) VALUES ('$nombre','$email','$mensaje')";   

// Verificar si existe usuario repetido
$verificar_email = mysqli_query($conexion, "SELECT * FROM  datos WHERE email ='$email'");
if (mysqli_num_rows($verificar_email)>0) {
    echo "<script>
        alert('El email ya está registrado')
        window.history.go(-1)
        </script>";
    exit;
}  

// Ejecutamos la consulta
$resultado = mysqli_query($conexion,$insertar);
if (!$resultado) {
    echo "Error al registrarse";
} else {
   echo "Usuario registrado exitosamente";
}



// Validamos si no hay conexión a la base de datos
// if (mysqli_connect_errno()) {
// echo "Falló la conexión a la base de datos";
// exit();
// } else {
 
// }

// Cerrar conexion
mysqli_close($conexion);


// $consulta = "SELECT * FROM DATOS";
// $resultado = mysqli_query($conexion,$consulta);
// $fila = mysqli_fetch_row($resultado);
// echo $fila[0];
// echo $fila[1];
// echo $fila[2]; 


