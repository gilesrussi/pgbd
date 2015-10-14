<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'ppc-has-tipo-disciplina-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'ppc_id'); ?>
		<?php echo $form->dropDownList($model, 'ppc_id', GxHtml::listDataEx(Ppc::model()->findAllAttributes(null, true)), array("disabled"=>"disabled" )); ?>
		<?php echo $form->error($model,'ppc_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tipo_disciplina_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_disciplina_id', GxHtml::listDataEx(TipoDisciplina::model()->findAllAttributes(null, true)), array("disabled"=>"disabled" )); ?>
		<?php echo $form->error($model,'tipo_disciplina_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'carga_horaria_total_tipo_disciplina'); ?>
		<?php echo $form->textField($model, 'carga_horaria_total_tipo_disciplina'); ?>
		<?php echo $form->error($model,'carga_horaria_total_tipo_disciplina'); ?>
		</div><!-- row -->

		
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->