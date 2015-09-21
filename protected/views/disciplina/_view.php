<div class="view">
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->codigo), array('view', 'id' => $data->id)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('carga_horaria_total')); ?>:
	<?php echo GxHtml::encode($data->carga_horaria_total); ?>
	<br />

</div>