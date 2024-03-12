<div class="form__left">
    <label for="clave" class="cu-insumo__form__label">Clave</label>
    <input type="text" name="insumo[clave]" placeholder="123.456.789" class="cu-insumo__form__input" value="<? echo sanitize($insumo->clave) ?>">

    <label for="descripcion" class="cu-insumo__form__label">Descripción</label>
    <input type="text" name="insumo[descripcion]" class="cu-insumo__form__input" value="<? echo sanitize($insumo->descripcion) ?>">

    <label for="categoria" class="cu-insumo__form__label">Categoría</label>
    <select name="insumo[id_categoria]" id="categoria" class="cu-insumo__form__select">
        <option value="">--Seleccione--</option>
        <?php foreach ($categorias as $categoria) : ?>
            <option value="<? echo sanitize($categoria->id) ?>" <? if ($categoria->id === $insumo->id_categoria) echo "selected" ?>>
                <? echo $categoria->categoria ?>
            </option>
        <? endforeach ?>
    </select>
</div>
<div class="form__right">
    <label for="presentacion" class="cu-insumo__form__label">Presentación</label>
    <select name="insumo[id_presentacion]" id="presentacion" class="cu-insumo__form__select">
        <option value=""> --Seleccione--</option>
        <?php foreach ($presentaciones as $presentacion) : ?>
            <option value="<? echo sanitize($presentacion->id) ?>" <? if ($presentacion->id === $insumo->id_presentacion) echo "selected" ?>>
                <? echo $presentacion->presentacion ?>
            </option>
        <? endforeach ?>
    </select>

    <label for=" lote" class="cu-insumo__form__label">Número de Lote</label>

    <!--//! Listar los lotes disponibles para almacenar el insumo-->
    <input type="text" name="insumo[id_lote]" class="cu-insumo__form__input">

    <label for="cantidad" class="cu-insumo__form__label">Cantidad</label>
    <input type="number" name="insumo[cantidad_total]" class="cu-insumo__form__input" default=0 min=1 value="<? echo sanitize($insumo->cantidad_total) ?>">

</div>