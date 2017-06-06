<?php
//session_start();
include_once "conexion.php";
include_once "estilos.css";

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['volver']))
    {
        $_SESSION['userid'] = $result->idusuario;
        header("location:index.php");
    }

}
if(isset($_POST['registro']))
{

$usuario = $_POST['user'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

$mysqli = new mysqli("$hostname","$user","$pass","$database");
$cadenaSQL = "SELECT usuario FROM usuarios where usuario='$usuario'";
$resultado=$mysqli->query($cadenaSQL);
$row = $resultado->fetch_array();


if($usuario=="" || $password=="" || $confirmPassword==""){
  echo '<div class="error">Uno de los campos está vacío.</div>';
}else if($password!=$confirmPassword){
  echo '<div class="error">Las contraseñas no coinciden.</div>';
}else if($row[0]==$usuario){
  echo '<div class="error">El nombre de usuario no está disponible.</div>';
}else if(verificar_login($usuario,$password,$result) == 1){
  echo '<div class="error">El usuario ya está registrado.</div>';
}else if($password==$confirmPassword && $usuario!=""){

  $mysqli = new mysqli("$hostname","$user","$pass","$database");
  $cadenaSQL = "Insert INTO usuarios(usuario,password) VALUES ('$usuario','$password')";
  $mysqli->query($cadenaSQL);
echo '<div class="correcto">El usuario se ha registrado correctamente.</div>';
}
}
?>

<form action="" method="post" class="login">
    <div><label>Usuario</label><input name="user" type="text" ></div>
    <div><label>Contraseña</label><input name="password" type="password"></div>
    <div><label>Confirmar Contraseña</label><input name="confirmPassword" type="password"></div>
    <div><label><input name="registro" type="submit" value="Registrarse"></div>
    <div><label><input name="volver" type="submit" value="Volver"></div>
</form>
<?php

?>
