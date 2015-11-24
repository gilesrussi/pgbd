<?php

class ImportacaoController extends Controller
{
    public function actionIndex() {
        if(isset($_POST['importar']))
        {
            move_uploaded_file($_FILES["arquivo"]["tmp_name"], "teste.xls");
            $this->redirect(array('importar'));
            
        } else {
            $this->render('index');
        }
    }
    
    private function limparTeste() {
        Yii::app()->db->createCommand("DELETE FROM teste")->query();
    }
    
    private function importarDados($dp) {
        //importa periodo
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(PERIODO_IDEAL) FROM teste")->queryAll();
        $tabela = "periodo";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                $query = "INSERT INTO periodo(id) VALUES ('$expl');";
                Yii::app()->db->createCommand($query)->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa situação currículo
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(SIT_CURRICULO) FROM teste")->queryAll();
        $tabela = "situacao_curriculo";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO situacao_curriculo(descricao) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa tipo_disciplina
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(TIPO_DISCIPLINA) FROM teste")->queryAll();
        $tabela = "tipo_disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO tipo_disciplina(descricao) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa situacao
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(SIT_VERSAO) FROM teste")->queryAll();
        $tabela = "situacao";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO situacao(descricao) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa tipo_aula
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(TIPO_AULA) FROM teste WHERE TIPO_AULA != ''")->queryAll();
        $tabela = "tipo_aula";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO tipo_aula(descricao) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa tipo_disciplina
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(TIPO_DISCIPLINA) FROM teste")->queryAll();
        $tabela = "tipo_disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO tipo_disciplina(descricao) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa curso
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(COD_CURSO), NOME_UNIDADE, COD_ESTRUTURADO FROM teste")->queryAll();
        $tabela = "curso";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO curso(codigo, nome, codigo_estruturado) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa disciplina
        $tmp = Yii::app()->db->createCommand("SELECT DISTINCT(COD_DISCIPLINA), NOME_DISCIPLINA, CH_TOTAL FROM teste")->queryAll();
        $tabela = "disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO disciplina(codigo, nome, carga_horaria_total) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa tipo_aula_has_disciplina
        $tmp = Yii::app()->db->createCommand("SELECT d.id, ta.id as teste, t.CH FROM teste t INNER JOIN disciplina d ON t.COD_DISCIPLINA = d.codigo INNER JOIN tipo_aula ta ON t.TIPO_AULA = ta.descricao GROUP BY TIPO_AULA, COD_DISCIPLINA")->queryAll();
        $tabela = "tipo_aula_has_disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO tipo_aula_has_disciplina(disciplina_id, tipo_aula_id, carga_horaria) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa ppc
        $tmp = Yii::app()->db->createCommand("SELECT c.id as curso_id, s.id as situacao_id, t.NUM_VERSAO, t.CH_TOTAL_CURSO, t.TOTAL_CR FROM teste t INNER JOIN curso c ON c.codigo = t.COD_CURSO INNER JOIN situacao s ON s.descricao = t.SIT_VERSAO GROUP BY t.COD_CURSO, t.NUM_VERSAO")->queryAll();
        $tabela = "ppc";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                $query = "INSERT INTO ppc(curso_id, situacao_id, numero, carga_horaria_total_curso, credito_total) VALUES ('$expl');";
                Yii::app()->db->createCommand($query)->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa ppc_has_tipo_disciplina
        $tmp = Yii::app()->db->createCommand("SELECT p.id as ppc_id, td.id as tipo_disciplina_id, t.TOTAL_CH FROM teste t INNER JOIN ppc p ON p.numero = t.NUM_VERSAO INNER JOIN tipo_disciplina td ON td.descricao = t.TIPO_DISCIPLINA GROUP BY t.NUM_VERSAO, t.TIPO_DISCIPLINA")->queryAll();
        $tabela = "ppc_has_tipo_disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO ppc_has_tipo_disciplina(ppc_id, tipo_disciplina_id, carga_horaria_total_tipo_disciplina) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        //importa ppc_has_tipo_disciplina_has_disciplina
        $tmp = Yii::app()->db->createCommand("SELECT ptd.id as ppc_has_tipo_disciplina_id, d.id as disciplina_id, p.id as periodo_id, sc.id as situacao_curriculo_id
		FROM teste t 
			INNER JOIN disciplina d 
				ON t.COD_DISCIPLINA = d.codigo 
			INNER JOIN periodo p 
				ON t.PERIODO_IDEAL = p.id 
			INNER JOIN situacao_curriculo sc 
				ON sc.descricao = t.SIT_CURRICULO 
			INNER JOIN ppc
				ON ppc.numero = t.NUM_VERSAO
			INNER JOIN ppc_has_tipo_disciplina ptd
				ON ptd.ppc_id = ppc.id
      INNER JOIN tipo_disciplina td
        ON td.descricao = t.TIPO_DISCIPLINA
      WHERE td.id = ptd.tipo_disciplina_id
			GROUP BY t.COD_DISCIPLINA, t.NUM_VERSAO, t.TIPO_DISCIPLINA")->queryAll();
        $tabela = "ppc_has_tipo_disciplina_has_disciplina";
        $dp[$tabela]['inserido'] = 0;
        $dp[$tabela]['duplicado'] = 0;
        foreach($tmp as $entrada) {
            $expl =  implode("', '", $entrada);
            try {
                Yii::app()->db->createCommand("INSERT INTO ppc_has_tipo_disciplina_has_disciplina(
		ppc_has_tipo_disciplina_id, 
		disciplina_id, 
		periodo_id, 
		situacao_curriculo_id
	) VALUES ('$expl');")->query();
                $dp[$tabela]['inserido']++;
            } catch (Exception $e) {
                $dp[$tabela]['duplicado']++;
            }
        }
        
        return $dp;
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
            //echo $query . "<br>";
            Yii::app()->db->createCommand($query)->query();
            $i++;
            $teste = $objPHPExcel->getSheet(0)->getCell('A'.$i);
        }
        return $i - 2;
    }
    
    public function actionImportar() {
        set_time_limit(1000);
        $total = 0;
        $this->limparTeste();
        $dataProvider = array();
        $total = $this->importarArquivo();
        
        $dataProvider = $this->importarDados($dataProvider);
        $this->limparTeste();
        $this->render('importando', array(
            'total' => $total,  
            'dataProvider' => $dataProvider
        ));
        set_time_limit(30);
        
        
    }
}