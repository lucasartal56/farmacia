<?php
require_once 'Conexion.php';

class Factura extends Conexion
{
    public $factura_id;
    public $factura_cliente;
    public $factura_producto;
    public $factura_cantidad;
    public $factura_fecha;
    public $factura_situacion;


    public function __construct($args = [])
    {
        $this->factura_id = $args['factura_id'] ?? null;
        $this->factura_cliente = $args['factura_cliente'] ?? '';
        $this->factura_producto = $args['factura_producto'] ?? '';
        $this->factura_cantidad = $args['factura_cantidad'] ?? '';
        $this->factura_fecha = $args['factura_fecha'] ?? '';
        $this->factura_situacion = $args['factura_situacion'] ?? '';

    }

    public function guardar()
    {
        $sql = "INSERT INTO facturas(factura_cliente, factura_producto, factura_cantidad, factura_fecha) values('$this->factura_cliente','$this->factura_producto','$this->factura_cantidad','$this->factura_fecha')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar()
    {
        //$sql = "SELECT * from facturas where factura_situacion = 1 ";
        //$sql = "SELECT facturas.*, clientes.*, productos.* FROM facturas INNER JOIN clientes ON facturas.factura_cliente = clientes.cliente_id INNER JOIN productos ON facturas.factura_producto = productos.producto_id 
        //WHERE facturas.factura_situacion = 1;"; 

        $sql= "SELECT clientes.cliente_id, productos.producto_id, facturas.factura_id, clientes.cliente_nit, productos.producto_nombre, facturas.factura_cantidad, facturas.factura_fecha FROM facturas INNER JOIN clientes ON facturas.factura_cliente = clientes.cliente_id INNER JOIN productos ON facturas.factura_producto = productos.producto_id WHERE facturas.factura_situacion = 1;";

        if ($this->factura_cliente != '') {
            $sql .= " and factura_cliente like '$this->factura_cliente' ";
        }

        if ($this->factura_producto != '') {
            $sql .= " and factura_producto like '$this->factura_producto' ";
        }

        if ($this->factura_cantidad != null) {
            $sql .= " and factura_cantidad = $this->factura_cantidad ";
        }
        
        if ($this->factura_fecha != null) {
            $sql .= " and factura_fecha = $this->factura_fecha ";
        }

        if ($this->factura_id != null) {
            $sql .= " and factura_id = $this->factura_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscarFacturas()
    {
        

        $sql= "SELECT clientes.cliente_nombre, clientes.cliente_apellido, clientes.cliente_nit, clientes.cliente_telefono, productos.producto_nombre, productos.producto_descripcion, productos.producto_precio, facturas.factura_cantidad, facturas.factura_fecha 
        FROM facturas INNER JOIN clientes ON facturas.factura_cliente = clientes.cliente_id INNER JOIN productos ON facturas.factura_producto = productos.producto_id 
        WHERE facturas.factura_situacion = 1 AND clientes.cliente_situacion = 1 AND productos.producto_situacion = 1;";

        if ($this->factura_cliente != '') {
            $sql .= " and factura_cliente like '$this->factura_cliente' ";
        }

        if ($this->factura_producto != '') {
            $sql .= " and factura_producto like '$this->factura_producto' ";
        }

        if ($this->factura_cantidad != null) {
            $sql .= " and factura_cantidad = $this->factura_cantidad ";
        }
        
        if ($this->factura_fecha != null) {
            $sql .= " and factura_fecha = $this->factura_fecha ";
        }

        if ($this->factura_id != null) {
            $sql .= " and factura_id = $this->factura_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
         $sql = "UPDATE facturas SET factura_cliente = '$this->factura_cliente', factura_producto = '$this->factura_producto', factura_cantidad = '$this->factura_cantidad', factura_fecha = '$this->factura_fecha' where factura_id = '$this->factura_id'";

         $resultado = self::ejecutar($sql);
         return $resultado;
    }

    public function mostrarFacturas(){
        $sql = "SELECT * FROM Facturas where factura_situacion = 1";
        $resultado = self::servir($sql);
        return $resultado;

    }

    

    public function eliminar()
    {
        $sql = "UPDATE facturas SET factura_situacion = 0 where factura_id = '$this->factura_id'";

     $resultado = self::ejecutar($sql);
     return $resultado;
 }
}
