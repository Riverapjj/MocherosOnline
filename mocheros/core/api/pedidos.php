<?php
require_once('../../core/helpers/database.php');
require_once('../../core/helpers/validator.php');
require_once('../../core/models/pedidos.php');

if (session_status() != PHP_SESSION_ACTIVE) {
    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $pedidos = new Pedidos();
        $result = array('status'=> 0, 'exception'=>'');
        //Se verifica si existe una sesión iniciada como administrador para realizar las operaciones correspondientes
        if(isset($_SESSION['idUsuario']) && $_GET['site']=='dashboard'){
            switch ($_GET['action']){  
                
                case 'readPedidosTable':
                    if($result['dataset'] = $pedidos->readPedidos()){
                        $result['status'] = 1;
                    }else{
                        $result['exception']='No hay ventas realizadas';
                    }
                break;

                case 'detalle':
                    if($pedidos->setId($_POST['id'])){
                        if($result['dataset']=$pedidos->obtenerDetalle()){
                            $result['status']=1; 
                        }else{
                            $result['exception']='error';
                        }    
                    }else{
                        $result['exception']='Venta incorrecta';
                    }
                break;
                case 'search':
                    $_POST = $pedidos->validateForm($_POST);
                    if ($_POST['fecha'] != '') {
                        if ($result['dataset'] = $pedidos->searchVenta($_POST['fecha'])) {
                            $result['status'] = 1;
                        } else {
                            $result['exception'] = 'No hay coincidencias';
                        }
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                break;   
                case 'updateState':
                    if($pedidos->setId($_POST['idVenta'])){
                        if($pedidos->updateStateSale()){
                            $result['status'] = 1;                        
                        }else{
                            $result['exception'] = 'Error al actulizar estado de venta';
                        }
                    }
                break; 
                case 'readCountEstadosChart':
                    if ($result['dataset'] = $pedidos->estadosChart()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay datos';
                    }
                break;
            }
        }else if(isset($_SESSION['idUsuario']) && $_GET['site']=='public'){
            switch ($_GET['action']){
                case 'readVentasCliente':            
                    if($pedidos->setIdCliente($_SESSION['idUsuario'])){
                        if($result['dataset']=$pedidos->ventaCliente()){
                            $result['status']=1;
                        }else{
                            $result['exception']='No se han encontrado compras';
                        }
                    }else{
                        $result['exception']='Cliente incorrecto';
                    }
                break;
                case 'detalle':
                if($pedidos->setId($_POST['idVenta'])){
                    if($result['dataset']=$pedidos->obtenerDetalle()){
                        $result['status']=1; 
                    }else{
                        $result['exception']='error';
                    }    
                }else{
                    $result['exception']='Venta incorrecta';
                }
            break;
            }
        }else{
            exit('Acceso no disponible');
        }
        print(json_encode($result));
    }else{
        exit('Recurso denegado');
    }
}else{
    session_destroy();
}
?>