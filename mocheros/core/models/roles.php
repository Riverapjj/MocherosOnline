<?php
class Roles extends Validator{
    private $idrol = null;
		private $tiporol = null;

    //Métodos set y get para cada variable

    public function setIdRol($value)
	{
		if ($this->validateId($value)) {
			$this->idrol = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIdRol()
	{
		return $this->idrol;
    }
    
    public function setTipoRol($value)
	{
		if ($this->validateAlphanumeric($value, 1, 50)) {
			$this->tiporol = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getTipoRol()
	{
		return $this->tiporol;
    }
    
    //Métodos SCRUD para roles

   /* public function readRoles()
	{
		$sql = 'SELECT IdRol, TipoRol FROM roles INNER JOIN categorias USING(id_categoria) ORDER BY nombre_producto';
		$params = array(null);
		return Database::getRows($sql, $params);
    }*/
    
    public function searchRoles($value)
	{
		$sql = 'SELECT IdRol, TipoRol FROM roles  WHERE TipoRol LIKE ? ORDER BY TipoRol';
		$params = array("%$value%");
		return Database::getRows($sql, $params);
    }
    
    public function createRoles()
	{
		$sql = 'INSERT INTO roles(TipoRol) VALUES(?)';
		$params = array($this->tiporol);
		return Database::executeRow($sql, $params);
    }
    
    public function getRol()
	{
		$sql = 'SELECT IdRol, TipoRol FROM roles WHERE IdRol = ?';
		$params = array($this->idrol);
		return Database::getRow($sql, $params);
	}

	public function updateRoles()
	{
		$sql = 'UPDATE roles SET TipoRol = ?, IdRol = ? WHERE IdRol = ?';
		$params = array($this->tiporol, $this->idrol);
		return Database::executeRow($sql, $params);
	}

	public function deleteRoles()
	{
		$sql = 'DELETE FROM roles WHERE IdRol = ?';
		$params = array($this->idrol);
		return Database::executeRow($sql, $params);
	}
}

?>