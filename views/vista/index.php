<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../../modelos/Cliente.php';
require '../../modelos/Producto.php';
require '../../modelos/Factura.php';

$busqueda = []; // Inicializar la variable $busqueda

try {
    $buscar = new Factura();
    $busqueda = $buscar->mostrarFacturas();

} catch (PDOException $e) {
    $error = $e->getMessage();
} 
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-11table-responsive text-center">
            <table class="table table-bordered" style="font-family:'Courier New', Courier, monospace; background-color: darkgoldenrod;">
                <thead>
                    <tr class="text-center table-primary table-bordered rounded border border-primary">
                        <th colspan="9">Pedidos añadidos al carrito</th>
                    </tr>
                </thead>
                
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nit</th>
                    <th>Telefono</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                </tr>
                <?php if(count($busqueda) > 0) { ?>
                    <?php foreach ($busqueda as $key => $opciones) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $opciones['cliente_nombre'] ?></td>
                            <td><?= $opciones['cliente_apellido'] ?></td>
                            <td><?= $opciones['cliente_nit'] ?></td>
                            <td><?= $opciones['cliente_telefono'] ?></td>
                            <td><?= $opciones['producto_nombre'] ?></td>
                            <td><?= $opciones['producto_descripcion'] ?></td>
                            <td><?= $opciones['factura_cantidad'] ?></td>
                            <td><?= $opciones['factura_fecha'] ?></td>

                        </tr>
                    <?php endforeach ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="7">Sin productos añadidos al carrito</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include_once '../../includes/footer.php'?>