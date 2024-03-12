<main class="content main-insumos">
    <?php require_once __DIR__ . "/../../includes/navcontent.html.php"; ?>

    <?
    if ($result) {
        $alert = showAlert(intval($result));

        if ($alert) { ?>
            <div class="alert-container">
                <p class="alert success"> <? echo sanitize($alert) ?> </p>
            </div>
    <? }
    }
    ?>
    <div class="main-insumos__filters">
        <label for="" class="main-insumos__filters__label">Categoría:</label>
        <select name="" id="">
            <option value="">Cuadro Básico</option>
            <option value="">Material de Curación</option>
            <option value="">Anestésicos</option>
        </select>

        <label for="" class="main-insumos__filters__label">Ordenar Por:</label>
        <select name="" id="">
            <option value="">A - Z</option>
            <option value="">Z - A</option>
        </select>

        <label for="" class="main-insumos__filters__label">Mostrar Por Página:</label>
        <select name="" id="">
            <option value="">30</option>
            <option value="">40</option>
            <option value="">50</option>
        </select>
    </div>

    <table class="insumos-table">
        <caption class="insumos-table__title">Tabla de Insumos</caption>
        <thead class="insumos-table__head">
            <tr class="insumos-table__tr">
                <th class="insumos-table__th">Clave</th>
                <th class="insumos-table__th">Descripción</th>
                <th class="insumos-table__th">Categoría</th>
                <th class="insumos-table__th">Disponibles</th>
                <th class="insumos-table__th">Acciones</th>
            </tr>
        </thead>
        <tbody class="insumos-table__body">
            <?php foreach ($insumos as $insumo) : ?>
                <tr>
                    <td> <?php echo $insumo->clave ?></td>
                    <td> <?php echo $insumo->descripcion ?></td>
                    <td> <?php echo $insumo->id_categoria ?></td>
                    <td> <?php echo $insumo->cantidad_total ?></td>
                    <td class="insumos-table__actions">
                        <form action="insumos/eliminar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $insumo->id ?>">
                            <input type="submit" class="button button-warning" value="Eliminar">
                        </form>
                        <a href="/insumos/editar?id=<? echo $insumo->id ?>" class="button button-alert">Editar</a>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</main>