<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">
    function atualizaResposta() {
        var valor_versao = $('#filtro_versao').find(":selected").val();
        var valor_curso = $('#filtro_curso').find(":selected").val();
        $.ajax({
            url: '<?php echo $this->createUrl('relatorio6nivel1'); ?>',
            data: {
                id: valor_versao,
                curso_id: valor_curso,
            }
        }).done(function(html) {
            $('.resposta').html(html);
        });
    }
    function getPpcs() {
        var valor_curso = $('#filtro_curso').find(":selected").val();
        $.ajax({
            url: '<?php echo $this->createUrl('ppcporcurso'); ?>',
            data: {
                id: valor_curso,
            }
        }).done(function(html) {
            $('#filtro_versao').html(html);
        });
    }
</script>
<?php
$this->breadcrumbs = array(
    GxHtml::encodeEx('Relatorios') => array('/relatorios/'),
    'Relatorio 6',
);
?>

<h2>Relatorio 6</h2>
<p>PPCs ativos que possuem a disciplina</p>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
echo "<br>";
echo "Curso: " . CHtml::dropDownList('filtro_curso', '', array(''=>'') + GxHtml::listDataEx(Curso::model()->findAllAttributes(null, true)), array('onchange' => 'getPpcs()'));
echo "Versão: " . CHtml::dropDownList('filtro_versao', '', array());
echo "<br>";
echo CHtml::button('Buscar', array('onClick' => 'atualizaResposta()'));
echo "<br>";
echo "<br>";
?>
<div class="resposta">
</div>
<?php
echo CHtml::link('<h3>Voltar</h3>', $this->createUrl('index'));
