<?php include_once '../../includes/header.php' ?>

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


<div class="container mt-5">
    <h1 class="text-center">Pedidos en Linea</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="factura_id" id="factura_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="factura_cliente">Seleccione el NIT del Cliente</label>
                    <select name="factura_cliente" id="factura_cliente" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($clientes as $cliente) : ?>
                            <option value="<?= $cliente['cliente_id'] ?>">
                                <?= $cliente['cliente_nit'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="factura_producto">Seleccione el Producto para agregar al carrito</label>
                    <select name="factura_producto" id="factura_producto" class="form-control" required>
                        <option value="">Seleccione...</option>
                        <?php foreach ($productos as $producto) : ?>
                            <option value="<?= $producto['producto_id'] ?>">
                                <?= $producto['producto_nombre'] ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="factura_cantidad">Inserte cantidad de productos</label>
                    <input type="number" name="factura_cantidad" id="factura_cantidad" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="factura_fecha">Inserte la fecha de compra</label>
                    <input type="date" name="factura_fecha" id="factura_fecha" class="form-control" required>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col">
                    <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
                </div>
                <div class="col">
                    <button type="button" id="btnCancelar" class="btn btn-secondary w-100">Cancelar</button>
                </div>
                <div class="col">
                    <button type="reset" id="btnLimpiar" class="btn btn-secondary w-100">Limpiar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8 table-responsive">
            <h2 class="text-center">Lista Compras</h2>
            <table class="table table-bordered table-hover" id="tablaFacturas">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIT</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay pedidos disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/farmacia/src/js/funciones.js"></script>
<script defer src="/farmacia/src/js/facturas/index.js"></script>
<?php include_once '../../includes/footer.php' ?>
