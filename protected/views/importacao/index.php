<?php

$form = $this->beginWidget(
    'CActiveForm',
    array(
        'id' => 'upload-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
    )
);
// ...
echo CHtml::fileField('arquivo');
// ...
echo CHtml::submitButton('Submit', array('name' => 'importar'));
$this->endWidget();