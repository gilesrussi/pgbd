<?php

$this->breadcrumbs = array(
	PpcHasTipoDisciplina::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . PpcHasTipoDisciplina::label(), 'url' => array('create')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . PpcHasTipoDisciplina::label(2), 'url' => array('admin')),
);
?>

<h1><?php echo GxHtml::encode(PpcHasTipoDisciplina::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 