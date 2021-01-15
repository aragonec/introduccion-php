<?php
    include"conexion.php";

    $nombre= $_POST['nombre'];
    $ap= $_POST['ap'];
    $mail= $_POST['mail'];
    $pass1= $_POST['pass1'];
    $pass2= $_POST['pass2'];
    if($pass1 != $pass2){
        echo "el password es diferente";
        header("Location:../usuarios.php?error=Las contraseñas no coinciden");
    }else{
        $pass1=sha1($pass1);
        $conexion->query("insert into usuarios (nombre, apellidos, email, password,img_perfil) values 
        ('$nombre','$ap','$mail','$pass1','default')") or die($conexion ->error);
        echo "Insertado Correctamente";
        header("Location:../usuarios.php");
    }
?>