<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div class='container text-center'>
            <h1>Tienda ABM Potrero BackEnd</h1>
        </div>
    </header>

    <h2>Lista de productos</h2>
        <h3>ADIDAS</h3>
    <section class='py-5'>
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                // 1) Conexión
                $conexion=mysqli_connect("127.0.0.1","root","");
                mysqli_select_db($conexion,"tienda");

                // 2)Preparar la orden con lenguaje SQL 
                $consulta="SELECT * FROM ropa WHERE marca = 'adidas'";

                // 3)Ejecutar la orden y traer los registros de la BD 
                $datos= mysqli_query ($conexion, $consulta);
                // E ir guardando los datos convertidos en un array 
                

                // 4)Mostrar los datos del registro 
                while ( $reg = mysqli_fetch_array( $datos ) ) {?>
                
                <div class="col mb-5 ">
                    <div class="card h-100 w-80 shadow p-3 mb-5 bg-body rounded">
                        <img src='data:image/png;base64,<?php echo base64_encode($reg['imagen']);?>' class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h3 class="card-title"><?php echo $reg['prenda'];?></h3>
                            <p class="card-text">Marca: <?php echo $reg['marca'];?></p>
                            <p class="card-text">Talle: <?php echo $reg['talle'];?></p>
                            <h4 class="card-text">$<?php echo $reg['precio'];?></h4>
                            <a href="https://mpago.la/2S5h6yP" class="btn btn-primary">Comprar</a>
                            <a href="producto.php?id=<?php echo $reg['id'];?>" class="btn btn-link">Ver Producto</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
        </section> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>