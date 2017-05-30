<?php
    session_start();
    session_destroy();

    //el header(‘location: index.php’) redireccionara al usuario al index.php
    header('location: index.php');

    ?>
