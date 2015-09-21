<?php

Yii::import('application.models._base.BaseCurso');

class Curso extends BaseCurso
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public static function representingColumn() {
		return array('nome');
	}
}