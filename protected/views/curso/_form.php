<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'curso-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model, 'codigo', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'codigo'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model, 'nome', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'nome'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'codigo_estruturado'); ?>
		<?php echo $form->textField($model, 'codigo_estruturado', array('maxlength' => 45)); ?>
		<?php echo $form->error($model,'codigo_estruturado'); ?>
		</div><!-- row -->
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->