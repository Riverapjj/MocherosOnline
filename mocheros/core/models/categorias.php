<?php
class Categorias extends Validator
{
    private $idcategoria = null;
	private $nomcategoria = null;
	private $descripcion = null;
	private $idestado = null;

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

	public function setNomCategoria($value)
	{
		if($this->validateAlphanumeric($value, 1, 30)) {
			$this->nomcategoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNomCategoria()
	{
		return $this->nomcategoria;
	}
	
	public function setDescripcion($value)
	{
		if ($value) {
			if ($this->validateAlphanumeric($value, 1, 100)) {
				$this->descripcion = $value;
				return true;
			} else {
				return false;
			}
		} else {
			$this->descripcion = null;
			return true;
		}
	}

	public function getDescripcion()
	{
		return $this->descripcion;
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
    
    //Metodos para el manejo del CRUD
	public function readCategorias()
	{
		$sql = 'SELECT IdCategoria, NomCategoria, Descripcion, IdEstado FROM categorias ORDER BY NomCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchCategorias($value)
	{
		$sql = 'SELECT IdCategoria, NomCategoria, Descripcion FROM categorias WHERE NomCategoria LIKE ? ORDER BY NomCategoria';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categorias(NomCategoria, Descripcion, IdEstado) VALUES(?, ?, ?)';
		$params = array($this->nomcategoria, $this->descripcion, $this->idestado);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT IdCategoria, NomCategoria, Descripcion, IdEstado FROM categorias WHERE IdCategoria = ?';
		$params = array($this->idcategoria);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categorias SET NomCategoria = ?, Descripcion = ?, IdEstado = ? WHERE IdCategoria = ?';
		$params = array($this->nomcategoria, $this->descripcion, $this->idestado, $this->idcategoria);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categorias WHERE IdCategoria = ?';
		$params = array($this->idcategoria);
		return Database::executeRow($sql, $params);
	}

	public function productosCategorias(){

		$sql = 'SELECT NomCategoria, SUM(Cantidad) AS Cantidad 
		FROM categorias c, articulos a WHERE c.IdCategoria = a.IdCategoria GROUP BY c.IdCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function categoriasCantidad(){

		$sql = 'SELECT Nombre, Apellido, COUNT(IdEncabezado) AS Encabezados 
		FROM usuarios u, encabezadopedidos en WHERE u.IdUsuario = en.IdUsuario GROUP BY Nombre LIMIT 5 ';
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	
}
?>