<?php

$this->breadcrumbs = array(
	Curso::label(2) => array('/curso/'),
	$cursoModel->nome => array('/curso/view/', 'id' => $cursoModel->id),
	Yii::t('app', 'Add') . ' ' . Ppc::label(1),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url' => array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Add') . ' ' . GxHtml::encode($model->label()) . ' ' . Yii::t('app', 'to') . ' ' . $cursoModel ?></h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model,
		'buttons' => 'create'));
?>