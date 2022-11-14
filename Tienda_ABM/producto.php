<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
mysqli_select_db($conexion,"tienda");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ropa WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/product.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Producto</title>
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
    <!-- Navbar -->
    <header>
        <div class='container text-center'>
            <h1>Tienda ABM Potrero BackEnd</h1> 
        </div>
    </header>
<?php
  // 6) asignamos a diferentes variables los respectivos valores del array $datos.
  // este paso no es estrictamente necesario, pero es mas practico
  //para despues llamarlos solo con el nombre de la variable
    $prenda=$datos["prenda"];
    $marca=$datos["marca"];
    $talle=$datos["talle"];
    $precio=$datos["precio"];
    $imagen=$datos['imagen'];?>
    <!--Main layout-->
    <main class="mt-5 pt-4">
        <div class="container dark-grey-text mt-5">

        <!--Grid row-->
        <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <img src="data:image/jpg;base64, <?php echo base64_encode($imagen)?>" alt="..."  class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Content-->
            <div class="p-4">

            <p class="lead">
                <span>$ <?php echo $precio;?></span>
            </p>

            <p class="lead font-weight-bold"><?php echo $prenda;?> - <?php echo $marca;?></p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
            sint voluptatibus!
            Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.</p>

            <form class="d-flex justify-content-left">
                <!-- Default input -->
                <a class="btn btn-primary" href="https://mpago.la/2S5h6yP" role="button">Comprar</a>
                        <i class="fas fa-shopping-cart ml-1"></i>
                    </button>
                </form>
            </div>
            <!--Content-->
        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
        <hr>
    </main>
    <!--Main layout-->
    <!--Footer-->
    <footer class="page-footer text-center font-small mt-4 wow fadeIn">
    
    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2022 Copyright TiendaPotrero
    </div>
    <!--/.Copyright-->
    </footer>
<script > new WOW().init();</script>
</body>
</html>