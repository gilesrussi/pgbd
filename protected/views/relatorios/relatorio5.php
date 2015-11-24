<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function buscaCursos(id) {
        $.ajax({
            url: '<?php echo $this->createUrl('relatorio5nivel2'); ?>',
            data: {
                id: id,
            }
        }).done(function(html) {
            $('#' + id).html(html);
        });
    }

    function atualizaResposta() {
        var valor = $('#filtro').find(":selected").val();
        $.ajax({
            url: '<?php echo $this->createUrl('relatorio5nivel1'); ?>',
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
    'Relatorio 5',
);
?>

<h2>Relatorio 5</h2>
<p>PPCs ativos que possuem a disciplina</p>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
echo "<br>";
echo "Tipo de Disciplina: " . CHtml::dropDownList('filtro', 'oi', array(-1 => 'TODOS') + GxHtml::listDataEx(TipoDisciplina::model()->findAllAttributes(null, true)));
echo "<br>";
echo CHtml::button('Buscar', array('onClick' => 'atualizaResposta()'));
echo "<br>";
echo "<br>";
?>
<div class="resposta">
</div>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
