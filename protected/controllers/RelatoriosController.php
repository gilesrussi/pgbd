<?php

class RelatoriosController extends GxController
{
    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionRelatorio1() {
        $this->render('relatorio1');
    }

    public function actionRelatorio5() {
        /*
         * SELECT d.nome, COUNT(c.id), d.id FROM disciplina d
       INNER JOIN ppc_has_tipo_disciplina_has_disciplina pdd
             ON pdd.disciplina_id = d.id
       INNER JOIN ppc_has_tipo_disciplina ptd
             ON ptd.id = pdd.ppc_has_tipo_disciplina_id
       INNER JOIN ppc
             ON ppc.id = ptd.ppc_id
       INNER JOIN curso c
             ON c.id = ppc.curso_id
       INNER JOIN situacao s
             ON ppc.situacao_id = s.id
       WHERE s.descricao = "ATIVO"
       GROUP BY d.id
       ORDER BY COUNT(c.id);
         */
        /*$sqlProvider = new CSqlDataProvider('SELECT d.nome, COUNT(c.id), d.id FROM disciplina d
        INNER JOIN ppc_has_tipo_disciplina_has_disciplina pdd
            ON pdd.disciplina_id = d.id
        INNER JOIN ppc_has_tipo_disciplina ptd
            ON ptd.id = pdd.ppc_has_tipo_disciplina_id
        INNER JOIN ppc
            ON ppc.id = ptd.ppc_id
        INNER JOIN curso c
            ON c.id = ppc.curso_id
        INNER JOIN situacao s
            ON ppc.situacao_id = s.id
        WHERE s.descricao = "ATIVO"
        GROUP BY d.id
        ORDER BY COUNT(c.id)');
        */
        $this->render('relatorio5', array(
        ));
    }

    public function actionRelatorio5nivel1($id) {
        if($id >= 0) {
            $where = "td.id = $id";
        } else {
            $where = "";
        }
        $command = Yii::app()->db->createCommand()
            ->select('d.nome, COUNT(c.id), d.id')
            ->from('disciplina d')
            ->join('ppc_has_tipo_disciplina_has_disciplina pdd', 'pdd.disciplina_id = d.id')
            ->join('ppc_has_tipo_disciplina ptd', 'ptd.id = pdd.ppc_has_tipo_disciplina_id')
            ->join('ppc p', 'p.id = ptd.ppc_id')
            ->join('curso c', 'c.id = p.curso_id')
            ->join('situacao s', 's.id = p.situacao_id')
            ->join('tipo_disciplina td', 'td.id = ptd.tipo_disciplina_id')
            ->where(array('and', 's.descricao = "ATIVO"', $where))
            ->group('d.id')
            ->order('COUNT(c.id)')
            ->queryAll();
        foreach($command as $row) {
            echo '<a onclick="js:buscaCursos( ' . $row['id'] . ')" id"' . $row['id'] . '">' . $row['nome'] . ' (' . $row['COUNT(c.id)'] . ')</a><br/>';
            echo '<div id="' . $row['id'] . '"></div>';
        }
    }

    public function actionRelatorio5Nivel2($id) {
        /*
         * SELECT c.nome FROM curso c
       INNER JOIN ppc p
             ON p.curso_id = c.id
       INNER JOIN ppc_has_tipo_disciplina ptd
             ON p.id = ptd.ppc_id
       INNER JOIN ppc_has_tipo_disciplina_has_disciplina pdd
             ON pdd.ppc_has_tipo_disciplina_id = ptd.id
       INNER JOIN situacao s
             ON p.situacao_id = s.id
       WHERE s.descricao = "ATIVO" AND pdd.disciplina_id = 97;
         */
        $dataProvider = Yii::app()->db->createCommand()
            ->select('c.nome')
            ->from('curso c')
            ->join('ppc p', 'p.curso_id = c.id')
            ->join('ppc_has_tipo_disciplina ptd', 'ptd.ppc_id = p.id')
            ->join('ppc_has_tipo_disciplina_has_disciplina pdd', 'pdd.ppc_has_tipo_disciplina_id = ptd.id')
            ->join('situacao s', 's.id = p.situacao_id')
            ->where('s.descricao = :desc', array(':desc' => "ATIVO"))
            ->andWhere('pdd.disciplina_id = :id', array(':id' => $id))
            ->queryAll();
        foreach($dataProvider as $curso) {
            echo $curso['nome'];
        }
    }

    public function actionRelatorio6() {
        $this->render('relatorio6');
    }
}
