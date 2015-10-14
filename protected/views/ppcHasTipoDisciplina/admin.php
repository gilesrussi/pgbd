<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	);
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'ppc-has-tipo-disciplina-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
		array(
				'name'=>'ppc_id',
				'value'=>'GxHtml::valueEx($data->ppc)',
				'filter'=>GxHtml::listDataEx(Ppc::model()->findAllAttributes(null, true)),
				),
		array(
				'name'=>'tipo_disciplina_id',
				'value'=>'GxHtml::valueEx($data->tipoDisciplina)',
				'filter'=>GxHtml::listDataEx(TipoDisciplina::model()->findAllAttributes(null, true)),
				),
		'carga_horaria_total_tipo_disciplina',
		array(
			'class' => 'CButtonColumn',
		),
	),
)); ?>