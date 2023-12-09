<?php

require_once "/var/www/html/models/salesmodel.php";

class Sales{
    function __construct(){
        
        error_log('Login-> inicio de login');

    }

    public function render() {
        error_log('DASHBOARD -> CARGA EL INDEX DASHBOARD');
    }

    /*===================================================================
    LISTAR NOMBRE DE PRODUCTOS PARA INPUT DE AUTOCOMPLETADO
    ====================================================================*/
    public function ctrListProduct() {
        error_log('Products::ctrListarNombreProductos');
        $producto = Salesmodel::mdlListProduct();

        return $producto;
    }
    public function shearchMenuId($id_menu) {
        error_log('Products::ctrListarNombreProductos');
        $producto = Salesmodel::mdShearchMenuId($id_menu);

        return $producto;
    }

    public function crlVerifyStock($id_menu, $cantidad) {
        error_log('Products::ctrListarNombreProductos');
        $producto = Salesmodel::mdVerifyStock($id_menu, $cantidad);

        return $producto;
    }
    public function crlRegisterVenta($array, $totalVenta, $payment) {
        error_log('Products::ctrListarNombreProductos');
        $producto = Salesmodel::mdlRegisterVenta($array, $totalVenta, $payment);

        return $producto;
    }

}

?>
