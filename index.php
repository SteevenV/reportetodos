<?php
// Importar la conexión
require 'datebase.php';
// Escribir el Query
$query = "SELECT * FROM materiale";
// Consultar la BD 
$resultadoConsulta = mysqli_query($db, $query);
// Muestra mensaje condicional
$resultado = $_GET['resultado'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if ($id) {
        // Eliminar Registro
        $query = "DELETE FROM materiale WHERE id = ${id}";
        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            header('location: /admin?resultado=3');
        }
    }
}
?>
<?php include 'includes/header.php'; ?>
<main class=" contenedor contenedortablas ">


    <h1 class="text-center">Resumen De Registros</h1>
    <?php if (intval($resultado) === 1) : ?>
        <p class="alerta exito">Registro Creado Correctamente</p>
    <?php elseif (intval($resultado) === 2) : ?>
        <p class="alerta exito">Registro Actualizado Correctamente</p>
    <?php elseif (intval($resultado) === 3) : ?>
        <p class="alerta exito">Registro Eliminado Correctamente</p>
    <?php endif; ?>



    <table class="tbresumen">
        <thead class="tbresumenthead">
            <tr>
                <th>Accion</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Azienda</th>
                <th>Off/Evo</th>
                <th>G/GDP</th>
                <th>Router</th>
                <th>EoloBox</th>
                <th>Parabola</th>
                <th>Alimentador</th>
                <th>tipo</th>
                <th>ID</th>
            </tr>
        </thead>

        <tbody class="cuerposdetabla">
            <!-- Mostrar los Resultados -->
            <?php $i = 0;?>
            <?php while ($resumen = mysqli_fetch_assoc($resultadoConsulta)) :
            $i++; 
            ?>
                
                <tr>
                    <td>
                        <form method="POST" class="w-100">

                            <input type="hidden" name="id" value="<?php echo $resumen['id']; ?>">

                            <input type="submit" class="myButton " value="Eliminar">
                        </form>

                        <a class="myButton " href="actualizar.php?id=<?php echo $resumen['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                    <td><?php echo $resumen['fecha']; ?></td>
                    <td><?php echo $resumen['cliente']; ?></td>
                    <td><?php echo $resumen['azienda']; ?></td>
                    <td><?php echo $resumen['evo']; ?></td>
                    <td><?php echo $resumen['gdp']; ?></td>
                    <td><?php echo $resumen['router']; ?></td>
                    <td><?php echo $resumen['box']; ?></td>
                    <td><?php echo $resumen['parabola']; ?></td>
                    <td><?php echo $resumen['alimentador']; ?></td>
                    <td><?php echo $resumen['tipo']; ?></td>
                    <td><?php echo $i?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="3">Total Mensual</th>
                <th><?php echo $i?></th>
            </tr>
        </tfoot>
    </table>
</main>

<?php include 'includes/footer.php'; ?>

<?php

// Cerrar la conexion
mysqli_close($db);


?>