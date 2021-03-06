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
    private $intentos = null;
    private $token = null;

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
        $validator = $this->validatePassword($value);
        if ($validator[0]) {
            $this->clave = $value;
            return array(true, '');
        } else {
            return array(false, $validator[1]);
        }
    }

    public function getClave()
    {
        return $this->clave;
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
    
    public function setIntentos($value)
	{
		if ($this->validateNumeric($value)) {
			$this->intentos = $value;
			return true;
		} else {
			return false;
		}
	}

	public function getIntentos()
	{
		return $this->intentos;
    }

    public function setToken($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 32)) {
            $this->token = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getToken()
    {
        return $this->token;
    }
    
    //Métodos para manejar la sesión del usuario
    public function checkNomUsuario()
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
        $sql = 'UPDATE usuarios SET Clave = ?, FechaClave = CURRENT_TIME WHERE IdUsuario = ?';
        $params = array($hash, $this->idusuario);
        return Database::executeRow($sql, $params);
    }

    //Metodos para manejar el CRUD
	public function readUsuarios()
	{
		$sql = 'SELECT IdRol, Nombre, Apellido, Telefono, Email, u.IdEstado, IdUsuario 
        FROM usuarios u ORDER BY Apellido';
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchUsuarios($value)
	{
		$sql = 'SELECT IdUsuario, NomUsuario, Nombre, Apellido, Email 
        FROM usuarios WHERE Apellido LIKE ? OR Nombre LIKE ? ORDER BY Apellido';
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
    }

    public function registerUsuario()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO usuarios(IdRol,  IdEstado, NomUsuario, Nombre, Apellido, Direccion, Telefono, Email, Clave) VALUES(1, 1, ?, ?, ?, ?, ?, ?, ?)';
		$params = array($this->nomusuario, $this->nombre, $this->apellido, $this->direccion, $this->telefono, $this->email, $hash);
		return Database::executeRow($sql, $params);
	}

	public function createUsuario()
	{
		$hash = password_hash($this->clave, PASSWORD_DEFAULT);
		$sql = 'INSERT INTO usuarios(IdRol,  IdEstado, NomUsuario, Nombre, Apellido, Direccion, Telefono, Email, Clave, FechaClave) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIME)';
		$params = array($this->idrol, $this->idestado, $this->nomusuario, $this->nombre, $this->apellido, $this->direccion, $this->telefono, $this->email, $hash);
		return Database::executeRow($sql, $params);
	}

	public function getUsuario()
	{
		$sql = 'SELECT IdUsuario, IdRol, NomUsuario, Nombre, Apellido, Email, Direccion, Telefono, IdEstado 
         FROM usuarios WHERE IdUsuario = ?';
		$params = array($this->idusuario);
		return Database::getRow($sql, $params);
    }

    public function readRoles()
    {

        $sql = 'SELECT IdRol, TipoRol FROM roles  WHERE IdEstado = 1 ORDER BY IdRol';
        $params = array(null);
        return Database::getRows($sql, $params);
    }

	public function updateUsuario()
	{
		$sql = 'UPDATE usuarios SET NomUsuario = ?, Nombre = ?, Apellido = ?, Email = ?, Direccion = ?, Telefono = ?, IdEstado = ?, IdRol = ? WHERE IdUsuario = ?';
		$params = array($this->nomusuario, $this->nombre, $this->apellido, $this->email, $this->direccion, $this->telefono, $this->idestado, $this->idrol, $this->idusuario);
		return Database::executeRow($sql, $params);
    }
    
    public function updateUsuarioProfile()
	{
		$sql = 'UPDATE usuarios SET NomUsuario = ?, Nombre = ?, Apellido = ?, Email = ?, Direccion = ?, Telefono = ? WHERE IdUsuario = ?';
		$params = array($this->nomusuario, $this->nombre, $this->apellido, $this->email, $this->direccion, $this->telefono, $this->idusuario);
		return Database::executeRow($sql, $params);
	}

	public function deleteUsuario()
	{
		$sql = 'DELETE FROM usuarios WHERE IdUsuario = ?';
		$params = array($this->idusuario);
		return Database::executeRow($sql, $params);
    }
    
    public function updateToken()
	{
		$sql = 'UPDATE usuarios SET Token = ? WHERE Email = ?';
		$params = array($this->token, $this->email);
		return Database::executeRow($sql, $params);
    }
    
    public function getEmailUser()
	{
		$sql = 'SELECT Email FROM usuarios WHERE Email = ?';
		$params = array($this->email);
		return Database::getRow($sql, $params);
    }
    
    public function getUserByToken()
	{
		$sql = 'SELECT IdUsuario FROM usuarios WHERE Token = ?';
		$params = array($this->token);
		$data = Database::getRow($sql, $params);
		if ($data) {
			$this->idusuario = $data['IdUsuario'];
			return true;
		} else {
			return false;
		}
    }
    
    public function changePasswordByToken()
    {
        $hash = password_hash($this->clave, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuarios SET Clave = ? WHERE Token = ?';
        $params = array($hash, $this->token);
        return Database::executeRow($sql, $params);
    }

    public function bloquearUsuario()
    {
        $sql = 'UPDATE usuarios SET IdEstado = 2, Intentos = 0 WHERE NomUsuario = ? AND Intentos >= 3';
        $params = array($this->nomusuario);
        return Database::executeRow($sql, $params);
    }

    public function updateIntentos()
    {
        $sql = 'UPDATE usuarios SET Intentos = 0 WHERE NomUsuario = ?';
        $params = array($this->nomusuario);
        return Database::executeRow($sql, $params);
    }

    public function sumarIntentos()
    {
        $sql = 'UPDATE usuarios SET Intentos = Intentos + 1 WHERE NomUsuario = ?';
		$params = array($this->nomusuario);
        return Database::executeRow($sql, $params);
    }

}
?>