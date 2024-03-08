<main class="content main-crear-insumo">
    <?php require_once __DIR__ . "/../includes/navcontent.html.php"; ?>

    <div class="main-crear-insumo__container">
        <h2>Crear Insumo</h2>
        <? foreach ($errors as $error) : ?>
            <div class="alert">
                <? echo $error ?>
            </div>
        <? endforeach ?>
        <form action="/insumos/crear" class="main-crear-insumo__form" method="POST">
            <?php require_once __DIR__ . "/../includes/forminsumo.html.php" ?>
            <input type="submit" value="Guardar" class="button button-success">
        </form>
    </div>
</main>