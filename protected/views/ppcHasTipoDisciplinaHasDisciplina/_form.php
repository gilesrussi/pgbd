<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'ppc-has-tipo-disciplina-has-disciplina-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'ppc_has_tipo_disciplina_id'); ?>
		<?php echo $form->dropDownList($model, 'ppc_has_tipo_disciplina_id', GxHtml::listDataEx(PpcHasTipoDisciplina::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'ppc_has_tipo_disciplina_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'disciplina_id'); ?>
		<?php echo $form->dropDownList($model, 'disciplina_id', GxHtml::listDataEx(Disciplina::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'disciplina_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'periodo_id'); ?>
		<?php echo $form->dropDownList($model, 'periodo_id', GxHtml::listDataEx(Periodo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'periodo_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'situacao_curriculo_id'); ?>
		<?php echo $form->dropDownList($model, 'situacao_curriculo_id', GxHtml::listDataEx(SituacaoCurriculo::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'situacao_curriculo_id'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->