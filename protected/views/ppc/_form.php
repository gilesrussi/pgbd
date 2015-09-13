<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'ppc-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'curso_id'); ?>
		<?php echo $form->dropDownList($model, 'curso_id', GxHtml::listDataEx(Curso::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'curso_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'situacao_id'); ?>
		<?php echo $form->dropDownList($model, 'situacao_id', GxHtml::listDataEx(Situacao::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'situacao_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textField($model, 'numero', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'numero'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'carga_horaria_total_curso'); ?>
		<?php echo $form->textField($model, 'carga_horaria_total_curso'); ?>
		<?php echo $form->error($model,'carga_horaria_total_curso'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'credito_total'); ?>
		<?php echo $form->textField($model, 'credito_total'); ?>
		<?php echo $form->error($model,'credito_total'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('ppcHasTipoDisciplinas')); ?></label>
		<?php echo $form->checkBoxList($model, 'ppcHasTipoDisciplinas', GxHtml::encodeEx(GxHtml::listDataEx(PpcHasTipoDisciplina::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->