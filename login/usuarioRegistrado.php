<?php
include_once "estilos.css";

echo '<div class="correcto">El usuario ingresó correctamente.</div>';
if(isset($_POST['logout']))
{
    header("location:logout.php");
  }
?>

<form action="" method="post" class="login">
<div><label>Sesión iniciada</label><input name="logout" type="submit" value="Cerrar Sesión"></div>
</form>
