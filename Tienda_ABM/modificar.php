<?php
    // 1) Conexión
    $conexion=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conexion,"tienda");

    // 2)obtener los datos del id a modificar MEDIANTE EL METODO GET y generar variables del id a utilizar
    $id = $_GET['id'];

    // 3) Preparar la logica SQL
    // DELETE FROM nombre_tabla WHERE campo_tabla=dato
    // =>ingresa dentro de la siguiente tabla los siguientes valores
    // a)generar la consulta a realizar
    $consulta ="SELECT * FROM ropa WHERE id=$id";

    // 4)ejecutar la orden y almaceno en una variable el resultado
    // a)ejecutar la consulta
    $respuesta = mysqli_query($conexion, $consulta);

    // 5)transformamos los datos obtenidos en un array 
    $datos= mysqli_fetch_array($respuesta)
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="./css/styles.css" rel="stylesheet">
        <title>Tienda Potrero-Modificar</title>
    </head>
<body>
<body>
<?php
    $prenda = $datos['prenda'];
    $marca = $datos['marca'];
    $talle = $datos['talle'];
    $precio = $datos['precio'];
    $imagen = $datos['imagen'];
    ?>
    <nav class="navbar navbar-expand-lg text-light" 
    style="background-color: #2d2d2d;
            height: 100px;
            ">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="index.html"><img src="https://static.wixstatic.com/media/5b90eb_2f1f983af79a4e69ba942bc0586dbb7d~mv2.png/v1/fill/w_191,h_20,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/potrero_digital_2021_edited.png" alt="potrero_digital_2021_edited.png" style="width:191px;height:18px;object-fit:fill" srcset="https://static.wixstatic.com/media/5b90eb_2f1f983af79a4e69ba942bc0586dbb7d~mv2.png/v1/fill/w_191,h_20,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/potrero_digital_2021_edited.png 1x, https://static.wixstatic.com/media/5b90eb_2f1f983af79a4e69ba942bc0586dbb7d~mv2.png/v1/fill/w_382,h_40,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/potrero_digital_2021_edited.png 2x" fetchpriority="high"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="index.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="lista.php">Productos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Marca
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="listanike.php">--Nike--</a></li>
                        <li><a class="dropdown-item" href="listaAdidas.php">Adidas</a></li>
                    <li><a class="dropdown-item" href="listaSupreme.php">Supreme</a></li>
                    </ul>
                </li>
                <li>
                    <a class="btn btn-outline-warning" href="add.html" role="button">Agregar Producto</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
<header>
    <div class='container text-center'>
        <h1>Tienda ABM Potrero BackEnd</h1> 
    </div>
</header>
    <h2>MODIFICAR</h2>
    <h3>Ingresar los nuevos datos del producto</h3>
            
            <form method="post" action="" enctype="multipart/form-data">
        <label>Tipo de prenda</label>
        <input type="text" name="prenda" placeholder="Tipo de Prenda" value="<?php echo "$prenda"; ?>">
        <label>Marca</label>      
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
        <label>Talle</label>
        <input type="text" name="talle" placeholder="Talle" value="<?php echo "$talle"; ?>">
        <label>Precio</label>
        <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
        <div class="mb-3">
            <label for="formFile" class="form-label">Imágen del producto</label>
            <input class="form-control" type="file" name='imagen' required>
        </div>
        <input type="submit" name="guardar_cambios" value="Guardar Cambios" class='m-2 btn btn-outline-success'>
        <a class="btn btn-outline-primary " href="listaEditable.php" role="button">Atras</a>


    </form>
    <?php
    // Si alguien da clic al boton guardar cambios,ejecutara el codigo de abajo 
    if (array_key_exists('guardar_cambios', $_POST)) {
        // 2)Almacenamos los datos actualizados del envio post|
        $prenda = $_POST['prenda'];
        $marca = $_POST['marca'];
        $talle = $_POST['talle'];
        $precio = $_POST['precio'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        // 3)Preparar la orden SQL 
        $consulta="UPDATE ropa SET prenda='$prenda', marca='$marca', talle='$talle', precio= '$precio', imagen='$imagen' WHERE id =$id";
        // 4)Ejecutar la orden y actualizar los datos 
        // a)ejecutar la consulta
        mysqli_query( $conexion , $consulta );
        // a)redirigir al index 
        // header('location:index.html');
    }
?>
<footer class="page-footer text-center font-small mt-4 wow fadeIn">
    
    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2022 Copyright TiendaPotrero
    </div>
    <!--/.Copyright-->
    </footer>
</body>
</html>