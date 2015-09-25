<?php

Yii::import('application.models._base.BaseDisciplina');

class Disciplina extends BaseDisciplina {

    public $codigo_nome;
    
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function afterFind() {
        $this->codigo_nome = $this->codigo . ' - ' . $this->nome;
    }
}
