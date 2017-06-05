<?php
session_start();
include_once "datosUsuarioRegistrado.php";
include_once "estilos.css";
include_once "constanteslogin.php";

$usuarioRegistrado=$_SESSION['UsuarioRegistrado'];
$contraseñaUsuarioRegistrado=$_SESSION['ContraseñaUsuarioRegistrado'];

if(isset($_POST['aceptar']))
{

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

if($oldPassword=="" || $newPassword=="" || $confirmPassword==""){
  echo '<div class="error">Uno de los campos está vacío.</div>';
}else if($newPassword!=$confirmPassword){
  echo '<div class="error">Las nuevas contraseñas no coinciden.</div>';
}else if($oldPassword!=$contraseñaUsuarioRegistrado){
  echo '<div class="error">La antigua contraseña es incorrecta.</div>';
}else if($oldPassword==$newPassword && $oldPassword==$confirmPassword){
    echo '<div class="error">Introduzca una contraseña diferente.</div>';
}else if($oldPassword==$contraseñaUsuarioRegistrado && $newPassword==$confirmPassword){
  $mysqli = new mysqli("$hostname","$user","$pass","$database");

//ELIMINAR EL SAFE MODE
$cadenaSQL = "SET SQL_SAFE_UPDATES = 0";
$mysqli->query($cadenaSQL);

$cadenaSQL = "UPDATE usuarios
              SET password = '" . $newPassword .
              "' WHERE usuario = '" . $usuarioRegistrado . "';";

$mysqli->query($cadenaSQL);

echo '<div class="correcto">La contraseña se ha modificado correctamente.</div>';
$_SESSION['ContraseñaUsuarioRegistrado']=$newPassword;
}
}else if(isset($_POST['volver']))
{
  header("location:usuarioRegistrado.php");
}
?>

<form action="" method="post" class="login">
    <div><label>Antigua Contraseña</label><input name="oldPassword" type="password" ></div>
    <div><label>Nueva Contraseña</label><input name="newPassword" type="password"></div>
    <div><label>Confirmar Contraseña</label><input name="confirmPassword" type="password"></div>
    <div><label><input name="aceptar" type="submit" value="Cambiar Contraseña"></div>
    <div><label><input name="volver" type="submit" value="Volver"></div>
</form>
<?php

?>
