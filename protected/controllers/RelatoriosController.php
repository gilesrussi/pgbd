<?php

class RelatoriosController extends GxController
{
    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionRelatorio1() {
        $this->render('relatorio1');
    }
}
