<?php
    include"conexion.php";

    $nombre= $_POST['nombre'];
    $ap= $_POST['ap'];
    $email= $_POST['email'];
    $pass1= $_POST['pass1'];
    $pass2= $_POST['pass2'];
    $id= $_POST['id'];

    if(trim($pass1)==""&&trim($pass2)==""){
        $conexion->query("update usuarios set
        nombre='$nombre', 
        apellidos='$ap', 
        email='$email' where id=$id") or die($conexion ->error);
        header("Location:../usuarios.php?success=Actualizado correctamente");
    }else{
        if($pass1 == $pass2){
            $pass=sha1($pass1);
            $conexion->query("update usuarios set
            nombre='$nombre', 
            apellidos='$ap', 
            email='$email', 
            password= '$pass' where id=$id") or die($conexion ->error);
            header("Location:../usuarios.php?success=Actualizado correctamente");

        }else{
            header("Location:../usuarios.php?error=Las contraseñas no coinciden");
        }
    }
    ?>