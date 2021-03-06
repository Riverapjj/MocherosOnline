<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/usuarios.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../core/lib/PHPMailer-master/src/Exception.php';
require '../../core/lib/PHPMailer-master/src/PHPMailer.php';
require '../../core/lib/PHPMailer-master/src/SMTP.php';

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    
    session_start();
    $usuario = new Usuarios;
    $result = array('status' => 0, 'exception' => '', 'dataset' => '', 'session' => 1);
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
    if (  isset($_SESSION['idUsuario']) &&   $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'logout':
                if (session_destroy()) {
                    header('location: ../../views/dashboard/');
                } else {
                    header('location: ../../views/dashboard/dashboard.php');
                }
                break;
            case 'readProfile':
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
                case 'editProfile':
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
                    if ($usuario->getUsuario()) {
                        $_POST = $usuario->validateForm($_POST);
                        if ($usuario->setNomUsuario($_POST['profile_usuario'])) {
                            if ($usuario->setNombre($_POST['profile_nombre'])) {
                                if ($usuario->setApellido($_POST['profile_apellido'])) {
                                    if ($usuario->setDireccion($_POST['profile_direccion'])) {
                                        if ($usuario->setTelefono($_POST['profile_telefono'])) {
                                            if ($usuario->setEmail($_POST['profile_correo'])) {
                                                if ($usuario->updateUsuarioProfile()) {
                                                    $_SESSION['nombreUsuario'] = $_POST['profile_usuario'];
                                                    $result['status'] = 1;
                                                } else {
                                                    $result['exception'] = 'Ocurrió un error en la operación';
                                                }
                                            } else {
                                                $result['exception'] = 'Correo electrónico no válido';
                                            }
                                        } else {
                                            $result['exception'] = 'Teléfono no válido';
                                        }
                                    } else {
                                        $result['exception'] = 'Dirección no válida';
                                    }
                                } else {
                                    $result['exception'] = 'Apellidos no válidos';
                                }
                            } else {
                                $result['exception'] = 'Nombres no válidos';
                            }
                        } else {
                            $result['exception'] = 'Usuario no válido';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'Usuario inexistente';
                }
                break;
            case 'password':
                if ($usuario->setIdUsuario($_SESSION['idUsuario'])) {
                    $_POST = $usuario->validateForm($_POST);
                    if ($_POST['clave_actual_1'] == $_POST['clave_actual_2']) {
                        if ($usuario->setClave($_POST['clave_actual_1'])) {
                            if ($usuario->checkPassword()) {
                                if ($_POST['clave_nueva_1'] == $_POST['clave_nueva_2']) {
                                    if ($usuario->setClave($_POST['clave_nueva_1'])) {
                                        if ($usuario->changePassword()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave nueva menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves nuevas diferentes';
                                }
                            } else {
                                $result['exception'] = 'Clave actual incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Clave actual menor a 6 caracteres';
                        }
                    } else {
                        $result['exception'] = 'Claves actuales diferentes';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'read':
                if ($result['dataset'] = $usuario->readUsuarios()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay usuarios registrados';
                }
                break;
            case 'search':
                $_POST = $usuario->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $usuario->searchUsuarios($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setNomUsuario($_POST['create-username'])){
                if ($usuario->setNombre($_POST['create-name'])) {
                    if ($usuario->setApellido($_POST['create-lastname'])) {
                        if ($usuario->setIdRol($_POST['create-rol-name'])){
                        if ($usuario->setEmail($_POST['create-email'])) {
                            if ($usuario->setTelefono($_POST['create-telf'])) {
                                if ($usuario->setIdEstado(isset($_POST['create-status-name']) ? 1 : 2)){
                                if ($_POST['create-pass-name'] == $_POST['create-confirm-pass-name']) {
                                    if ($usuario->setClave($_POST['create-pass-name'])) {
                                        if ($usuario->setDireccion($_POST['create-address-name'])){
                                        if ($usuario->createUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                     } else{
                                         $result['exception'] = 'Dirección incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Clave menor a 6 caracteres';
                                    }
                                } else {
                                    $result['exception'] = 'Claves diferentes';
                                }
                             } else{
                                $result['exception'] = 'Estado incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Telefono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Correo incorrecto';
                        }
                     } else{
                         $result['exception'] = 'Rol incorrecto';
                        }
                    } else {
                        $result['exception'] = 'Apellidos incorrectos';
                    }
                } else {
                    $result['exception'] = 'Nombres incorrectos';
                }
            }else{
                $result['exception'] = 'Nombre de usuario incorrecto';
            }
                break;
            case 'get':
                if ($usuario->setIdUsuario($_POST['IdUsuario'])) {
                    if ($result['dataset'] = $usuario->getUsuario()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'update':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->setIdUsuario($_POST['id-user-name'])) {                    
                    if ($usuario->getUsuario()) {
                        if ($usuario->setNombre($_POST['update-name-name'])) {
                            if ($usuario->setApellido($_POST['update-lastname-name'])) {
                                if ($usuario->setEmail($_POST['update-email-name'])) {
                                    if ($usuario->setTelefono($_POST['update-telf-name'])){
                                        if ($usuario->setDireccion($_POST['update-address-name'])){
                                            if ($usuario->setIdRol($_POST['update-rol-name'])) {
                                                if ($usuario->setIdEstado(isset($_POST['update-status-name']) ? 1 : 2)){
                                    if ($usuario->setNomUsuario($_POST['update-username-name'])) {
                                        if ($usuario->updateUsuario()) {
                                            $result['status'] = 1;
                                        } else {
                                            $result['exception'] = 'Operación fallida';
                                        }
                                    } else {
                                        $result['exception'] = 'Alias incorrecto';
                                    }
                                } else{
                                    $result['exception'] = 'Estado incorrecto';
                                    }
                                }  else{
                                    $result['exception'] = 'Rol incorrecto';
                                    }
                                } else{
                                    $result['exception'] = 'Dirección incorrecto';
                                    }
                                  }  else{
                                    $result['exception'] = 'Teléfono incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Correo incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Apellidos incorrectos';
                            }
                        } else {
                            $result['exception'] = 'Nombres incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Usuario inexistente';
                    }
                } else {
                    $result['exception'] = 'Usuario incorrecto';
                }
                break;
            case 'readRoles':
                if ($result['dataset'] = $usuario->readRoles()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay roles registrados';
                }
                break;
            case 'delete':
                if ($_POST['IdUsuario'] != $_SESSION['idUsuario']) {
                    if ($usuario->setIdUsuario($_POST['IdUsuario'])) {
                        if ($usuario->getUsuario()) {
                            if ($usuario->deleteUsuario()) {
                                $result['status'] = 1;
                            } else {
                                $result['exception'] = 'Operación fallida';
                            }
                        } else {
                            $result['exception'] = 'Usuario inexistente';
                        }
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                } else {
                    $result['exception'] = 'No se puede eliminar a sí mismo';
                }
                break;
                
            default:
                exit('Acción no disponible 1');
            }
    } else if ($_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'read':
                if ($usuario->readUsuarios()) {
                    $result['status'] = 1;
                    $result['exception'] = 'Existe al menos un usuario registrado';
                } else {
                    $result['status'] = 2;
                    $result['exception'] = 'No existen usuarios registrados';
                }
                break;
            case 'register':
                $_POST = $usuario->validateForm($_POST);                
                if ($_POST['g-recaptcha-response']){
                    if ($usuario->setNombre($_POST['register-name-name'])) {
                        if ($usuario->setApellido($_POST['register-lastname-name'])) {
                            if ($usuario->setEmail($_POST['register-email-name'])) {
                                if ($usuario->setNomUsuario($_POST['register-user-name'])) {
                                    if ($_POST['register-pass-name'] == $_POST['register-pass2-name']) {
                                        if ($usuario->setClave($_POST['register-pass-name'])) {
                                            if ($usuario->registerUsuario()) {
                                                $result['status'] = 1;
                                            } else {
                                                $result['exception'] = 'Operación fallida';
                                            }
                                        } else {
                                            $result['exception'] = 'Clave menor a 6 caracteres';
                                        }
                                    } else {
                                        $result['exception'] = 'Claves diferentes';
                                    }
                                } else {
                                    $result['exception'] = 'Alias incorrecto';
                                }
                            } else {
                                $result['exception'] = 'Correo incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Apellidos incorrectos';
                        }
                    } else {
                        $result['exception'] = 'Nombres incorrectos';
                    }
                }else{
                    $result['exception'] = 'Por favor, validar humano';
                }
                    break;
                case 'intentos':
                    $_POST = $usuario->validateForm($_POST);               
                        if($usuario->setNomUsuario($_POST['NomUsuario'])) {        
                            if($result['dataset'] = $usuario->sumarIntentos()){
                                $result['status'] = 1;
                            }else{
                                $result['exception'] = 'No pudimos sumar intentos';
                            }
                        }else{
                            $result['exception'] = 'Alias incorrecto';
                        }
                    break;
                case 'bloquearUsuario':
                $_POST = $usuario->validateForm($_POST);               
                    if($usuario->setNomUsuario($_POST['NomUsuario'])) {        
                        if($result['dataset'] = $usuario->bloquearUsuario()){
                            $result['status'] = 1;
                        }else{
                            $result['exception'] = 'No se bloqueó el usuario';
                        }
                    }else{
                        $result['exception'] = 'Alias incorrecto';
                    }
                    break;
                case 'enviarCorreo':
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->setEmail($_POST['email-name'])) {
                        if($usuario->getEmailUser()){
                            $token = md5(uniqid(rand(), true)); 
                            if($usuario->setToken($token)) {
                                if($usuario->updateToken()) {
                                    if($emailusuario = $usuario->getEmail()) {
                                        $result['status'] = 1; 
                                        $mail = new PHPMailer(true);
                                        $mail ->charSet = "UTF-8";
                                            try {
                                                //Server settings
                                                $mail->SMTPDebug = 2;                                       // Enable verbose debug output
                                                $mail->isSMTP();                                            // Set mailer to use SMTP
                                                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                                $mail->Username   = 'mocherossv@gmail.com';                     // SMTP username
                                                $mail->Password   = 'mocheros123';                               // SMTP password
                                                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                                                $mail->Port       = 587;                                    // TCP port to connect to

                                                //Recipients
                                                $mail->setFrom('mocherossv@gmail.com', 'Departamento de Informática');
                                                $mail->addAddress($emailusuario);     // Add a recipient
                                                
                                                // Content
                                                $mail->isHTML(true);                                  // Set email format to HTML
                                                $mail->Subject = 'Recuperación de contraseña';
                                                $mail->Body    = 'Haz click <a href="http://localhost/MocherosOnline/mocheros/views/dashboard/contrasenas.php?token='.$token.'">aquí</<a> para recuperar su contraseña';

                                                $mail->send();
                                                echo 'Message has been sent';
                                            } catch (Exception $e) {
                                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                            }
                                    } else {
                                        $result['exception'] = 'Error al obtener el correo';  
                                    }                                
                                } else {
                                    $result['exception'] = 'Error al asignar el token';
                                }  
                            } else{
                                $result['exception'] = 'Error al generar el token';
                            }  
                        } else{
                            $result['exception'] = 'Correo no existe';
                        }   
                    }  else {
                        $result['exception'] = 'Correo invalido';
                    }             

                    break;
                case 'recoverPassword':
                    $_POST = $usuario->validateForm($_POST);
                    if($usuario->setToken($_POST['token'])) {
                        if($usuario->getUserByToken()) {
                            if ($_POST['new_pwd'] == $_POST['pwd_confirmed']) {
                                $password = $usuario->setClave($_POST['new_pwd']);
                                if ($password[0]) {
                                    if ($usuario->changePasswordByToken()) { 
                                        $result['status'] = 1;
                                    } else {
                                        $result['exception'] = 'Operación fallida';
                                    }
                                } else {
                                    $result['exception'] = $password[1];
                                }
                            } else {
                                $result['exception'] = 'Claves diferentes';
                                
                            } 
                        } else {
                            $result['exception'] = 'Error al obtener los datos del usuario';
                        }
                    } else {
                        $result['exception'] = 'Error al setear el token';
                    }
                    
                    break;
                case 'login':
                $_POST = $usuario->validateForm($_POST);
                    if ($usuario->setNomUsuario($_POST['log-username-name'])) {
                        if ($usuario->checkNomUsuario()) {
                            $password = $usuario->setClave($_POST['log-pass-name']);
                            if ($password[0]) {
                                if ($usuario->checkPassword()) {
                                    if ($usuario->updateIntentos()) {
                                        $_SESSION['idUsuario'] = $usuario->getIdUsuario();
                                        $_SESSION['NomUsuario'] = $usuario->getNomUsuario();
                                        $_SESSION['ultimoAcceso'] = time();
                                        $result['status'] = 1;
                                    }else{
                                        $result['exception'] = 'No se actualizaron los intentos';
                                    }
                                } else {
                                    $result['exception'] = 'Clave inexistente';
                                }                                
                            } else {
                                $result['exception'] = $password[1];
                            }
                        } else {
                            $result['exception'] = 'Alias inexistente';
                        }
                    } else {
                        $result['exception'] = 'Alias incorrecto';
                    }
                    break;
            
            default:
                exit('Acción no disponible 2');
        }
        //echo json_encode($result);
    } else {
        exit('Acceso no disponible 2');
    }
    echo json_encode($result);
    
} else {
	exit('Recurso denegado');
}
?>
