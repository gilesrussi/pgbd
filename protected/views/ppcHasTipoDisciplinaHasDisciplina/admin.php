<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ppc-has-tipo-disciplina-has-disciplina-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo GxHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'ppc-has-tipo-disciplina-has-disciplina-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		'id',
		array(
				'name'=>'ppc_has_tipo_disciplina_id',
				'value'=>'GxHtml::valueEx($data->ppcHasTipoDisciplina)',
				'filter'=>GxHtml::listDataEx(PpcHasTipoDisciplina::model()->findAll()),
				),
		array(
				'name'=>'disciplina_id',
				'value'=>'GxHtml::valueEx($data->disciplina)',
				'filter'=>GxHtml::listDataEx(Disciplina::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'periodo_id',
				'value'=>'GxHtml::valueEx($data->periodo)',
				'filter'=>GxHtml::listDataEx(Periodo::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'situacao_curriculo_id',
				'value'=>'GxHtml::valueEx($data->situacaoCurriculo)',
				'filter'=>GxHtml::listDataEx(SituacaoCurriculo::model()->findAllAttributes(null, true)),
				),
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>