<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function atualizaResposta() {
        var valor = $('#filtro').find(":selected").val();
        var tipo = $('#filtro_tipo').find(":selected").val();
        $.ajax({
            url: '<?php echo $this->createUrl('relatorio3nivel1'); ?>',
            data: {
                id: valor,
                tipo: tipo,
            }
        }).done(function(html) {
            $('.resposta').html(html);
        });
    }
</script>
<?php
$this->breadcrumbs = array(
    GxHtml::encodeEx('Relatorios') => array('/relatorios/'),
    'Relatorio 4',
);
?>

<h2>Relatorio 3</h2>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
echo "<br>";
echo "Curso: " . CHtml::dropDownList('filtro', 'oi',GxHtml::listDataEx(Curso::model()->findAllAttributes(null, true)));
echo "Tipo: " . CHtml::dropDownList('filtro_tipo', '', array('MIN' => 'Minimo', 'MAX' => 'Máximo'));
echo "<br>";
echo CHtml::button('Buscar', array('onClick' => 'atualizaResposta()'));
echo "<br>";
echo "<br>";
?>
<div class="resposta">
</div>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
