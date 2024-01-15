<h1>Fondos</h1>

<?php if(isset($fondos)):?>
    <?php if($fondos):?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ISAN</th>
                    <th>Título</th>
                    <th>Director</th>
                    <th>Género</th>
                    <th>Año</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($fondos as $fondo): ?>
                    <tr>
                        <td><?php echo $fondo->id; ?></td>
                        <td><?php echo $fondo->isan; ?></td>
                        <td><?php echo $fondo->titulo; ?></td>
                        <td><?php echo $fondo->director; ?></td>
                        <td><?php echo $fondo->genero; ?></td>
                        <td><?php echo $fondo->anio; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else :?>
        <p>No hay fondos cargados en la base de datos</p>
    <?php endif?>
<?php else :?>
    <p>No hay fondos disponibles</p>
<?php endif?>
