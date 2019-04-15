<?php
class Validator
{
    private $imageError = null;
    private $imageName = null;

    public function getImageName()
    {
        return $this->imageName;
    }

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
}