<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(

array(
			'name' => 'ppcHasTipoDisciplina',
			'type' => 'raw',
			'value' => $model->ppcHasTipoDisciplina !== null ? GxHtml::link(GxHtml::encode($model->ppcHasTipoDisciplina->ppc . ' - ' . GxHtml::valueEx($model->ppcHasTipoDisciplina)), array('ppcHasTipoDisciplina/view', 'id' => GxActiveRecord::extractPkValue($model->ppcHasTipoDisciplina, true))) : null,
			),
array(
			'name' => 'disciplina',
			'type' => 'raw',
			'value' => $model->disciplina !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->disciplina) . ' - ' . $model->disciplina->nome), array('disciplina/view', 'id' => GxActiveRecord::extractPkValue($model->disciplina, true))) : null,
			),
array(
			'name' => 'periodo',
			'type' => 'raw',
			'value' => $model->periodo !== null ? GxHtml::encode(GxHtml::valueEx($model->periodo)) : null,
			),
array(
			'name' => 'situacaoCurriculo',
			'type' => 'raw',
			'value' => $model->situacaoCurriculo !== null ? GxHtml::encode(GxHtml::valueEx($model->situacaoCurriculo)) : null,
			),
	),
)); ?>

