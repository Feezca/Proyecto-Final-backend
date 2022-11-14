<?php
    // 1) Conexión
    $conexion=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conexion,"tienda");

    // 2)Almacenar los datos del envio post 
    // y generar variables para cada dato a almacenar en la bd 
    $prenda = $_POST['prenda'];
    $marca = $_POST['marca'];
    $talle = $_POST['talle'];
    $precio = $_POST['precio'];

    // Si se desea almacenar una imagen lo hacemos de la siguiente forma 
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    // 3) Preparar la logica SQL
    // INSERT INTO nombre_tabla(campos_tabla) VALUES (valores_a_ingresar)
    // =>ingresa dentro de la siguiente tabla los siguientes valores
    // a)generar la consulta a realizar
    $consulta = "INSERT INTO ropa (id,prenda,marca,talle,precio,imagen) VALUES('','$prenda','$marca','$talle','$precio','$imagen')";

    // 4)ejecutar la orden e ingresamos datos
    // a)ejecutar la consulta
    mysqli_query( $conexion , $consulta );
    // a)redirigir al index 
    header('location: listaEditable.php');
?>