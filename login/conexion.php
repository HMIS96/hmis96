<?php
include_once "constantesLogin.php" ;
// datos para la conexion a mysql
define('DB_SERVER',$hostname);
define('DB_NAME',$database);
define('DB_USER',$user);
define('DB_PASS',$pass);

$usuario;
$con = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
mysql_select_db(DB_NAME,$con);



function verificar_login($user,$password,&$result) {

    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'";
    $rec = mysql_query($sql);
    $count = 0;

    while($row = mysql_fetch_object($rec))
    {
        $count++;
        $result = $row;
    }

    if($count == 1)
    {
        return 1;
    }

    else
    {
        return 0;
    }
}
?>
