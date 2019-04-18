<?php
class Articulos extends Validator{
    //Declaración de propiedades
    private $id = null;
    private $categoria = null;
    private $nombre = null;
    private $descripcion = null;
    private $precio = null;
    private $cantidad = null;
    private $foto = null;
    private $estado = null;
    private $ruta = '../../resources/img/articulos/';

    public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->id = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->id;
    }
    
    public function setCategoria($value)
	{
		if ($this->validateId($value)) {
			$this->categoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getCategoria()
	{
		return $this->categoria;
	}

	public function setNombre($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->nombre = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nombre;
    }
    
    public function setDescripcion($value)
	{
		if ($this->validateAlphanumeric($value, 1, 200)) {
			$this->descripcion = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getDescripcion()
	{
		return $this->descripcion;
    }
    
    public function setPrecio($value)
	{
		if ($this->validateMoney($value)) {
			$this->precio = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPrecio()
	{
		return $this->precio;
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
		return $this->precio;
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
    
    public function setEstado($value)
	{
		if ($value == '1' || $value == '0') {
			$this->estado = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getEstado()
	{
		return $this->estado;
    }
    
    public function getRuta()
	{
		return $this->ruta;
    }
    
    //Metodos para el manejo del CRUD
	public function readProductosCategoria()
	{
		$sql = 'SELECT NomCategoria, IdArticulos, Foto, NomArticulo, DescripcionArt, Precio FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE IdCategoria = ? AND Estado = 1 ORDER BY NomArticulo';
		$params = array($this->categoria);
		return Database::getRows($sql, $params);
	}

	public function readProductos()
	{
		$sql = 'SELECT IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario, NomCategoria, Estado FROM articulos INNER JOIN categorias USING(IdCategoria) ORDER BY NomArticulo';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProductos($value)
	{
		$sql = 'SELECT IdArticulos, Foto, NomArticulo, DescripcionArt, PrecioUnitario, NomCategoria, Estado FROM articulos INNER JOIN categorias USING(IdCategoria) WHERE NomArticulo LIKE ? OR DescripcionArt LIKE ? ORDER BY NomArticulo';
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
		$sql = 'INSERT INTO articulos(IdCategoria, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, Estado) VALUES(?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->categoria, $this->nombre, $this->descripcion, $this->precio, $this->cantidad, $this->foto, $this->estado);
		return Database::executeRow($sql, $params);
	}

	public function getProducto()
	{
		$sql = 'SELECT IdArticulos, NomArticulo, DescripcionArt, PrecioUnitario, Cantidad, Foto, Estado, IdCategoria FROM articulos WHERE IdArticulos = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateProducto()
	{
		$sql = 'UPDATE articulos SET IdCategoria = ?, NomArticulo = ?, DescripcionArt = ?, PrecioUnitario = ?, Cantidad = ?, Foto = ?, Estado = ? WHERE IdArticulos = ?';
		$params = array($this->categoria, $this->nombre, $this->descripcion, $this->precio, $this->cantidad, $this->foto, $this->estado, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto()
	{
		$sql = 'DELETE FROM articulos WHERE IdArticulos = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>