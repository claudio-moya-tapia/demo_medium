<?php
/* @var $this BuscadorFiltroItemController */
/* @var $data BuscadorFiltroItem */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('buscador_filtro_item_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->buscador_filtro_item_id), array('view', 'id'=>$data->buscador_filtro_item_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('buscador_filtro_id')); ?>:</b>
	<?php echo CHtml::encode($data->buscador_filtro_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tabla')); ?>:</b>
	<?php echo CHtml::encode($data->tabla); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tabla_id')); ?>:</b>
	<?php echo CHtml::encode($data->tabla_id); ?>
	<br />


</div>