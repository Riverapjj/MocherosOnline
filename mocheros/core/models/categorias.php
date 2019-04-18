<?php
class Categorias extends Validator
{
    private $id = null;
    private $nombre = null;

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

	public function setNombre($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
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
    
    //Metodos para el manejo del CRUD
	public function readCategorias()
	{
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias ORDER BY NomCategoria';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchCategorias($value)
	{
		$sql = 'SELECT * FROM categorias WHERE NomCategoria LIKE ? ORDER BY NomCategoria';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCategoria()
	{
		$sql = 'INSERT INTO categorias(NomCategoria) VALUES(?)';
		$params = array($this->nombre, $this->imagen, $this->descripcion);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias WHERE IdCategoria = ?';
		$params = array($this->id);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categorias SET NomCategoria = ? WHERE IdCategoria = ?';
		$params = array($this->nombre, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categorias WHERE IdCategoria = ?';
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}
}
?>