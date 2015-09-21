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

<?php 
$attributes = array(
            'id',
            'codigo',
            'nome',
            'carga_horaria_total',
	);
$tipoAulaDisciplina = TipoAulaHasDisciplina::model()->findAllByAttributes(array('disciplina_id' => $model->id));
foreach($tipoAulaDisciplina as $tad) {
    $attributes = array_merge($attributes, array(array(
        'name' => 'Carga Horária ' . ($tad->tipoAula ? $tad->tipoAula : 'Unitária'),
        'type' => 'raw',
        'value' => $tad->carga_horaria,
    )));
}

$this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => $attributes,
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