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
		<?php echo $form->label($model, 'curso_id'); ?>
		<?php echo $form->dropDownList($model, 'curso_id', GxHtml::listDataEx(Curso::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'situacao_id'); ?>
		<?php echo $form->dropDownList($model, 'situacao_id', GxHtml::listDataEx(Situacao::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'numero'); ?>
		<?php echo $form->textField($model, 'numero', array('maxlength' => 20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'carga_horaria_total_curso'); ?>
		<?php echo $form->textField($model, 'carga_horaria_total_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'credito_total'); ?>
		<?php echo $form->textField($model, 'credito_total'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
