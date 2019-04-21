<?php
class Usuarios extends Validator
{
    //Declaración de propiedades
    private $id = null;
    private $rol = null;
    private $usuario = null;
    private $nombre = null;
    private $apellido = null;
    private $direccion = null;
    private $telefono = null;
    private $correo = null;
    private $clave = null;

    //Método para sobrecarga de propiedades
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

    public function setRol($value)
    {
        if ($this->validateId($value)) {
            $this->rol = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphaNumeric($value, 1, 30)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getUsuario()
    {
        return $this->usuario;
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

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setClave($value)
    {
        if ($this->validatePassword($value)) {
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

    //Métodos para manejar la sesión del usuario
    public function checkUsuario()
    {
        $sql = 'SELECT IdUsuario FROM usuarios WHERE NomUsuario = ?';
        $params = array($this->usuario);
        $data = Database::getRow($sql, $params);
        if ($data) {
            $this->id = $data['IdUsuario'];
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword()
    {
        $sql = 'SELECT Clave FROM usuarios WHERE IdUsuario = ?';
        $params = array($this->id);
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

    //Métodos para el CRUD
    //Método para leer Usuarios
    public function readUsuarios()
    {
        $sql = 'SELECT IdUsuario, Nombre, Apellido, Correo'
    }
}