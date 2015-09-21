<?php

class PpcHasTipoDisciplinaController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'PpcHasTipoDisciplina'),
		));
	}

	public function actionCreate() {
		$model = new PpcHasTipoDisciplina;


		if (isset($_POST['PpcHasTipoDisciplina'])) {
			$model->setAttributes($_POST['PpcHasTipoDisciplina']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'PpcHasTipoDisciplina');


		if (isset($_POST['PpcHasTipoDisciplina'])) {
			$model->setAttributes($_POST['PpcHasTipoDisciplina']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'PpcHasTipoDisciplina')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('PpcHasTipoDisciplina');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new PpcHasTipoDisciplina('search');
		$model->unsetAttributes();

		if (isset($_GET['PpcHasTipoDisciplina']))
			$model->setAttributes($_GET['PpcHasTipoDisciplina']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}