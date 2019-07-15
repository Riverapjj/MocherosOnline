<?php
class Pedidos extends Validator{
    //Atributos de la clase
    private $id=null;
    private $idcliente=null;
    private $fecha=null;
    private $idestado=null;

    public function setId($value){
        if($this->validateId($value)){
            $this->id=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setIdCliente($value){
        if($this->validateId($value)){
            $this->idcliente=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getIdCliente(){
        return $this->idcliente;
    }

    public function setFecha($value){
        if($this->validateDate($value)){
            $this->fecha=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function setIdEstado(){
        if($this->validateId($value)){
            $this->idestado=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getIdEstado(){
        return $this->idestado;
    }

    //Metodos para el manejo de SCRUD
    public function readPedidos(){
        $sql='SELECT IdEncabezado, u.Nombre, u.Apellido, Fecha, TipoEstado 
        FROM encabezadopedidos en INNER JOIN usuarios u USING (IdUsuario) 
        INNER JOIN estadopedidos es USING(IdEstadoPedido) ORDER by IdEncabezado ASC ';
        $params=array(null);
        return Database::getRows($sql, $params);
    }

    public function obtenerDetalle(){
        $sql='SELECT idDetalle,nombre, detalle_venta.cantidad, producto.precio,  (producto.precio * detalle_venta.cantidad) AS Total FROM detalle_venta, producto WHERE producto.idProducto= detalle_venta.idProducto AND idVenta = ?';
        $params=array($this->id);
        return Database::getRows($sql,$params);
    }

    public function searchVenta()
    {
        $sql='SELECT idVenta, nombre, fecha_hora, estadoventa.estado FROM cliente, estadoventa, venta WHERE cliente.idCliente=venta.idCliente AND estadoventa.idEstado=venta.idEstado AND fecha_hora = ?  ORDER by idVenta ASC';
        $params=array($this->fecha);
        return Database::getRows($sql, $params);
    }

    public function ventaCliente()
    {
        $sql='SELECT idVenta, nombre, fecha_hora, estadoventa.estado FROM venta, estadoventa, cliente WHERE cliente.idCliente= venta.idCliente AND estadoventa.idEstado= venta.idEstado AND venta.idCliente = ?';
        $params=array($this->idcliente);
        return Database::getRows($sql, $params);

    }

    public function getSalesReport()
    {
        $sql = 'SELECT producto.nombre as producto, detalle_venta.cantidad as cantidad, cliente.nombre as clienteN, cliente.apellido as clienteA, venta.fecha_hora as fecha, (producto.precio * detalle_venta.cantidad)as total, producto.precio as precioU FROM detalle_venta INNER JOIN venta ON detalle_venta.idVenta = venta.idVenta INNER JOIN cliente ON cliente.idCliente=venta.idCliente INNER JOIN producto ON producto.idProducto = detalle_venta.idProducto WHERE idEstado = 1 ORDER BY venta.fecha_hora';
        $params= array(null);
        return Database::getRows($sql, $params);
    }

    public function updateStateSale()
    {
        $sql = 'UPDATE venta set idEstado = 1 WHERE idVenta = ?';
        $params = array($this->id);
        return Database::executeRow($sql, $params);
    }

    public function reportePedidos()
    {
        $sql = 'SELECT cliente.idCliente as idC, cliente.nombre as clienteN, cliente.apellido clienteA, 
        producto.nombre nombreP, producto.precio, precio, detalle_venta.cantidad as cantidad, 
        venta.idVenta as idV, venta.fecha_hora as fecha, cliente.telefono as telefono, cliente.correo as correo, 
        cliente.direccion as direccion, (producto.precio * detalle_venta.cantidad)as subtotal, producto.precio as precioU
        FROM detalle_venta INNER JOIN venta ON detalle_venta.idVenta = venta.idVenta 
        INNER join producto ON producto.idProducto = detalle_venta.idProducto INNER JOIN cliente 
        ON venta.idCliente = cliente.idCliente AND venta.idEstado = 2 order by venta.idVenta asc';
        
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function getLastSale()
    {
        $sql = 'SELECT MAX(idVenta) as idV, fecha_hora as fecha, cliente.nombre as CN, cliente.apellido as CA, cliente.telefono as telefono, cliente.direccion, cliente.correo as correo FROM venta, cliente WHERE venta.idCliente = cliente.idCliente and venta.idCliente = ? and venta.idEstado = 2';
        $params = array($this->idcliente);
        return Database::getRow($sql,$params);
    }

    public function getSaleDetailReport()
    {
        $sql = 'SELECT idDetalle,nombre as producto, detalle_venta.cantidad as cantidad, producto.precio as precio, (producto.precio * detalle_venta.cantidad) AS Total FROM detalle_venta, producto WHERE producto.idProducto= detalle_venta.idProducto AND idVenta = ?';
        $params = array($this->id);
        return Database::getRows($sql, $params);
    }

    public function getCustomerSales()
    {
        $sql = 'SELECT count(venta.idCliente) as compras, cliente.nombre as CN, cliente.apellido as CA FROM venta, cliente WHERE venta.idCliente = cliente.idCliente GROUP by cliente.idCliente ORDER by compras DESC';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function salesForDate()
    {
        $sql = 'SELECT venta.fecha_hora as fecha, SUM(producto.precio * detalle_venta.cantidad) as total FROM detalle_venta INNER JOIN producto using(idProducto) INNER JOIN venta ON venta.idVenta = detalle_venta.idVenta GROUP BY venta.fecha_hora ORDER by total DESC LIMIT 5';
        $params = array(null);
        return Database::getRows($sql, $params); 
    }

    public function estadosChart()
    {
        $sql = 'SELECT COUNT(en.IdEstadoPedido) AS Estado, TipoEstado FROM encabezadopedidos en, estadopedidos es WHERE en.IdEstadoPedido = es.IdEstadoPedido GROUP BY TipoEstado';
        $params = array(null);
        return Database::getRows($sql, $params); 
    }

    public function pedidosFechas($fecha1, $fecha2)
    {
        $sql = 'SELECT en.IdEncabezado, Nombre, Apellido, Email, Fecha, ROUND(SUM(PrecioDetalle), 2) AS Total 
        FROM detallepedidos d INNER JOIN encabezadopedidos en USING(IdEncabezado) 
        INNER JOIN usuarios u USING(IdUsuario) 
        WHERE Fecha BETWEEN '.$fecha1.' AND '.$fecha2.'  GROUP BY IdEncabezado ORDER BY Total DESC';
        $params = array(null);
        return Database::getRows($sql, $params); 
    }

    public function selectEstadoPedidosReport()
    {
        $sql = 'SELECT IdEstadoPedido, TipoEstado FROM estadopedidos';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

    public function pedidosEstados($IdEstadoPedido)
    {
        $sql = 'SELECT en.IdEncabezado AS encabezado, Nombre, Apellido, Email, Fecha, es.TipoEstado,ROUND(SUM(PrecioDetalle), 2) AS Total 
        FROM detallepedidos d INNER JOIN encabezadopedidos en USING(IdEncabezado) 
        INNER JOIN usuarios u USING(IdUsuario) 
        INNER JOIN estadopedidos es USING(IdEstadoPedido) WHERE IdEstadoPedido = '.$IdEstadoPedido.' GROUP BY IdEncabezado ORDER BY Fecha ASC ';
        $params = array(null);
        return Database::getRows($sql, $params); 
    }

    public function mayoresVentas()
    {
        $sql = 'SELECT ROUND(SUM(PrecioDetalle), 2) AS Total, en.IdEncabezado, Nombre, Apellido, Fecha 
        FROM detallepedidos d INNER JOIN encabezadopedidos en USING(IdEncabezado) 
        INNER JOIN usuarios u USING(IdUsuario) WHERE en.IdEstadoPedido = 2 GROUP BY IdEncabezado ORDER BY Total DESC ';
        $params = array(null);
        return Database::getRows($sql, $params);
    }
    

    
    


}
?>