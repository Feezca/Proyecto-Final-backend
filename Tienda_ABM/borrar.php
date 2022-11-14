<?php
    // 1) Conexión
    $conexion=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conexion,"tienda");

    // 2)obtener los datos del id a borrar MEDIANTE EL METODO GET y generar variables del id a utilizar
    $id = $_GET['id'];

    // 3) Preparar la logica SQL
    // DELETE FROM nombre_tabla WHERE campo_tabla=dato
    // =>ingresa dentro de la siguiente tabla los siguientes valores
    // a)generar la consulta a realizar
    $consulta = "DELETE FROM `ropa` WHERE `id`=$id";

    // 4)ejecutar la orden y eliminamos el registro seleccionado
    // a)ejecutar la consulta
    mysqli_query( $conexion , $consulta );
    // a)redirigir al index 
    header('location: listaEditable.php');
?>