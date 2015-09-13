<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'ppc_has_tipo_disciplina_id'); ?>
		<?php echo $form->dropDownList($model, 'ppc_has_tipo_disciplina_id', GxHtml::listDataEx(PpcHasTipoDisciplina::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'disciplina_id'); ?>
		<?php echo $form->dropDownList($model, 'disciplina_id', GxHtml::listDataEx(Disciplina::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'periodo_id'); ?>
		<?php echo $form->dropDownList($model, 'periodo_id', GxHtml::listDataEx(Periodo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'situacao_curriculo_id'); ?>
		<?php echo $form->dropDownList($model, 'situacao_curriculo_id', GxHtml::listDataEx(SituacaoCurriculo::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
