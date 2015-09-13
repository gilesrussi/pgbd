<?php

/**
 * This is the model base class for the table "situacao".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Situacao".
 *
 * Columns in table "situacao" available as properties of the model,
 * followed by relations of table "situacao" available as properties of the model.
 *
 * @property integer $id
 * @property string $descricao
 *
 * @property Ppc[] $ppcs
 */
abstract class BaseSituacao extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'situacao';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Situacao|Situacaos', $n);
	}

	public static function representingColumn() {
		return 'descricao';
	}

	public function rules() {
		return array(
			array('descricao', 'required'),
			array('descricao', 'length', 'max'=>45),
			array('id, descricao', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'ppcs' => array(self::HAS_MANY, 'Ppc', 'situacao_id'),
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
			'ppcs' => null,
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