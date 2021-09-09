

<?php
    if(!empty($property)){
        
        foreach($property as $prop){
            ?>
            <h1><?= $prop->title ?></h1>

            <p>Descrição: <?= $prop->description ?></p>


            <p>Valor de Locação: <?= $prop->rental_price ?></p>

            <p>Valor de venda: <?= $prop->sale_price ?></p>

            <?php
        }
    }
?>
