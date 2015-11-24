<div>
    <h3>Sucesso!</h3>
</div>
<div>
<h4>Resumo:</h4>
Total de itens encontrados na tabela enviada: <?php echo $total; ?> <br>
<?php
foreach($dataProvider as $tabela => $valores) {
    echo "Tentou inserir na tabela " . $tabela . " " . ($valores['inserido'] + $valores['duplicado']) . " entradas.<br>";
    echo "Inseridos: " . $valores['inserido'] . "<br>";
    echo "Duplicados: " . $valores['duplicado'] . "<br><br>";
}
?>


</div>