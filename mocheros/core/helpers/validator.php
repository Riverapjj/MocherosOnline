<?php
class Validator
{
    private $imageError = null;
    private $imageName = null;

    //función para obtener el nombre de la imagen
    public function getImageName()
    {
        return $this->imageName;
    }

    //función para imprimir diferentes errores referentes a la imagen
    public function getImageError()
    {
        switch ($this->imageError) {
            case 1:
            $error = 'El tipo de la imagen debe ser .jpg, .png o .gif.';
            break;

            case 2:
            $error = 'La dimensión de la imagen no es válida.';
            break;

            case 3:
            $error = 'El tamaño de la imagen debe ser menor a 2MB';
            break;

            case 4:
            $error = 'El archivo de imagen no existe.';
            break;

            default:
            $error = 'Ocurrió un problema con la imagen.';
        }
        return $error;
    }

    
    public function validateForm($fields)
    {
        foreach ($fields as $index => $value) {
            $value = trim($value);
            $fields[$index] = $value;
        }
        return $fields;
    }

    public function validateId($value) 
    {
        if(filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1))) {
            return true;
        } else {
            return false;
        }
    }

    //función para validar el archivo de imagen
    public function validateImageFile($file, $path, $name, $maxWidth, $maxHeight)
    {
        if ($file) {
            if($file['size'] <= 2097152) {
                list($width, $height, $type) = getimagesize($file['tmp_name']);
                if ($width <= $maxWidth && $height <= $maxHeight) {
                    if ($type == 1 || $type == 2 || $type == 3) {
                        if ($name) {
                            if (file_exists($path .  $name)) {
                                $this->imageName = $name;
                                return true;
                            } else {
                                $this->imageError = 4;
                                return false;
                            }
                        } else {
                            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                            $this->imageName = uniqid() . '.' . $extension;
                            return true;
                        }
                    } else {
                        $this->imageError = 1;
                        return false;
                    }
                } else {
                    $this->imageError = 2;
                    return false;
                }
            } else {
                $this->imageError = 3;
                return false;
            }
        } else {
            if(file_exists($path.$name)) {
                $this->imageName = $name;
                return true;
            } else {
                $this->imageError = 4;
                return false;
            }
        }
    }

    //función para validar correo electrónico
    public function validateEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    //función para validar texto, recibe un valor mínimo y un máximo
    public function validateAlphabetic($value, $minimum, $maximum)
    {
        if (preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //función para validar texto con números, recibe un valor mínimo y un máximo
    public function validateAlphaNumeric($value, $minimum, $maximum)
    {
        if (preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.]{'.$minimum.','.$maximum.'}$/', $value)) {
            return true;
        } else {
            return false;
        }
    }

    //función para validar números
    public function validateNumeric($value)
	{
		if (preg_match('/^[1-9][0-9]{0,15}$/', $value)) {
			return true;
		} else {
			return false;
		}
	}

    //función para validar dinero
    public function validateMoney($value)
	{
		if (preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value)) {
			return true;
		} else {
			return false;
		}
	}

    //función para validar contraseña
	public function validatePassword($value)
	{   
        $error;
        
		if (strlen($value) > 7) {
            if (preg_match('#[0-9]+#', $value)) {
                if (preg_match('#[a-z]+#', $value)) {
                    if (preg_match('#[A-Z]+#', $value)) {
                        if (preg_match("/[`'\"~!@# $*()<>,.:;¡!][¿?-+{}\|]/", $value)) {
                            
                            return true;

                        }else{
                            $error = "Su contraseña debe contener al menos un signo";
                            return false;
                        }
                    }else{
                        $error = "Su contraseña debe contener al menos una letra mayúscula";
                        return false;
                    }
                }else{
                    $error = "Su contraseña debe contener al menos una letra minúscula";
                    return false;
                }
            }else{
                $error = "Su contraseña debe contener al menos un número 0-9";
                return false;
            }		
		} else {
			return false;
		}
	}

    //función para guardar el archivo
	public function saveFile($file, $path, $name)
    {
		if (file_exists($path)) {
			if (move_uploaded_file($file['tmp_name'], $path.$name)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
  	}

    //función para borrar el archivo
	public function deleteFile($path, $name)
    {
		if (file_exists($path)) {
			if (unlink($path.$name)) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}
?>