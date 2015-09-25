<?php

class PpcHasTipoDisciplinaHasDisciplinaController extends GxController
{


    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id, 'PpcHasTipoDisciplinaHasDisciplina'),
        ));
    }

    public function actionCreate($id)
    {
        $model = new PpcHasTipoDisciplinaHasDisciplina;
        $model->ppc_has_tipo_disciplina_id = $id;

        if (isset($_POST['PpcHasTipoDisciplinaHasDisciplina'])) {
            $model->setAttributes($_POST['PpcHasTipoDisciplinaHasDisciplina']);

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
        $model = $this->loadModel($id, 'PpcHasTipoDisciplinaHasDisciplina');


        if (isset($_POST['PpcHasTipoDisciplinaHasDisciplina'])) {
            $model->setAttributes($_POST['PpcHasTipoDisciplinaHasDisciplina']);

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
            $this->loadModel($id, 'PpcHasTipoDisciplinaHasDisciplina')->delete();

            if (!Yii::app()->getRequest()->getIsAjaxRequest())
                $this->redirect(array('admin'));
        } else
            throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
    }

    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('PpcHasTipoDisciplinaHasDisciplina');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdmin()
    {
        $model = new PpcHasTipoDisciplinaHasDisciplina('search');
        $model->unsetAttributes();

        if (isset($_GET['PpcHasTipoDisciplinaHasDisciplina']))
            $model->setAttributes($_GET['PpcHasTipoDisciplinaHasDisciplina']);

        $this->render('admin', array(
            'model' => $model,
        ));
    }

}