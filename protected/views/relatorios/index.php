<?php

$this->breadcrumbs = array(
	"Relatorios"
);
?>
<script type="text/javascript">
function escondeTudo() {
    var i;
    for(i = 1; i <= 6; i++) {
        document.getElementById('descricao' + i).style.display = 'none';
    }
}

function mostraElemento(elem) {
    escondeTudo();
    document.getElementById(elem).style.display = 'block';
}
</script>
<h1><?php echo "Relatórios"; ?></h1>
<div>
    <a onclick="js:mostraElemento('descricao1');">Relatório 1</a>
    <div class="Descricao" id="descricao1" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                Para cada versão de um curso mostrar o número de disciplinas, o total de carga horária, o total de carga horária prática e o total de carga horária teórica. Ordenar por versão.
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>tipo da disciplina</li>
                <li>curso</li>
            </ul>
        </div>
        <div>
            
            <h3>Colunas a retornar:</h3>
            <ul>
                <li>Versão</li>
                <li>tipo da disciplina</li>
                <li>quantidade de disciplinas</li>
                <li>total CH</li>
                <li>total CH prática</li>
                <li>total CH</li>
            </ul>
        </div>
        <a href="<?php echo $this->createUrl('relatorio1'); ?>" class="ver">VER!</a>
    </div>
</div>
<div>
    <a onclick="js:mostraElemento('descricao2');">Relatório 2</a>
    <div class="Descricao" id="descricao2" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                 Para uma versão específica de um curso mostrar para cada período ideal, a quantidade de disciplinas, o total de carga horária, total de carga horária prática e o total de carga horária teórica. Ordenar por período. Ao clicar sobre o período deve aparecer a listagem das disciplinas.
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>versão</li>
                <li>tipo da disciplina</li>
                <li>curso</li>
            </ul>
        </div>
        <div>
            
            <h3>Colunas a retornar:</h3>
            <h4>Nivel 1</h4>
            <ul>
                <li>Período</li>
                <li>Tipo da Disciplina</li>
                <li>Quantidade de Disciplinas</li>
                <li>Total de CH</li>
                <li>Total de CH Prática</li>
                <li>Total de CH Teórica</li>
            </ul>
            <h4>Nivel 2</h4>
            <ul>
                <li>Nome da Disciplina</li>
                <li>Tipo da Disciplina</li>
                <li>Total de CH</li>
                <li>CH Prática</li>
                <li>CH Teórica</li>
            </ul>
       </div>
        <a href="<?php echo $this->createUrl('relatorio2'); ?>" class="ver">VER!</a>
    </div>
</div>
<div>
    <a onclick="js:mostraElemento('descricao3');">Relatório 3</a>
    <div class="Descricao" id="descricao3" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                Duas opções devem ser disponibilizadas.
                <p>
                    1- Para cada versão, exibir as disciplinas que tenham a menor carga horária. Mostrar qual é essa carga horária.
                </p>
                <p>
                    2- Para cada versão, exibir as disciplinas que tenham a maior carga horária. Mostrar qual é essa carga horária.
                </p>
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>Tipo</li>
                <li>Curso</li>
            </ul>
        </div>
        <div>
            <h3>Colunas a retornar:</h3>
            <ul>
                <li>Versão</li>
                <li>Nome da Disciplina</li>
                <li>Carga Horária</li>
            </ul>
       </div>
        <a href="<?php echo $this->createUrl('relatorio3'); ?>" class="ver">VER!</a>
    </div>
</div>
<div>
    <a onclick="js:mostraElemento('descricao4');">Relatório 4</a>
    <div class="Descricao" id="descricao4" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                Para uma disciplina específica, mostrar todos os cursos e versões a que essa disciplina esteja vinculada. Ordenar pelo ano da versão.
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>Nome da Disciplina</li>
            </ul>
        </div>
        <div>
            <h3>Colunas a retornar:</h3>
            <ul>
                <li>Nome do Curso</li>
                <li>Versão</li>
            </ul>
       </div>
        <a href="<?php echo $this->createUrl('relatorio4'); ?>" class="ver">VER!</a>
    </div>
</div>
<div>
    <a onclick="js:mostraElemento('descricao5');">Relatório 5</a>
    <div class="Descricao" id="descricao5" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                Exibir para cada disciplina o número de cursos que oferecem essa disciplina em seus currículos na versão atual. Ordenar por nome da disciplina. Ao clicar sobre a disciplina deve aparecer a listagem dos cursos.
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>Tipo da Disciplina</li>
            </ul>
        </div>
        <div>
            <h3>Colunas a retornar:</h3>
            <h4>Nivel 1</h4>
            <ul>
                <li>Disciplina</li>
                <li>Quantidade de Cursos</li>
            </ul>
            <h4>Nivel 2</h4>
            <ul>
                <li>Nome do Curso</li>
            </ul>
       </div>
        <a href="<?php echo $this->createUrl('relatorio5'); ?>" class="ver">VER!</a>
    </div>
</div>
<div>
    <a onclick="js:mostraElemento('descricao6');">Relatório 6</a>
    <div class="Descricao" id="descricao6" style="display: none">
        <div>
            <p>
                <h3>Descrição: </h3>
                Exibir as disciplinas de uma versão específica de um curso que deixaram de ser ofertadas na versão atual.
            </p>
        </div>
        <div>
            <h3>Filtros:</h3>
            <ul>
                <li>Curso</li>
                <li>Versão do Curso</li>
            </ul>
        </div>
        <div>
            <h3>Colunas a retornar:</h3>
            <ul>
                <li>Disciplina</li>
                <li>Carga Horária</li>
            </ul>
        </div>
        <a href="<?php echo $this->createUrl('relatorio6'); ?>" class="ver">VER!</a>
    </div>
</div>