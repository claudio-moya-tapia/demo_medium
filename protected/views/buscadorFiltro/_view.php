<?php
/* @var $this BuscadorFiltroController */
/* @var $data BuscadorFiltro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('buscador_filtro_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->buscador_filtro_id), array('view', 'id'=>$data->buscador_filtro_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>