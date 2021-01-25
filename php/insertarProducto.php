<?php
    include"conexion.php";

    $nombre= $_POST['nombre'];
    $precio= $_POST['precio'];
    $inventario= $_POST['inventario'];

    $nomImagen= $_FILES['imagen']['name'];
    $tmp_extension = explode(".",$nomImagen);
    $extension = end($tmp_extension);
    $nombreFinal = time().".".$extension;
    echo $nombreFinal;
    if($extension == 'jpg' || $extension =='png' ||$extension == 'JPG' || $extension =='PNG'){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], "../img/productos/".$nombreFinal)){
            
            $conexion->query("
            insert into productos (nombre, precio, inventario, imagen) 
            values ('$nombre',$precio,$inventario, '$nombreFinal')
            ") or die($conexion ->error);
            echo "Producto agregado correctamente";
            header("Location:../productos.php");
        }else{
            header("Location:../productos.php?error=Ocurrio un error al subir la imagen");
        }
    }else{
        header("Location:../productos.php?error=Tipo de imagen no valido");
    }
        die();
    
?>