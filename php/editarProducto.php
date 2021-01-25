<?php
    include"conexion.php";

    $id= $_POST['id'];
    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
    $inventario= $_POST['inventario'];

   
    $conexion->query("
    update productos set
        nombre='$nombre', 
        precio='$precio', 
        inventario='$inventario' where id=$id") or die($conexion ->error);
    echo "se actualizo correctamente";
    header("Location:../productos.php?success=Actualizado correctamente");

        die();
    
    ?>