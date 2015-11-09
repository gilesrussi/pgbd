<?php

class ImportacaoController extends Controller
{
    public function actionIndex() {
        if(isset($_POST['importar']))
        {
            print_r($_FILES);
            move_uploaded_file($_FILES["arquivo"]["tmp_name"], "teste.xls");
            $this->importarArquivo();
        } else {
            print_r($_POST);

            $this->render('index');
        }
    }
    
    private function importarArquivo() {
        $fileName = "teste.xls";
        require_once dirname(__FILE__) . '/Classes/PHPExcel/IOFactory.php';

        $objPHPExcel = PHPExcel_IOFactory::load("teste.xls");
        $i = 2;
        $teste = $objPHPExcel->getSheet(0)->getCell('A'.$i);
        $colunas = str_split("ABCDEFGHIJKLMNOP");
        while($teste->getValue()) {
            $ss = array();
            foreach($colunas as $collumn) {
                $ss[] = $objPHPExcel->getSheet(0)->getCell($collumn . $i)->getValue();
            }
            $query = "INSERT INTO teste VALUES ('" . implode("', '", $ss) . "');";
            echo $query . "<br>";
            Yii::app()->db->createCommand($query)->query();
            $i++;
            $teste = $objPHPExcel->getSheet(0)->getCell('A'.$i);
        }
        return $i - 2;
    }
}