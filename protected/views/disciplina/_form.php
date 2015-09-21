<div class="form">


    <?php $form = $this->beginWidget('GxActiveForm', array(
        'id' => 'disciplina-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">
        <?php echo Yii::t('app', 'Fields with'); ?> <span
            class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'codigo'); ?>
        <?php echo $form->textField($model, 'codigo', array('maxlength' => 45)); ?>
        <?php echo $form->error($model, 'cod    igo'); ?>
    </div>
    <!-- row -->
    <div class="row">
        <?php echo $form->labelEx($model, 'nome'); ?>
        <?php echo $form->textField($model, 'nome', array('maxlength' => 45)); ?>
        <?php echo $form->error($model, 'nome'); ?>
    </div>
    <!-- row -->
    
    <?php
    $tipo_aula = TipoAula::model()->findAll();
    foreach($tipo_aula as $tipo){
        echo "<div class='row'>";
        echo CHtml::label("Carga Horária " . $tipo->descricao, true);
        $temp = TipoAulaHasDisciplina::model()->findByAttributes(array('disciplina_id' => $model->id, 'tipo_aula_id' => $tipo->id));
        echo CHtml::textField("Disciplina[tipo_aula][$tipo->id]", isset($temp) ? $temp->carga_horaria : '0');
        echo "</div>";
    }
    ?>
    <!-- row -->
    <label><?php //echo GxHtml::encode($model->getRelationLabel('ppcHasTipoDisciplinaHasDisciplinas')); ?></label>
    <?php //echo $form->checkBoxList($model, 'ppcHasTipoDisciplinaHasDisciplinas', GxHtml::encodeEx(GxHtml::listDataEx(PpcHasTipoDisciplinaHasDisciplina::model()->findAllAttributes(null, true)), false, true)); ?>
    <label><?php //echo GxHtml::encode($model->getRelationLabel('tipoAulaHasDisciplinas')); ?></label>
    <?php //echo $form->checkBoxList($model, 'tipoAulaHasDisciplinas', GxHtml::encodeEx(GxHtml::listDataEx(TipoAulaHasDisciplina::model()->findAllAttributes(null, true)), false, true)); ?>

    <?php
    echo GxHtml::submitButton(Yii::t('app', 'Save'));
    $this->endWidget();
    ?>
</div>
<!-- form -->