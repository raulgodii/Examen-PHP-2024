
<h1>Iniciar Sesion</h1>

<?php if(isset($errorLogin)) : ?>
        <p class="errorMessage">Inicio de sesión fallido. Por favor, verifique su nombre de usuario y contraseña.</p>
<?php endif; ?>

<?php if(!isset($_SESSION['login'])): ?>

<form action="<?=BASE_URL?>/login/" method="POST">
    <label for="email">Email</label>
    <input type="email" name="data[email]" id="email" placeholder="Introduce tu email" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required/>


    <label for="password">Password</label>
    <input type="password" name="data[contrasena]" id="contrasena" placeholder="Introduce tu contraseña" required/>
    
    <input type="submit" value="Iniciar Sesion"/>
</form>

<?php elseif(isset($_SESSION['login'])): ?>
        <p class="successMessage"> Welcome <?= $_SESSION['login']->name?>! You have logged in successfully.</p>
<?php endif; ?>