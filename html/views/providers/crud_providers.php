<?php
include_once "/var/www/html/models/providermodel.php";
$providerModel = new ProviderModel();

$providers = $providerModel->getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Proveedores</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-6">Proveedores</h1>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Razón social</th>
                    <th>CUIT</th>
                    <th>Eliminar Producto</th>
                    <th>Editar Producto</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($providers as $provider): ?>
                <tr>
                    <td><?php echo $provider->getId(); ?></td>
                    <td><?php echo $provider->getRazonSocial(); ?></td>
                    <td><?php echo $provider->getCuit(); ?></td>
                    <td>
                        <form id="deleteForm" action='<?php echo constant('URL'); ?>crud_providers/deleteProvider' method="POST">
                            <input type="hidden" name="id" value="<?php echo $provider->getId(); ?>">
                            <button class="btn btn-danger" type="button" name="eliminar" onclick="confirmDelete('<?php echo $provider->getId(); ?>')">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <button class="btn btn-warning btn-edit" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" data-id="<?php echo $provider->getId(); ?>">Editar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

<div id="edit-form-container" style="display: none;"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
            // Maneja el clic en el botón "Editar"
            $(".btn-edit").click(function() {
                var providerId = $(this).data("id");

                // Realiza una solicitud AJAX para obtener el formulario de edición
                $.ajax({
                    url: "views/providers/edit_providers.php", // Ruta al archivo de edición de usuario
                    type: "GET",
                    data: { id: providerId }, // Envía el ID del usuario
                    success: function(response) {
                    $("#edit-form-container").html(response).slideDown();
                    },

                    error: function() {
                        alert("Error al cargar el formulario de edición.");
                    }
                });
            });
        });
</script>

<script>
function confirmDelete(providerId) {
    Swal.fire({
        title: '¿Estás seguro de que deseas eliminar este Proveedor?',
        icon: 'warning',
        text: 'Asegúrese de eliminar los productos del proveedor para que esto sea exitoso.',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "http://localhost:8080/crud_providers/deleteProvider", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    var row = document.getElementById("userRow" + providerId);
                    if (row) {
                        row.remove();
                    }
                    CargarContenido('views/providers/crud_providers.php', 'content-wrapper');
                } else {
                    console.error('Error en la solicitud: ' + xhr.status);
                }
            };
            xhr.send("id=" + providerId);
        }
    });
}

</script>