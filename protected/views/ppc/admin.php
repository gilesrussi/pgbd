<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('ppc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'ppc-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
				'name'=>'curso_id',
				'value'=>'GxHtml::valueEx($data->curso)',
				'filter'=>GxHtml::listDataEx(Curso::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'situacao_id',
				'value'=>'GxHtml::valueEx($data->situacao)',
				'filter'=>GxHtml::listDataEx(Situacao::model()->findAllAttributes(null, true)),
				),
		'numero',
		'carga_horaria_total_curso',
		'credito_total',
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>