<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ppc_has_tipo_disciplina_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->ppcHasTipoDisciplina)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('disciplina_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->disciplina)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('periodo_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->periodo)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('situacao_curriculo_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->situacaoCurriculo)); ?>
	<br />

</div>