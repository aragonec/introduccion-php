<?php
include "php/conexion.php";
$resultado = $conexion->query("select * from usuarios order by id DESC") or die($conexion->error);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi tienda</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?php include "layouts/header.php"; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include "layouts/sidebar.php"; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Usuarios</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Agregar usuario</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['error'])) {
                        ?>
                            <div class="alert alert-danger">
                                <b>Error:</b> <?php echo $_GET['error']; ?>
                            </div>
                        <?php
                        }
                        if (isset($_GET['success'])) {
                        ?>
                            <div class="alert alert-success">
                                <b>Listo!</b> <?php echo $_GET['success']; ?>
                            </div>
                        <?php
                        }
                        ?>

                        <form action="php/insertarUsuario.php" class="row" method="POST">
                            <div class="col-4">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" placeholder="Inserta tu nombre" name="nombre" id="txtNombre" required>
                            </div>
                            <div class="col-4">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" placeholder="Inserta tu apellido" name="ap" required>
                            </div>
                            <div class="col-4">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Inserta tu Email" name="email" required>
                            </div>
                            <div class="col-4">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Inserta tu password" name="pass1" required>
                            </div>
                            <div class="col-4">
                                <label for="">Confirmar Password</label>
                                <input type="password" class="form-control" placeholder="Confirma tu password" name="pass2" required>
                            </div>
                            <div class="col-4 p-2">
                                <br>
                                <button class="btn btn-primary"><i class="fa fa-plus"></i>Insertar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->
                <h2 class="subtitulo">Usuarios</h2>
                <table class="table">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                        while ($fila = mysqli_fetch_array($resultado)) {
                        ?>
                            <tr>
                                <td><?php echo $fila['id']; ?></td>
                                <td><?php echo $fila['nombre'] . ' ' . $fila['apellidos']; ?></td>
                                <td><?php echo $fila['email']; ?></td>
                                <td>*******</td>
                                <td>
                                    <button class="btn btn-sm btn-warning btnEdit"
                                    data-id="<?php echo $fila['id']; ?>"
                                    data-nombre="<?php echo $fila['nombre']; ?>"
                                    data-ap="<?php echo $fila['apellidos']; ?>"
                                    data-email="<?php echo $fila['email']; ?>"
                                    data-toggle="modal" data-target="#modal-editar"> 
                                    <i class="fa fa-edit"></i></button>

                                    <button class="btn btn-sm btn-danger btnEliminar"
                                    data-id="<?php echo $fila['id']; ?>"
                                    data-toggle="modal" data-target="#modal-eliminar"> 
                                    <i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php include "layouts/footer.php"; ?>
                <!-- Modal-EDITAR -->
        <div class="modal fade" id="modal-editar" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="php/editarUsuario.php" method="POST">
                    <div class="modal-body">
                    <div class="col-4">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" placeholder="Inserta tu nombre" name="nombre" id="nombreEdit" required>
                            </div>
                            <div class="col-12">
                                <label for="">Apellido</label>
                                <input type="text" class="form-control" placeholder="Inserta tu apellido" name="ap" id="apEdit" required>
                            </div>
                            <div class="col-12">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Inserta tu Email" name="email" id="emailEdit" required>
                            </div>
                            <div class="col-12">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Inserta tu password" name="pass1" >
                            </div>
                            <div class="col-12">
                                <label for="">Confirmar Password</label>
                                <input type="password" class="form-control" placeholder="Confirma tu password" name="pass2" >
                            </div>

                        <input type="hidden" id="idEditar" name="id">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-dark" 
                        data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-dark">Editar</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Modal-ELIMINAR -->
        <div class="modal fade" id="modal-eliminar" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="php/eliminarUsuario.php" method="POST">
                    <div class="modal-body">
                        <p>¿Deseas eliminar el usuario?</p>

                        <input type="hidden" id="idEliminar" name="id">

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" 
                        data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-outline-light">Eliminar</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dashboard/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dashboard/dist/js/demo.js"></script>
    <script>
    var idEliminar=0;
    $(document).ready(function(){
        $(".btnEliminar").click(function(){
            idEliminar=$(this).data('id');
            $("#idEliminar").val(idEliminar);
        });
        $(".btnEdit").click(function(){
            var idEdit=$(this).data('id');
            var nombre=$(this).data('nombre');
            var ap=$(this).data('ap');
            var email=$(this).data('email');
            $("#nombreEdit").val(nombre);
            $("#apEdit").val(ap);
            $("#emailEdit").val(email);
            $("#idEditar").val(idEdit);
        });
    });
    </script>
    </body>
</html>