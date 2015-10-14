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
	'id' => 'ppc-has-tipo-disciplina-has-disciplina-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array(
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