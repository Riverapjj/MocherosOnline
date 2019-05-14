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
	private $foto = null;
	private $calificacion = null;
	private $comentario = null;
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
		if ($value == '1' || $value == '0') {
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

	public function getRuta()
	{
		return $this->ruta;
	}

	//Metodos para el manejo del CRUD
	public function readProductosCategoria()
	{
		$sql = 'SELECT NomCategoria, IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE IdCategoria = ? AND IdEstado = 1 ORDER BY NomArticulo';
		$params = array($this->idcategoria);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT IdArticulos, cat.NomCategoria, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, IdEstado FROM articulos art INNER JOIN categorias cat ON cat.IdCategoria = art.IdCategoria ORDER BY NomArticulo';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos($value)
	{
		$sql = 'SELECT IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario, NomCategoria, IdEstado FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE NomArticulo LIKE ? OR DescripcionArt LIKE ? ORDER BY NomArticulo';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function readCategorias()
	{
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias';
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
}
