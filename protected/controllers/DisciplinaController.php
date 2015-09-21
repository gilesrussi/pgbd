<?php

class DisciplinaController extends GxController
{


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'Disciplina'),
        ));
    }

    public function actionCreate()
    {
        $model = new Disciplina;


        if (isset($_POST['Disciplina'])) {
            $model->setAttributes($_POST['Disciplina']);

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
        $model = $this->loadModel($id, 'Disciplina');


        if (isset($_POST['Disciplina'])) {
            $model->setAttributes($_POST['Disciplina']);

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
            $this->loadModel($id, 'Disciplina')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Disciplina');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new Disciplina('search');
        $model->unsetAttributes();

        if (isset($_GET['Disciplina']))
            $model->setAttributes($_GET['Disciplina']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}