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
'id',
array(
			'name' => 'ppc',
			'type' => 'raw',
			'value' => $model->ppc !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->ppc)), array('ppc/view', 'id' => GxActiveRecord::extractPkValue($model->ppc, true))) : null,
			),
array(
			'name' => 'tipoDisciplina',
			'type' => 'raw',
			'value' => $model->tipoDisciplina !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->tipoDisciplina)), array('tipoDisciplina/view', 'id' => GxActiveRecord::extractPkValue($model->tipoDisciplina, true))) : null,
			),
'carga_horaria_total_tipo_disciplina',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('ppcHasTipoDisciplinaHasDisciplinas')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->ppcHasTipoDisciplinaHasDisciplinas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('ppcHasTipoDisciplinaHasDisciplina/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>