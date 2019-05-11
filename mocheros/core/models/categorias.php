<?php
class Categorias extends Validator
{
    private $idcategoria = null;
	private $nomcategoria = null;
	private $descripcion = null;

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
    
    //Metodos para el manejo del CRUD
	public function readCategorias()
	{
		$sql = 'SELECT IdCategoria, NomCategoria, Descripcion FROM categorias ORDER BY NomCategoria';
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
		$sql = 'INSERT INTO categorias(NomCategoria, Descripcion) VALUES(?, ?)';
		$params = array($this->nomcategoria, $this->descripcion);
		return Database::executeRow($sql, $params);
	}

	public function getCategoria()
	{
		$sql = 'SELECT IdCategoria, NomCategoria, Descripcion FROM categorias WHERE IdCategoria = ?';
		$params = array($this->idcategoria);
		return Database::getRow($sql, $params);
	}

	public function updateCategoria()
	{
		$sql = 'UPDATE categorias SET NomCategoria = ?, Descripcion = ? WHERE IdCategoria = ?';
		$params = array($this->nomcategoria, $this->descripcion, $this->idcategoria);
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