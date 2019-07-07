<?php
class Articulos extends Validator
{
	//Declaración de propiedades
	private $idarticulos = null;
	private $idcategoria = null;
	private $idestado = null;
	private $nomarticulo = null;
	private $descripcionart = null;
	private $preciounitario = null;
	private $cantidad = null;
	private $cliente = null;
	private $foto = null;
	private $calificacion = null;
	private $comentario = null;
	private $idPre = null;
	private $ruta = '../../resources/img';

	public function setIdArticulos($value)
	{
		if ($this->validateId($value)) {
			$this->idarticulos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdArticulos()
	{
		return $this->idarticulos;
	}

	public function setIdCategoria($value)
	{
		if ($this->validateId($value)) {
			$this->idcategoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdCategoria()
	{
		return $this->idcategoria;
	}

	public function setNomArticulo($value)
	{
		if ($this->validateAlphanumeric($value, 1, 35)) {
			$this->nomarticulo = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNomArticulo()
	{
		return $this->nomarticulo;
	}

	public function setDescripcionArt($value)
	{
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->descripcionart = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDescripcionArt()
	{
		return $this->descripcionart;
	}

	public function setPrecioUnitario($value)
	{
		if ($this->validateMoney($value)) {
			$this->preciounitario = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPrecioUnitario()
	{
		return $this->preciounitario;
	}

	public function setCantidad($value)
	{
		if ($this->validateNumeric($value)) {
			$this->cantidad = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCantidad()
	{
		return $this->cantidad;
	}

	public function setCliente($value){
        if($this->validateId($value)){
            $this->cliente=$value;
            return true;
        }else{
            return false;
        }
    }

    public function getCliente(){
        return $this->cliente;
    }

	public function setFoto($file, $name)
	{
		if ($this->validateImageFile($file, $this->ruta, $name, 500, 500)) {
			$this->foto = $this->getImageName();
			return true;
		} else {
			return false;
		}
	}

	public function getFoto()
	{
		return $this->foto;
	}

	public function setCalificacion($value)
	{
		if ($value == '1' || $value == '2' || $value == '3' || $value == '4' || $value == '5') {
			$this->calificacion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCalificacion()
	{
		return $this->calificacion;
	}

	public function setComentario($value)
	{
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getComentario()
	{
		return $this->comentario;
	}

	public function setIdEstado($value)
    {
        if ($this->validateId($value)) {
            $this->idestado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdEstado()
    {
        return $this->idestado;
	}
	
	public function setIdPre($value){
        if($this->validateId($value)){
            $this->idPre=$value;
            return true;
        }else{
            return false;
        }
    }

    
    public function getidPre(){
        return $this->idPre;
    }

	public function getRuta()
	{
		return $this->ruta;
	}

	//Metodos para el manejo del CRUD
	public function readProductosCategoria()
	{
		$sql = 'SELECT NomCategoria, IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario FROM articulos a INNER JOIN categorias USING(IdCategoria) WHERE IdCategoria = ? AND a.IdEstado = 1 ORDER BY NomArticulo';
		$params = array($this->idcategoria);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT IdArticulos, cat.NomCategoria, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, art.IdEstado FROM articulos art INNER JOIN categorias cat ON cat.IdCategoria = art.IdCategoria ORDER BY NomArticulo';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos($value)
	{
		$sql = 'SELECT IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario, NomCategoria, IdEstado FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE NomArticulo LIKE ? OR DescripcionArt LIKE ? ORDER BY NomArticulo';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function searchArticulos($value)
	{
		$sql = 'SELECT IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario, NomCategoria, IdEstado FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE NomArticulo LIKE ? OR DescripcionArt LIKE ? ORDER BY NomArticulo';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function readCategorias()
	{
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias WHERE IdEstado = 1';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function createProducto()
	{
		$sql = 'INSERT INTO articulos(IdCategoria, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, IdEstado) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->idcategoria, $this->nomarticulo, $this->descripcionart, $this->preciounitario, $this->cantidad, $this->foto, $this->idestado);
		return Database::executeRow($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT IdArticulos, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, IdCategoria, IdEstado FROM articulos WHERE IdArticulos = ?';
		$params = array($this->idarticulos);
		return Database::getRow($sql, $params);
	}

	public function selectArticulo()
	{
		$sql = 'SELECT Foto, NomArticulo, PrecioUnitario WHERE IdArticulos = ? LIMIT 1';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE articulos SET IdCategoria = ?, NomArticulo = ?, DescripcionArt = ?, PrecioUnitario = ?, Cantidad = ?, Foto = ?, IdEstado = ? WHERE IdArticulos = ?';
		$params = array($this->idcategoria, $this->nomarticulo, $this->descripcionart, $this->preciounitario, $this->cantidad, $this->foto, $this->idestado, $this->idarticulos);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM articulos WHERE IdArticulos = ?';
		$params = array($this->idarticulos);
		return Database::executeRow($sql, $params);
	}

	public function rateProducto()
	{
		$sql = 'UPDATE articulos SET Calificacion = ? WHERE IdArticulos = ?';
		$params = array($this->calificacion, $this->idarticulos);
		return Database::executeRow($sql, $params);
	}

	public function commentProducto()
	{
		$sql = 'UPDATE articulos SET Comentario = ? WHERE IdArticulos = ?';
		$params = array($this->comentario, $this->idarticulos);
		return Database::executeRow($sql, $params);
	}

	//Metodo para obtener preDetalle del cliente
    public function readPreDetalle(){
		$sql='SELECT IdPrePedido, articulos.NomArticulo as articulos, prepedidos.Cantidad as Cantidad, articulos.PrecioUnitario as PrecioUnitario, articulos.Foto as Foto, ROUND(articulos.PrecioUnitario * prepedidos.Cantidad, 2) as total , articulos.Cantidad as cantidadA FROM articulos, prepedidos WHERE articulos.IdArticulos = prepedidos.IdArticulo AND IdCliente = ?';
        $params=array($this->cliente);
        return Database::getRows($sql, $params);
    }

    public function getPreDetalle(){
        $sql='SELECT IdPrePedido, articulos.NomArticulo as articulos, prepedidos.Cantidad as Cantidad, articulos.PrecioUnitario as PrecioUnitario, articulos.Foto as Foto,(articulos.PrecioUnitario * prepedidos.Cantidad) as total , articulos.Cantidad as cantidadA FROM artiuclos, prepedidos WHERE articulos.IdArticulos = prepedidos.IdArticulo AND IdCliente = ?';
        $params=array($this->cliente);
        return Database::getRow($sql, $params);
	}
	
	//Metodo para insertar datos en tabla preDetalle
    public function insertPreDetalle(){
        $sql='INSERT INTO prepedidos (IdCliente, IdArticulo, Cantidad) VALUES (?, ?, ?)';
        $params=array($this->cliente, $this->idarticulos, $this->cantidad);
        return Database::executeRow($sql, $params);
    }

    //Metodo para actualizar cantidad en preDetalle
    public function updateCantidadPreDetalle(){
        $sql='UPDATE prepedidos set Cantidad = (prepedidos.Cantidad + ?) WHERE IdPrePedido = ?';
        $params=array($this->cantidad, $this->IdPrePedido);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar un preDetalle
    function deletePreDetalle(){
        $sql='DELETE FROM prepedidos WHERE IdCliente = ?';
        $params=array($this->cliente);
        return Database::executeRow($sql, $params);
	}

	public function createSale(){
        $sql = 'INSERT INTO encabezadopedidos(IdUsuario, Fecha, IdEstadoPedido) VALUES (?, (SELECT NOW()), 2)';
        $params = array($this->cliente);
        return Database::executeRow($sql,$params);
    }
	
	public function createDetailsSale(){
        $sql = 'INSERT INTO detallepedidos(IdEncabezado, IdArticulo, CantidadArticulo, PrecioDetalle) VALUES(?, ? ,?, ?, ?)';
        $params = array($this->id,$this->cantidad,$this->cliente);
        Database::executeRow($sql,$params);
    }
}
