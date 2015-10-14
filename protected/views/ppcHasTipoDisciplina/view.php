<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Add') . ' ' . 'Disciplina', 'url'=>array('/ppchastipodisciplinahasdisciplina/create', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo  GxHtml::encode($model->ppc->curso) . ' -> ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
array(
			'name' => 'ppc',
			'type' => 'raw',
			'value' => $model->ppc !== null ? GxHtml::link(GxHtml::encode($model->ppc->curso . ' - ' . GxHtml::valueEx($model->ppc)), array('ppc/view', 'id' => GxActiveRecord::extractPkValue($model->ppc, true))) : null,
			),
array(
			'name' => 'tipoDisciplina',
			'type' => 'raw',
			'value' => $model->tipoDisciplina !== null ? GxHtml::encode(GxHtml::valueEx($model->tipoDisciplina)) : null,
			),
'carga_horaria_total_tipo_disciplina',
	),
)); ?>

<h2><?php echo GxHtml::encode("Vinculadas como " . GxHtml::encode(GxHtml::valueEx($model)) . ' no PPC ' . $model->ppc . ' do curso ' . $model->ppc->curso); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->ppcHasTipoDisciplinaHasDisciplinas as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode($relatedModel->disciplina . ' - ' . $relatedModel->disciplina->nome), array('ppcHasTipoDisciplinaHasDisciplina/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>