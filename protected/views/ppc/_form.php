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
		<?php echo $form->labelEx($model,'credito_total'); ?>
		<?php echo $form->textField($model, 'credito_total'); ?>
		<?php echo $form->error($model,'credito_total'); ?>
		</div><!-- row -->
                
                <?php
                $tipo_disciplina = TipoDisciplina::model()->findAll();
                foreach($tipo_disciplina as $tipo){
                    echo "<div class='row'>";
                    echo CHtml::label("Carga Horária " . $tipo->descricao, true);
                    $temp = PpcHasTipoDisciplina::model()->findByAttributes(array('ppc_id' => $model->id, 'tipo_disciplina_id' => $tipo->id));
                    echo CHtml::textField("Disciplina[tipo_aula][$tipo->id]", isset($temp) ? $temp->carga_horaria_total_tipo_disciplina : '0');
                    echo "</div>";
                }
                ?>
                
<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->