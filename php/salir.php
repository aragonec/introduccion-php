<?php
    session_start();
    unset($_SESSION['userData']);//eliminar una sola variable de sesion
    session_destroy();//eliminar todas las sesiones activas
    header("Location: ../login.php");
?>