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
                        <form id="deleteForm" action='<?php echo constant('URL'); ?>crud_products/deleteProvider' method="POST">
                            <input type="hidden" name="id" value="<?php echo $provider->getId(); ?>">
                            <button class="btn btn-danger" type="submit" name="eliminar" onclick="confirmDelete()">Eliminar</button>
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

<script>
function confirmDelete() {
        if (confirm("¿Estás seguro de que deseas eliminar este producto?")) {
            document.getElementById("deleteForm").submit();
        } else {}
    }   
</script>