<?php

/**
 * This is the model base class for the table "disciplina".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Disciplina".
 *
 * Columns in table "disciplina" available as properties of the model,
 * followed by relations of table "disciplina" available as properties of the model.
 *
 * @property integer $id
 * @property string $codigo
 * @property string $nome
 * @property integer $carga_horaria_total
 *
 * @property PpcHasTipoDisciplinaHasDisciplina[] $ppcHasTipoDisciplinaHasDisciplinas
 * @property TipoAulaHasDisciplina[] $tipoAulaHasDisciplinas
 */
abstract class BaseDisciplina extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'disciplina';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Disciplina|Disciplinas', $n);
	}

	public static function representingColumn() {
		return 'codigo';
	}

	public function rules() {
		return array(
			array('codigo, nome', 'required'),
			array('carga_horaria_total', 'numerical', 'integerOnly'=>true),
			array('codigo, nome', 'length', 'max'=>45),
			array('carga_horaria_total', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, codigo, nome, carga_horaria_total', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'ppcHasTipoDisciplinaHasDisciplinas' => array(self::HAS_MANY, 'PpcHasTipoDisciplinaHasDisciplina', 'disciplina_id'),
			'tipoAulaHasDisciplinas' => array(self::HAS_MANY, 'TipoAulaHasDisciplina', 'disciplina_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'codigo' => Yii::t('app', 'Código'),
			'nome' => Yii::t('app', 'Nome'),
			'carga_horaria_total' => Yii::t('app', 'Carga Horária Total'),
			'ppcHasTipoDisciplinaHasDisciplinas' => null,
			'tipoAulaHasDisciplinas' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('codigo', $this->codigo, true);
		$criteria->compare('nome', $this->nome, true);
		$criteria->compare('carga_horaria_total', $this->carga_horaria_total);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}