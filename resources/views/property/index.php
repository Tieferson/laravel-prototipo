<h1>Listagem de Produtos</h1>

<style>

    table{
        padding:0;
        margin:0;
        border-spacing: 0;
        width:50%;
    }
    td{
        padding:10;
        margin:0;
       
    }
    tr:nth-child(even){
        background-color:#e0e0e0;
    }
    a{
        font-size: 10px;
        text-decoration: none;
    }

</style>
<p><a href="<?= url('/imoveis/novo') ?>">Cadastrar novo imóvel</a></p>

<?php

if(!empty($properties)){
    echo "<table>";
    echo "<tr>
        <td>Título</td>
        <td>Valor de Locação</td>
        <td>Valor de venda</td>
        <td>Opções</td>
    </tr>"; 

    foreach($properties as $property){
        $linkReadMore= url('imoveis/'.$property->slug);
        $linkEditItem= url('imoveis/editar/'.$property->slug);
        $linkRemoveItem= url('imoveis/remover/'.$property->slug);

        echo "<tr>
            <td>{$property->title}</td>
            <td>{$property->rental_price}</td>
            <td>{$property->sale_price}</td>
            <td><a href='$linkReadMore'>Veja Mais</a> | <a href='$linkEditItem'>Editar</a> | <a href='$linkRemoveItem'>Remover</a></td>
        </tr>"; 
       $property;
    }
    echo "</table>";
}
?>
