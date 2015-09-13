<?php

/**
 * This is the model base class for the table "tipo_aula".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TipoAula".
 *
 * Columns in table "tipo_aula" available as properties of the model,
 * followed by relations of table "tipo_aula" available as properties of the model.
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property TipoAulaHasDisciplina[] $tipoAulaHasDisciplinas
 */
abstract class BaseTipoAula extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'tipo_aula';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'TipoAula|TipoAulas', $n);
	}

	public static function representingColumn() {
		return 'descricao';
	}

	public function rules() {
		return array(
			array('descricao', 'length', 'max'=>45),
			array('descricao', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, descricao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'tipoAulaHasDisciplinas' => array(self::HAS_MANY, 'TipoAulaHasDisciplina', 'tipo_aula_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'descricao' => Yii::t('app', 'Descricao'),
			'tipoAulaHasDisciplinas' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('descricao', $this->descricao, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}