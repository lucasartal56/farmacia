<?php include_once '../../includes/header.php' ?>


<?php require_once '../../models/Factura.php';?>
<?php require_once '../../models/Cliente.php';?>
<?php require_once '../../models/Producto.php';?>

<?php
$verClientes = new Cliente();
$clientes = $verClientes->mostrarClientes();
?>

<?php
$verProductos = new Producto();
$productos = $verProductos->mostrarProductos();
?>

<?php
$verFacturas = new Factura();
$facturas = $verFacturas->mostrarFacturas();
?>




<div class="container mt-5">
    
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Lista Compras</h2>
            <table class="table table-bordered table-hover" id="tablaFacturas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>NIT</th>
                        <th>Telefono</th>
                        <th>Producto</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
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
                            <td><?= $opciones['producto_precio'] ?></td>
                            <td><?= $opciones['factura_cantidad'] ?></td>
                            <td><?= $opciones['factura_fecha'] ?></td>

                        </tr>
                    <?php endforeach ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5">No hay pedidos disponibles</td>
                    </tr>
                <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
<script defer src="/farmacia/src/js/funciones.js"></script>
<script defer src="/farmacia/src/js/facturas/index.js"></script>
<?php include_once '../../includes/footer.php' ?>
