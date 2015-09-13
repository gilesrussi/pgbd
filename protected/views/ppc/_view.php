<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('curso_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->curso)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('situacao_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->situacao)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('numero')); ?>:
	<?php echo GxHtml::encode($data->numero); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('carga_horaria_total_curso')); ?>:
	<?php echo GxHtml::encode($data->carga_horaria_total_curso); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('credito_total')); ?>:
	<?php echo GxHtml::encode($data->credito_total); ?>
	<br />

</div>