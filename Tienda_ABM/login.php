<?php

$user = $_POST["user"];
$pass = $_POST["pass"];

$usuario = "admin";
$contrasenia = "1234";

if ($usuario == $user && $contrasenia == $pass ){
  header ("location:listaEditable.php");
} else {
  header ("location:error.html");}
?>