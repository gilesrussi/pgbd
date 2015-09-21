<div class="view">
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->codigo), array('view', 'id' => $data->id)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('nome')); ?>:
	<?php echo GxHtml::encode($data->nome); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('codigo_estruturado')); ?>:
	<?php echo GxHtml::encode($data->codigo_estruturado); ?>
	<br />

</div>