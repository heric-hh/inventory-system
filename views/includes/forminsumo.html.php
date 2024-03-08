<div class="form__left">
    <label for="clave" class="crear-insumo__form__label">Clave</label>
    <input type="text" name="insumo[clave]" placeholder="123.456.789" class="crear-insumo__form__input">

    <label for="descripcion" class="crear-insumo__form__label">Descripción</label>
    <input type="text" name="insumo[descripcion]" class="crear-insumo__form__input">

    <label for="categoria" class="crear-insumo__form__label">Categoría</label>
    <select name="insumo[id_categoria]" id="categoria" class="crear-insumo__form__select">
        <option selected value="">--Seleccione--</option>
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<? echo sanitize($categoria->id) ?>">
                <? echo $categoria->categoria ?>
            </option>
        <? endforeach ?>
    </select>
</div>
<div class="form__right">
    <label for="presentacion" class="crear-insumo__form__label">Presentación</label>
    <select name="insumo[id_presentacion]" id="presentacion" class="crear-insumo__form__select">
        <option selected value=""> --Seleccione--</option>
        <?php foreach ($presentaciones as $presentacion) : ?>
            <option value="<? echo sanitize($presentacion->id) ?>">
                <? echo $presentacion->presentacion ?>
            </option>
        <? endforeach ?>
    </select>

    <label for="lote" class="crear-insumo__form__label">Número de Lote</label>

    <!--//! Listar los lotes disponibles para almacenar el insumo-->
    <input type="text" name="insumo[id_lote]" class="crear-insumo__form__input">

    <label for="cantidad" class="crear-insumo__form__label">Cantidad</label>
    <input type="number" name="insumo[cantidad_total]" class="crear-insumo__form__input" default=0 min=1>

</div>