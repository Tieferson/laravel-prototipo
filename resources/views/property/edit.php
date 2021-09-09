<?php
if (!empty($property)) {

    foreach ($property as $prop) {
?>
        <h1><?= $prop->title ?></h1>

        <form action="<?= url('/imoveis/update', ['id' => $prop->id]) ?>" method="post">
            <?= csrf_field() ?>
            <?= method_field('PUT') ?>
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value='<?= $prop->title ?>'>
            <br />
            <label for="description">Título</label>
            <textarea name="description" id="description" cols="30" rows="10"><?= $prop->description ?></textarea>
            <br />
            <label for="rental_price">Valor Locação</label>
            <input type="text" name="rental_price" id="rental_price" value='<?= $prop->rental_price ?>'>
            <br />
            <label for="sale_price">Valor de Venda</label>
            <input type="text" name="sale_price" id="sale_price" value='<?= $prop->sale_price ?>'>
            <br />
            <button type="submit">Cadastrar imóvel</button>
        </form>

<?php
    }
}
?>