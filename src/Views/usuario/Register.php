<?php
use Utils\Utils; 
?>

<h1>Registro</h1>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] === 'failed'): ?>
    <p class="errorMessage">Registro fallido. Algo ha ido mal. Por favor, inténtelo de nuevo.</p>
    <?php Utils::deleteSession('register');?>
<?php endif; ?>

<?php if(isset($_SESSION['register']) && $_SESSION['register'] === 'complete'): ?>
    <p class="successMessage">Ha sido un éxito. Su registro se ha completado.</p>
    <form action="<?=BASE_URL?>/login/" method="POST">
        <p>
            <input type="submit" value="Log In">
        </p>
    </form>
    <?php Utils::deleteSession('register');?>


<?php else: ?>

    <form action="<?=BASE_URL?>/registro/" method="POST">
        <p>
            <label>Rol</label>
            <select name="data[rol]" id="rol" required>
                    <option value="direccion">Direccion</option>
                    <option value="profesor" selected>Profesor</option>
            </select>
        </p>
        <p>
            <label>Nombre</label>
            <input type="text" name="data[nombre]" placeholder="Introduce tu nombre" value="<?= isset($usuario) ? $usuario['nombre'] : '' ?>" required>
        </p>
        <p>
            <label>Apellido 1</label>
            <input type="text" name="data[apellido1]" placeholder="Introduce apellido 1" value="<?= isset($usuario) ? $usuario['apellido1'] : '' ?>" required>
        </p>
        <p>
            <label>Apellido 2</label>
            <input type="text" name="data[apellido2]" placeholder="Introduce apellido 2" value="<?= isset($usuario) ? $usuario['apellido2'] : '' ?>" required>
        </p>
        <p>
            <label>Nombre usuario</label>
            <input type="text" name="data[usuario]" placeholder="Introduce nombe usuario" value="<?= isset($usuario) ? $usuario['usuario'] : '' ?>" required>
        </p>
        <p>
            <label>DNI</label>
            <input type="text" name="data[dni]" placeholder="Introduce DNI" value="<?= isset($usuario) ? $usuario['dni'] : '' ?>" required>
        </p>
        <p>
            <label>Email</label>
            <input type="email" name="data[email]" placeholder="Introduce tu email" value="<?= isset($usuario) ? $usuario['email'] : '' ?>" required>
        </p>
        <p>
            <label>Contraseña</label>
            <input type="password" name="data[contrasena]" placeholder="Introduce tu contraseña" required>
        </p>
        <p>
            <input type="submit" value="Registrar">
        </p>
    </form>

<?php endif; ?>