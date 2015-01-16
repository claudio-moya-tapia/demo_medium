<?php
/* @var $this TipoEstadoPostgradoController */
/* @var $data TipoEstadoPostgrado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_estado_postgrado_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_estado_postgrado_id), array('view', 'id'=>$data->tipo_estado_postgrado_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>