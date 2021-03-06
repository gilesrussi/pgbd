<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
$attributes = array(
		array(
			'name' => 'curso',
			'type' => 'raw',
			'value' => $model->curso !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->curso)), array('curso/view', 'id' => GxActiveRecord::extractPkValue($model->curso, true))) : null,
		),
		'situacao',
		'numero',
		'carga_horaria_total_curso',
		'credito_total',
	);
$tipoDisciplinaPpc = PpcHasTipoDisciplina::model()->findAllByAttributes(array('ppc_id' => $model->id));
foreach($tipoDisciplinaPpc as $tad) {
    $attributes = array_merge($attributes, array(array(
        'name' => 'Carga Horária ' . ($tad->tipoDisciplina ? $tad->tipoDisciplina : 'Unitária'),
        'type' => 'raw',
        'value' => $tad->carga_horaria_total_tipo_disciplina . " " . CHtml::link("(Clique aqui para ver)", Yii::app()->baseUrl . '/ppchastipodisciplina/view/' . $tad->id),
    )));
}
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
        'nullDisplay' => '(Nulo)',
	'attributes' => $attributes,
)); ?>