<h1>Modificar Profesor</h1>

<?php if (isset($_SESSION['login']) && $_SESSION['login']->rol == "direccion") : ?>

    <?php if ($profesor) : ?>
        <form method="POST" action="<?= BASE_URL ?>/confirmarModificarProfesor/<?= $profesor[0]->id ?>">
            <input type="hidden" name="id" value="<?= $profesor[0]->id ?>">
            <label for="cuentaBloqueada">Cuenta Bloqueada:</label>
            <input type="checkbox" name="cuentaBloqueada" <?= $profesor[0]->cuenta_bloqueada ? 'checked' : '' ?>><br>

            <label for="nombreUsuario">Nombre de Usuario:</label>
            <input type="text" name="nombreUsuario" value="<?= $profesor[0]->nombre_usuario ?>" required><br>

            <label for="dni">DNI:</label>
            <input type="text" name="dni" value="<?= $profesor[0]->dni ?>" required><br>

            <label for="nombreCompleto">Nombre Completo:</label>
            <input type="text" name="nombreCompleto" value="<?= $profesor[0]->nombre_completo ?>" required><br>

            <label for="apellido1">Apellido 1:</label>
            <input type="text" name="apellido1" value="<?= $profesor[0]->apellido1 ?>" required><br>

            <label for="apellido2">Apellido 2:</label>
            <input type="text" name="apellido2" value="<?= $profesor[0]->apellido2 ?>" required><br>

            <label for="correo">Correo:</label>
            <input type="email" name="correo" value="<?= $profesor[0]->correo ?>" required><br>

            <label for="rol">Rol:</label>
            <select name="rol">
                <option value="profesor" <?= $profesor[0]->rol === 'profesor' ? 'selected' : '' ?>>Profesor</option>
                <option value="direccion" <?= $profesor[0]->rol === 'direccion' ? 'selected' : '' ?>>Dirección</option>
            </select><br>


            <button type="submit">Confirmar</button>
        </form>
    <?php else : ?>
        <p>No hay profesores</p>
    <?php endif; ?>

<?php else : ?>

    <p>Acceso denegado</p>

<?php endif; ?>
