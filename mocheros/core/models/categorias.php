<?php
class Categorias extends Validator
{
    private $idcategoria = null;
    private $nomcategoria = null;

    public function setId($value)
	{
		if ($this->validateId($value)) {
			$this->idcategoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getId()
	{
		return $this->idcategoria;
	}

	public function setNombre($value)
	{
		if($this->validateAlphanumeric($value, 1, 50)) {
			$this->nomcategoria = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getNombre()
	{
		return $this->nomcategoria;
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
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias WHERE NomCategoria LIKE ? ORDER BY NomCategoria';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

/*	public function createCategoria()
	{
		$sql = 'INSERT INTO categorias(NomCategoria) VALUES(?)';
		$params = array($this->nomcategoria, $this->imagen, $this->descripcion);
		return Database::executeRow($sql, $params);
	}*/

	public function getCategoria()
	{
		$sql = 'SELECT IdCategoria, NomCategoria FROM categorias WHERE IdCategoria = ?';
		$params = array($this->idcategoria);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categorias SET NomCategoria = ? WHERE IdCategoria = ?';
		$params = array($this->nomcategoria, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteCategoria()
	{
		$sql = 'DELETE FROM categorias WHERE IdCategoria = ?';
		$params = array($this->idcategoria);
		return Database::executeRow($sql, $params);
	}
}
?>