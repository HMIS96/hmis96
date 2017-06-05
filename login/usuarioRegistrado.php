<?php
session_start();
include_once "estilos.css";
include_once "datosUsuarioRegistrado.php";

if(isset($_POST['logout']))
{
    header("location:logout.php");
  }
  if(isset($_POST['cambiarContraseña']))
  {

      header("location:cambiarContraseña.php");
    }
?>

<form action="" method="post" class="login">

<div>Sesión iniciada</div>
<div><input name="cambiarContraseña" type="submit" value="Cambiar Contraseña"></div>
<div><input name="logout" type="submit" value="Cerrar Sesión"></div>
</form>
