<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/articulos.php');

//Se comprueba si existe una petición del sitio web y la acción a realizar, de lo contrario se muestra una página de error
if (isset($_GET['site']) && isset($_GET['action'])) {
    session_start();
    $articulo = new Articulos;
    $result = array('status' => 0, 'exception' => '', 'dataset' => '');
    //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
	if (isset($_SESSION['idUsuario']) && $_GET['site'] == 'dashboard') {
        switch ($_GET['action']) {
            case 'readProductos':
                if ($result['dataset'] = $articulo->readProductos()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay productos registrados';
                }
                break;
            case 'readCategorias':
                if ($result['dataset'] = $articulo->readCategorias()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay categorías registradas';
                }
                break;
            case 'search':
                $_POST = $articulo->validateForm($_POST);
                if ($_POST['busqueda'] != '') {
                    if ($result['dataset'] = $articulo->searchProductos($_POST['busqueda'])) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay coincidencias';
                    }
                } else {
                    $result['exception'] = 'Ingrese un valor para buscar';
                }
                break;
            case 'create':
                $_POST = $articulo->validateForm($_POST);
                if ($articulo->setIdCategoria($_POST['create-category-name'])) {
                    if ($articulo->setNomArticulo($_POST['create-name-name'])) {
                        if ($articulo->setDescripcionArt($_POST['create-descrip-name'])) {
                            if ($articulo->setPrecioUnitario($_POST['create-price-name'])) {
                                if ($articulo->setCantidad($_POST['create-exist-name'])) {
                                    if ($articulo->setIdEstado(isset($_POST['create-status-name']) ? 1 : 0)) {
                                        if (is_uploaded_file($_FILES['create-file-name']['tmp_name'])) {
                                            if ($articulo->setFoto($_FILES['create-file-name'], null)) {
                                                if ($articulo->createProducto()) {
                                                    if ($articulo->saveFile($_FILES['create-file-name'], $articulo->getRuta(), $articulo->getFoto())) {
                                                        $result['status'] = 1;
                                                    } else {
                                                        $result['status'] = 2;
                                                        $result['exception'] = 'No se pudo realizar la operación';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = $articulo->getImageError();
                                            }
                                        } else {
                                            $result['exception'] = 'Seleccione una foto';
                                        }
                                    } else {
                                        $result['exception'] = 'Estado incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Cantidad incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Precio incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Descripcioón incorrecta';
                        }
                    } else {
                        $result['exception'] = 'Nombre incorrecto';
                    }
                } else {
                    $result['exception'] = 'Seleccione una categoría';
                }
            case 'get':
                if ($articulo->setIdArticulos($_POST['id_product'])) {
                    if ($result['dataset'] = $articulo->getProducto()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto 3';
                }
                break;
            case 'update':
                $_POST = $articulo->validateForm($_POST);
                if ($articulo->setIdArticulos($_POST['id_product'])) {
                    if ($articulo->getProducto()) {
                        if ($articulo->setIdCategoria($_POST['update-category-name'])) {
                            if ($articulo->setNomArticulo($_POST['update-name-name'])) {
                                if ($articulo->setDescripcionArt($_POST['update-descrip-name'])) {
                                    if ($articulo->setPrecioUnitario($_POST['update-price-name'])) {
                                        if ($articulo->setCantidad($_POST['update-exist-name'])) {
                                            if ($articulo->setIdEstado(isset($_POST['update-status-name']) ? 1 : 0)) {
                                                if (is_uploaded_file($_FILES['update-file-name']['tmp_name'])) {
                                                    if ($articulo->setFoto($_FILES['update-file-name'], $_POST['image-product-name'])) {
                                                        $archivo = true;
                                                    } else {
                                                        $result['exception'] = $articulo->getImageError();
                                                        $archivo = false;
                                                    }
                                                } else {
                                                    if ($articulo->setFoto(null, $_POST['image-product-name'])) {
                                                        $result['exception'] = 'No se subió ningún archivo';
                                                    } else {
                                                        $result['exception'] = $articulo->getImageError();
                                                    }
                                                    $archivo = false;
                                                }
                                                if ($articulo->updateProducto()) {
                                                    if ($archivo) {
                                                        if ($articulo->saveFile($_FILES['update_archivo'], $articulo->getRuta(), $articulo->getFoto())) {
                                                            $result['status'] = 1;
                                                        } else {
                                                            $result['status'] = 2;
                                                            $result['exception'] = 'No se guardó el archivo';
                                                        }
                                                    } else {
                                                        $result['status'] = 3;
                                                    }
                                                } else {
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            } else {
                                                $result['exception'] = 'Estado incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Cantidad no válida';
                                        }
                                    } else {
                                        $result['exception'] = 'Precio incorrecto';
                                    }
                                } else {
                                    $result['exception'] = 'Descripción incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Seleccione una categoría';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    } 
                } else {
                    $result['exception'] = 'Producto incorrecto 4';
                }
                break;
            case 'delete':
                if ($producto->setIdArticulos($_POST['id-product-name'])) {
                    if ($producto->getProducto()) {
                        if ($producto->deleteProducto()) {
                            if ($producto->deleteFile($producto->getRuta(), $_POST['Foto'])) {
                                $result['status'] = 1;
                            } else {
                                $result['status'] = 2;
                                $result['exception'] = 'No se borró el archivo';
                            }
                        } else {
                            $result['exception'] = 'Operación fallida';
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto 5';
                }
                break;
            default:
                exit('Acción no disponible');
            }
        } else if ($_GET['site'] == 'publicHelper') {
            switch ($_GET['action']) {
                case 'readCategorias':
                    if ($result['dataset'] = $articulo->readCategorias()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'Contenido no disponible 1';
                    }
                    break;
                case 'readProductos':
                    if ($articulo->setIdCategoria($_POST['IdCategoria'])) {
                        if ($result['dataset'] = $articulo->readProductosCategoria()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Contenido no disponible 2';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto 1';
                    }
                    break;
                case 'detailProducto':
                    if ($articulo->setIdArticulos($_POST['IdArticulos'])) {
                        if ($result['dataset'] = $articulo->getProducto()) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'Contenido no disponible 3';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto 2';
                    }
                    break;
                case 'searchProducto':
                    $_POST = $articulo->validateForm($_POST);
                    if ($_POST['busqueda'] != '') {
                        if ($result['dataset'] = $articulo->searchArticulos($_POST['busqueda'])) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                    break;
                case 'preDetalle':                
                    $_POST=$articulo->validateForm($_POST);
                    if(isset($_SESSION['idUsuario'])){
                        if($articulo->setCantidad($_POST['cantidad'])){
                            if($articulo->setIdArticulos($_POST['idProducto3'])){
                                if($articulo->setCliente($_SESSION['idUsuario'])){
                                    if($_POST['cantidadBD']>= $_POST['cantidad']){
                                        if($articulo->insertPreDetalle()){                                        
                                            $result['status'] = 1;
                                        }else{
                                            $result['status'] = 2;
                                            $result['exception'] = 'Proceso fallido';
                                        }   
                                    }else{
                                        $result['exception'] = 'Cantidad de producto insuficiente';
                                    }                                                                                                                  
                                }else{
                                    $result['exception'] = 'Usuario incorrecto';
                                }
                            }else{
                                $result['exception'] = 'Producto incorrecto';
                            }
                        }else{
                            $result['exception'] = 'Cantidad incorrecta';
                        }
                    }else{
                        $result['exception'] = 'Debe de iniciar sesion para poder agregar al carrito';
                    }
                break;
                case 'rateProducto':
                    $_POST = $articulo->validateForm($_POST);
                    if ($articulo->setId($_POST['IdArticulos'])) {
                        if ($articulo->getProducto()) {
                            if ($articulo->setCalificacion(isset($_POST['update_calificacion']) ? 5 : 0)) {
                                if ($articulo->rateProducto()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Calificación incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    break;
                case 'commentProducto':
                    $_POST = $archivo->validateForm($_POST);
                    if ($articulo->setId($_POST['IdArticulos'])) {
                        if ($articulo->getProducto()) {
                            if ($articulo->setComentario($_POST['update_comentario'])) {
                                if ($articulo->commentProducto()) {
                                    $result['status'] = 1;
                                } else {
                                    $result['exception'] = 'Operación fallida';
                                }
                            } else {
                                $result['exception'] = 'Comentario erroneo';
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Producto incorrecto';
                    }
                    break;
                default:
                    exit('Acción no disponible');
            }
        } else {
            exit('Acceso no disponible');
        }
        print(json_encode($result));
    } else {
        exit('Recurso denegado');
    }
