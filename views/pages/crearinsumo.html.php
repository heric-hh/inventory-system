<main class="content main-crear-insumo">
    <?php require_once __DIR__ . "/../includes/navcontent.html.php"; ?>

    <div class="main-crear-insumo__container">
        <h2>Crear Insumo</h2>
        <form action="" class="main-crear-insumo__form">
            <div class="form__left">
                <label for="clave" class="crear-insumo__form__label">Clave</label>
                <input type="text" class="crear-insumo__form__input">

                <label for="descripcion" class="crear-insumo__form__label">Descripción</label>
                <input type="text" class="crear-insumo__form__input">

                <label for="categoria" class="crear-insumo__form__label">Categoría</label>
                <select name="" id="" class="crear-insumo__form__select">
                    <option selected value="">--Seleccione--</option>
                    <?php foreach ($categorias as $categoria) : ?>
                        <option value="<? $categoria->id ?>">
                            <? echo $categoria->categoria ?>
                        </option>
                    <? endforeach ?>
                </select>
            </div>
            <div class="form__right">
                <label for="presentacion" class="crear-insumo__form__label">Presentación</label>
                <select name="" id="" class="crear-insumo__form__select">
                    <option selected value=""> --Seleccione--</option>
                    <?php foreach ($presentaciones as $presentacion) : ?>
                        <option value="<? $presentacion->id ?>">
                            <? echo $presentacion->presentacion ?>
                        </option>
                    <? endforeach ?>
                </select>

                <label for="lote" class="crear-insumo__form__label">Número de Lote</label>
                <input type="text" class="crear-insumo__form__input">

                <label for="cantidad" class="crear-insumo__form__label">Cantidad</label>
                <input type="number" class="crear-insumo__form__input" default=0 min=1>

                <input type="submit" value="Guardar" class="button button-success">
            </div>
        </form>
    </div>

</main>