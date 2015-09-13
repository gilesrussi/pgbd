<?php

/**
 * This is the model base class for the table "curso".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Curso".
 *
 * Columns in table "curso" available as properties of the model,
 * followed by relations of table "curso" available as properties of the model.
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nome
 * @property string $codigo_estruturado
 *
 * @property Ppc[] $ppcs
 */
abstract class BaseCurso extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'curso';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Curso|Cursos', $n);
	}

	public static function representingColumn() {
		return 'codigo';
	}

	public function rules() {
		return array(
			array('codigo, nome, codigo_estruturado', 'required'),
			array('codigo, nome, codigo_estruturado', 'length', 'max'=>45),
			array('id, codigo, nome, codigo_estruturado', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'ppcs' => array(self::HAS_MANY, 'Ppc', 'curso_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'codigo' => Yii::t('app', 'Codigo'),
			'nome' => Yii::t('app', 'Nome'),
			'codigo_estruturado' => Yii::t('app', 'Codigo Estruturado'),
			'ppcs' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('codigo', $this->codigo, true);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('codigo_estruturado', $this->codigo_estruturado, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}