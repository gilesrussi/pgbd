<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function atualizaResposta() {
        var valor = $('#filtro').find(":selected").val();
        $.ajax({
            url: '<?php echo $this->createUrl('relatorio4nivel1'); ?>',
            data: {
                id: valor,
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

<h2>Relatorio 4</h2>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
echo "<br>";
echo "Disciplina: " . CHtml::dropDownList('filtro', 'oi',GxHtml::listDataEx(Disciplina::model()->findAllAttributes(array('codigo', 'nome'), true), null, 'codigo_nome'));
echo "<br>";
echo CHtml::button('Buscar', array('onClick' => 'atualizaResposta()'));
echo "<br>";
echo "<br>";
?>
<div class="resposta">
</div>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
