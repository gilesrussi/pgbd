<?php

class CursoController extends GxController
{


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Curso'),
        ));
    }

    public function actionCreate()
    {
        $model = new Curso;


        if (isset($_POST['Curso'])) {
            $model->setAttributes($_POST['Curso']);

            if ($model->save()) {
                if (Yii::app()->getRequest()->getIsAjaxRequest())
                    Yii::app()->end();
                else
                    $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array('model' => $model));
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id, 'Curso');


        if (isset($_POST['Curso'])) {
            $model->setAttributes($_POST['Curso']);

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id, 'Curso')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Curso');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Curso('search');
        $model->unsetAttributes();

        if (isset($_GET['Curso']))
            $model->setAttributes($_GET['Curso']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}