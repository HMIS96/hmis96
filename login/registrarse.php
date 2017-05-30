<?php
//session_start();
include_once "conexion.php";
include_once "estilos.css";

if(!isset($_SESSION['userid']))
{
    if(isset($_POST['login']))
    {
        $_SESSION['userid'] = $result->idusuario;
        header("location:index.php");
    }

}
if(isset($_POST['registro']))
{

$usuario = $_POST['user'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$boolean="false";
if($usuario=="" || $password=="" || $password2==""){
  echo '<div class="error">Uno de los campos está vacío.</div>';
}else if($password!=$password2){
  echo '<div class="error">Las contraseñas no coinciden.</div>';
}else if(verificar_login($usuario,$password,$result) == 1){
  echo '<div class="error">El usuario ya está registrado.</div>';
}else if($password==$password2 && $usuario!=""){

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
    <div><label>Contraseña</label><input name="password2" type="password"></div>
    <div><label><input name="login" type="submit" value="Iniciar Sesión"></label>
    <div><label><input name="registro" type="submit" value="Registrarse"></div>
</form>
<?php

?>
