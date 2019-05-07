<?php
class Usuarios extends Validator
{
    //Declaración de propiedades
    private $idusuario = null;
    private $idrol = null;
    private $nomusuario = null;
    private $nombre = null;
    private $apellido = null;
    private $direccion = null;
    private $telefono = null;
    private $email = null;
    private $clave = null;
    private $idestado = null;

    //Método para sobrecarga de propiedades
    public function setIdUsuario($value)
    {
        if ($this->validateId($value)) {
            $this->idusuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdUsuario()
    {
        return $this->idusuario;
    }

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

    public function setNomUsuario($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 30)) {
            $this->nomusuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getNomUsuario()
    {
        return $this->nomusuario;
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 1, 25)) {
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

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 1, 30)) {
            $this->apellido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function setDireccion($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 300)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setTelefono($value)
    {
        if ($this->validateNumeric($value)) {
            $this->telefono = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setEmail($value)
    {
        if ($this->validateEmail($value)) {
            $this->email = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setClave($value)
    {
        if ($this->validateId($value)) {
            $this->clave = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function setIdEstado($value)
    {
        if ($this->validateId($value)) {
            $this->idusuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getIdEstado()
    {
        return $this->idestado;
    }

    //Métodos para manejar la sesión del usuario
    public function checkUsuario()
    {
        $sql = 'SELECT IdUsuario FROM usuarios WHERE NomUsuario = ?';
        $params = array($this->nomusuario);
        $data = Database::getRow($sql, $params);
        if ($data) {
            $this->idusuario = $data['IdUsuario'];
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword()
    {
        $sql = 'SELECT Clave FROM usuarios WHERE IdUsuario = ?';
        $params = array($this->idusuario);
        $data = Database::getRow($sql, $params);
        if (password_verify($this->clave, $data['Clave'])) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET Clave = ? WHERE IdUsuario = ?';
        $params = array($hash, $this->id);
        return Database::executeRow($sql, $params);
    }

    //Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT IdRol, Nombre, Apellido, Telefono, Email, IdUsuario FROM usuarios ORDER BY Apellido';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuarios($value)
	{
		$sql = 'SELECT IdUsuario, NomUsuario, Nombre, Apellido, Email FROM usuarios WHERE Apellido LIKE ? OR Nombre LIKE ? ORDER BY Apellido';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}

	public function createCliente()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO usuarios(IdRol, NomUsuario, Nombre, Apellido, Direccion, Telefono, Email, Clave) VALUES(6, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nomusuario, $this->nombre, $this->apellido, $this->direccion, $this->telefono, $this->email, $hash);
		return Database::executeRow($sql, $params);
	}

	public function getUsuario()
	{
		$sql = 'SELECT IdUsuario, NomUsuario, Nombre, Apellido, Direccion, Telefono, Email FROM usuarios WHERE IdUsuario = ?';
		$params = array($this->idusuario);
		return Database::getRow($sql, $params);
    }
    
    public function readRoles(){

        $sql = 'SELECT IdRol, TipoRol FROM roles ORDER BY IdRol';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

	public function updateUsuario()
	{
		$sql = 'UPDATE usuarios SET NomUsuario = ?, Nombre = ?, Apellido = ?, Direccion = ?, Telefono = ?, Email = ? WHERE IdUsuario = ?';
		$params = array($this->nomusuario, $this->nombre, $this->apellido, $this->direccion, $this->telefono,  $this->email, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM usuarios WHERE IdUsuario = ?';
		$params = array($this->idusuario);
		return Database::executeRow($sql, $params);
	}
}
?>