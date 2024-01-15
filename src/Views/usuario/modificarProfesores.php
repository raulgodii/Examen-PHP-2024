<?php

use Utils\Utils;
?>

<h1>Modificar</h1>

<?php if (isset($_SESSION['login']) && $_SESSION['login']->rol == "direccion") : ?>

    <?php if (isset($profesores)) : ?>
        <table border="1">
            <!-- Encabezados de la tabla -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cuenta Bloqueada</th>
                    <th>Nombre de Usuario</th>
                    <th>DNI</th>
                    <th>Nombre Completo</th>
                    <th>Apellido1</th>
                    <th>Apellido2</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($profesores as $profesor) : ?>
                    <tr>
                        <td><?php echo $profesor->id; ?></td>
                        <td><?php echo $profesor->cuenta_bloqueada ? 'Sí' : 'No'; ?></td>
                        <td><?php echo $profesor->nombre_usuario; ?></td>
                        <td><?php echo $profesor->dni; ?></td>
                        <td><?php echo $profesor->nombre_completo; ?></td>
                        <td><?php echo $profesor->apellido1; ?></td>
                        <td><?php echo $profesor->apellido2; ?></td>
                        <td><?php echo $profesor->correo; ?></td>
                        <td><?php echo $profesor->rol; ?></td>
                        <td>
                            <!-- Botones para acciones -->
                            <a href="<?php echo BASE_URL; ?>/eliminarProfesor/<?php echo $profesor->id; ?>"><button>Eliminar</button></a>
                            <a href="<?php echo BASE_URL; ?>/modificarProfesor/<?php echo $profesor->id; ?>"><button>Modificar</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>

        <p>No hay profesores</p>

    <?php endif; ?>

<?php else : ?>

    <p>Acceso denegado</p>

<?php endif; ?>