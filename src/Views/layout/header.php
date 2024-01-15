<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/style.css">
    <title>Examen PHP</title>
</head>

<body>
    <header>

        <div class="header-init">
            <h1>Videoteca</h1>
            <?php if (!isset($_SESSION['login'])) : ?>
                <ul>
                    <li><a href="<?= BASE_URL ?>/login/" class="btn">Iniciar Sesion</a></li>
                </ul>
            <?php else : ?>
                <h2><?= $_SESSION['login']->nombre_usuario ?></h2>
                <ul>
                    <?php if ($_SESSION['login']->rol === "direccion") : ?>
                        <li>ROL Direccion</li>
                        <li><a href="<?= BASE_URL ?>/registro/" class="btn">Registrar</a></li>
                    <?php else : ?>
                        <li>ROL Profesor</li>
                    <?php endif; ?>
                    <li><a href="<?= BASE_URL ?>/logout/" class="btn">Cerrar sesion</a> </li>
                </ul>
            <?php endif; ?>
        </div>

        <nav>
            <ul>
                <li><a href="<?= BASE_URL ?>">Inicio</a></li>
                <?php if (isset($_SESSION['login'])) : ?>
                    <li><a href="<?= BASE_URL ?>/fondos">Fondos</a></li>
                <?php endif; ?>
            </ul>

        </nav>
    </header>

    <hr>

    <main>