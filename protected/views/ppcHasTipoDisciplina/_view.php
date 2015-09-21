<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('ppc_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->ppc)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('tipo_disciplina_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->tipoDisciplina)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('carga_horaria_total_tipo_disciplina')); ?>:
	<?php echo GxHtml::encode($data->carga_horaria_total_tipo_disciplina); ?>
	<br />

</div>