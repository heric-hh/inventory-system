<main class="content main-insumos">
    <?php require_once __DIR__ . "/../includes/navcontent.html.php"; ?>

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
            </tr>
        </thead>
    </table>
</main>