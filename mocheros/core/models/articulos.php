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
	private $idencabezado = null;
	private $preciodetalle = null;
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
	
	public function setIdEncabezado($value)
	{
		if ($this->validateId($value)) {
            $this->idencabezado = $value;
            return true;
        } else {
            return false;
        }
	}

	public function getIdEncabezado()
	{
		return $this->idencabezado;
	}

	public function setPrecioDetalle($value)
	{
		if ($this->validateMoney($value)) {
			$this->preciodetalle = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getPrecioDetalle()
	{
		return $this->preciodetalle;
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

	//Metodo para observar las valoraciones de los productos
    public function readRatings(){
        $sql='SELECT Calificacion, articulos.NomArticulo as articulo, usuarios.NomUsuario as cliente FROM usuarios, articulos, calificaciones WHERE articulos.IdArticulos=calificaciones.IdArticulo AND usuarios.IdUsuario=calificaciones.IdUsuario and articulos.IdArticulos = ?';
        $params=array($this->idarticulos);
        return Database::getRows($sql, $params);
    }

	//Metodo para asignar puntuacion a un producto
    public function createRating(){
        $sql='INSERT INTO calificaciones (IdArticulo, IdUsuario, Calificacion) VALUES (?, ?, ?)';
        $params=array($this->idarticulos, $this->cliente, $this->calificacion);
        return Database::executeRow($sql, $params);
    }   
    //Metodo para validar que un usuario coloque solamente un comentario en un producto
    public function validateRatings(){
        $sql='SELECT * from calificaciones WHERE IdUsuario = ? and IdArticulo = ?';
        $params=array($this->cliente, $this->idarticulos);
        return Database::getRow($sql, $params);
    }

	public function getStock(){
        $sql='SELECT IdArticulos, Cantidad from Articulos where IdArticulos = ?';
        $params=array($this->idarticulos);
        return Database::getRow($sql, $params);
    }
    //Metodo para actualizar cantidad de producto
    public function updateStock(){
        $sql='UPDATE articulos SET Cantidad = (? +articulos.Cantidad)  WHERE IdArticulos = ?';
        $params=array($this->cantidad, $this->idarticulos);
        return Database::executeRow($sql,$params);
    }

	//Metodo para obtener preDetalle del cliente
    public function readPreDetalle(){
		$sql='SELECT IdPrePedido, articulos.NomArticulo as articulos, prepedidos.Cantidad as Cantidad, articulos.PrecioUnitario as PrecioUnitario, articulos.Foto as Foto, ROUND(articulos.PrecioUnitario * prepedidos.Cantidad, 2) as total , articulos.Cantidad as cantidadA 
		FROM articulos, prepedidos 
		WHERE articulos.IdArticulos = prepedidos.IdArticulos AND IdCliente = ?';
        $params=array($this->cliente);
        return Database::getRows($sql, $params);
    }

    public function getPreDetalle(){
        $sql='SELECT IdPrePedido, articulos.NomArticulo as articulos, prepedidos.Cantidad as Cantidad, articulos.PrecioUnitario as PrecioUnitario, articulos.Foto as Foto,(articulos.PrecioUnitario * prepedidos.Cantidad) as total , articulos.Cantidad as cantidadA 
		FROM articulos, prepedidos 
		WHERE articulos.IdArticulos = prepedidos.IdArticulos AND IdCliente = ?';
        $params=array($this->cliente);
        return Database::getRow($sql, $params);
	}
	
	//Metodo para insertar datos en tabla preDetalle
    public function insertPreDetalle(){
        $sql='INSERT INTO prepedidos (IdCliente, IdArticulos, Cantidad) VALUES (?, ?, ?)';
        $params=array($this->cliente, $this->idarticulos, $this->cantidad);
        return Database::executeRow($sql, $params);
    }

    //Metodo para actualizar cantidad en preDetalle
    public function updateCantidadPreDetalle(){
        $sql='UPDATE prepedidos set Cantidad = (prepedidos.Cantidad + ?) WHERE IdPrePedido = ?';
        $params=array($this->cantidad, $this->idPre);
        return Database::executeRow($sql, $params);
    }

    //Metodo para eliminar un preDetalle
    function deletePreDetalle(){
        $sql='DELETE FROM prepedidos WHERE IdCliente = ?';
        $params=array($this->cliente);
        return Database::executeRow($sql, $params);
	}

	public function getPreDetalle2(){
        $sql='SELECT IdPrePedido, articulos.NomArticulo as articulos, prepedidos.Cantidad as Cantidad, articulos.PrecioUnitario as precio, articulos.Foto as foto, ROUND(articulos.PrecioUnitario * prepedidos.Cantidad, 2) as total , articulos.Cantidad as cantidadA 
		FROM articulos, prepedidos 
		WHERE articulos.IdArticulos = prepedidos.IdArticulos AND IdPrePedido = ?';
        $params=array($this->idPre);
        return Database::getRow($sql, $params);
    }

    //Metodo para eliminar un preDetalle
    function deletePreDetalle2(){
        $sql='DELETE FROM prepedidos WHERE IdPrePedido = ?';
        $params=array($this->idPre);
        return Database::executeRow($sql, $params);
	}
	
	public function validateStock(){
        $sql='SELECT Cantidad FROM articulos WHERE IdArticulos = ?';
        $params=array($this->idarticulos);
        return Database::getRow($sql, $params);
    }

	public function createSale(){
        $sql = 'INSERT INTO encabezadopedidos(IdUsuario, Fecha, IdEstadoPedido) VALUES (?, (SELECT NOW()), 2)';
        $params = array($this->cliente);
        return Database::executeRow($sql,$params);
	}
	
	public function getLastSale(){
        $sql = 'SELECT IdEncabezado FROM encabezadopedidos WHERE IdUsuario = ? ORDER BY IdEncabezado DESC LIMIT 1';
        $params = array($this->cliente);
        $data = Database::getRow($sql, $params);
		if ($data) {
            $this->idencabezado = $data['IdEncabezado'];
            return true;
        } else{
            return false;
        }
    }
	
	public function createDetailsSale(){
		//esta hace el insert en la tabla detalle pedidos
        $sql = 'INSERT INTO detallepedidos(IdEncabezado, IdArticulos, CantidadArticulo, PrecioDetalle) VALUES(?, ?, ? ,?)';
        $params = array($this->idencabezado, $this->idarticulos, $this->cantidad, $this->preciounitario);
        Database::executeRow($sql,$params);
	}
	
	public function getPre(){
        $sql='SELECT art.IdArticulos AS Id, NomArticulo AS Nombre, DescripcionArt AS Descripcion, PrecioUnitario AS Precio, Foto AS Imagen, prepedidos.Cantidad AS cantidad
		 FROM prepedidos 
		 INNER JOIN articulos art USING(IdArticulos) WHERE IdCliente = ?';
        $params = array($this->cliente);
		$data = Database::getRow($sql,$params);
		if ($data) {
			$this->idarticulos = $data['Id'];
			$this->nomarticulo = $data['Nombre'];
			$this->descripcionart = $data['Descripcion'];
			$this->preciounitario = $data['Precio'];
			$this->foto = $data['Imagen'];
			$this->cantidad = $data['cantidad'];
            return true;
        } else{
            return false;
        }
	}
	
	function getProductosCategoria(){
        $sql = 'SELECT NomArticulo, PrecioUnitario, Cantidad, NomCategoria as categoria, ROUND((SELECT PrecioUnitario * Cantidad), 2) AS Subtotal 
		FROM articulos 
		INNER JOIN categorias USING (IdCategoria) 
		WHERE articulos.IdEstado = 1 ORDER BY categoria ASC';
        $params = array(null);
        return Database::getRows($sql, $params);
	}

	public function productosMaxVendidos(){
        $sql = 'SELECT COUNT(d.IdArticulos) AS CantidadArticulos, NomArticulo FROM articulos a INNER JOIN detallepedidos d USING(IdArticulos) GROUP BY NomArticulo LIMIT 5 ';
        $params = array(null);
        return Database::getRows($sql, $params);
	}

	public function productoCalificacion(){
        $sql = 'SELECT SUM(c.Calificacion) AS Calificacion, ROUND(AVG(calificacion), 2) AS Promedio, NomArticulo FROM calificaciones c INNER JOIN articulos a USING(IdArticulos) GROUP BY NomArticulo LIMIT 5 ';
        $params = array(null);
        return Database::getRows($sql, $params);
	}

	public function maximoConsumidor(){
        $sql = 'SELECT Nombre, Apellido, Fecha, ROUND(SUM(d.PrecioDetalle), 2) AS Total 
		FROM detallepedidos d INNER JOIN encabezadopedidos en USING(IdEncabezado) 
		INNER JOIN usuarios USING(IdUsuario) GROUP BY Nombre ORDER BY Total DESC';
        $params = array(null);
        return Database::getRows($sql, $params);
	}
	
	public function totalesCategorias(){

		$sql = 'SELECT c.NomCategoria, ROUND(SUM(PrecioUnitario * Cantidad),2) AS Total
		FROM articulos a INNER JOIN categorias c USING(IdCategoria) WHERE a.IdEstado = 1 GROUP BY c.NomCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	
}
