<?php

class PpcController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Ppc'),
		));
	}

	public function actionCreate() {
		$model = new Ppc;


		if (isset($_POST['Ppc'])) {
			$model->setAttributes($_POST['Ppc']);

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
		$model = $this->loadModel($id, 'Ppc');


		if (isset($_POST['Ppc'])) {
			$model->setAttributes($_POST['Ppc']);

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
			$this->loadModel($id, 'Ppc')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Ppc');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Ppc('search');
		$model->unsetAttributes();

		if (isset($_GET['Ppc']))
			$model->setAttributes($_GET['Ppc']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}