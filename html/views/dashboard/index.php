<?php

session_start();


if (isset($_GET["cerrar_sesion"]) && $_GET["cerrar_sesion"] == 1) {

    session_destroy();

    echo '
            <script>
                window.location = "http://localhost:8081/";
            </script>        
        ';
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP FOOD</title>

    <link rel="shortcut icon" href="views/assets/dist/img/AdminLTELogo.png" type="image/x-icon">

    <!-- ============================================================================================================= -->
    <!-- REQUIRED CSS -->
    <!-- ============================================================================================================= -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="views/assets/fonts/Source_Sans_3/sans3.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="views/assets/plugins/fontawesome-free/css/all.min.css">

    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="views/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <link rel="stylesheet" href="views/assets/plugins/toastr/toastr.css">

    <!-- Jquery CSS -->
    <link rel="stylesheet" href="views/assets/plugins/jquery-ui/css/jquery-ui.css">

    <!-- Bootstrap 5 -->
    <link href="views/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    
    <!-- ============================================================
    =ESTILOS PARA USO DE DATATABLES JS
    ===============================================================-->
    <link rel="stylesheet" href="views/assets/datatables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="views/assets/datatables/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="views/assets/datatables/css/buttons.dataTables.min.css">
   

    <!-- Theme style -->
    <link rel="stylesheet" href="views/assets/dist/css/adminlte.min.css">

    <!-- Estilos personzalidos -->
    <link rel="stylesheet" href="views/assets/dist/css/plantilla.css">

    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- REQUIRED SCRIPTS -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->
    <!-- ============================================================================================================= -->

    <!-- jQuery -->
    <script src="views/assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="views/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- ChartJS -->
    <script src="views/assets/plugins/chart.js/Chart.min.js"></script>

    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->

    <!-- InputMask -->
    <script src="views/assets/plugins/moment/moment.min.js"></script>
    <script src="views/assets/plugins/inputmask/jquery.inputmask.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="views/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="views/assets/plugins/toastr/toastr.min.js"></script>

    <!-- jquery UI -->
    <script src="views/assets/plugins/jquery-ui/js/jquery-ui.js"></script>

    <!-- JS Bootstrap 5 -->
    <script src="views/assets/dist/js/bootstrap.bundle.min.js"></script>


   

    <!-- ============================================================
    =LIBRERIAS PARA USO DE DATATABLES JS
    ===============================================================-->
    <script src="views/assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="views/assets/datatables/js/dataTables.responsive.min.js"></script>



    <!-- ============================================================
    =LIBRERIAS PARA EXPORTAR A ARCHIVOS
    ===============================================================-->
    <script src="views/assets/datatables/js/dataTables.buttons.min.js"></script>
    <script src="views/assets/datatables/js/jszip.min.js"></script>
    <script src="views/assets/datatables/js/buttons.html5.min.js"></script>
    <script src="views/assets/datatables/js/buttons.print.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/assets/dist/js/adminlte.min.js"></script>
    <script src="views/assets/dist/js/plantilla.js"></script>



</head>

<?php if (isset($_SESSION["user_id"])) : ?>

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            <?php

                

                include "views/modulos/aside.php";
            ?>


            <div class="content-wrapper">

                <?php include "views/dashboard/dashboard.php"?>

            </div>
            
        </div>
        <script>
            function CargarContenido(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }
        </script>

    </body>

<?php else : ?>

    <body >

        <?php include "/var/www/html/views/login/index.php"; ?>

    </body>

<?php endif; ?>

</html>