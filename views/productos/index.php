<?php include_once '../../includes/header.php' ?>
<div class="container mt-5">
    <h1 class="text-center">Formulario de Productos</h1>
    <div class="row justify-content-center mb-3">
        <form class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="producto_id" id="producto_id">
            <div class="row mb-3">
                <div class="col">
                    <label for="producto_nombre">Nombre del Producto o Medicamento</label>
                    <input type="text" name="producto_nombre" id="producto_nombre" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="producto_descripcion">Descripción del Producto o Medicamento</label>
                    <input type="text" name="producto_descripcion" id="producto_descripcion" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="producto_precio">Precio del Producto o Medicamento</label>
                    <input type="number" name="producto_precio" id="producto_precio" class="form-control" required>
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
            <h2 class="text-center">Lista Productos</h2>
            <table class="table table-bordered table-hover" id="tablaProductos">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre Producto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">No hay productos disponibles</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script defer src="/farmacia/src/js/funciones.js"></script>
<script defer src="/farmacia/src/js/productos/index.js"></script>
<?php include_once '../../includes/footer.php' ?>
