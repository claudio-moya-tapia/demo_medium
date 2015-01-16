<?php
/* @var $this TipoRangoController */
/* @var $data TipoRango */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_rango_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_rango_id), array('view', 'id'=>$data->tipo_rango_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_empleado')); ?>:</b>
	<?php echo CHtml::encode($data->numero_empleado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('utilidad')); ?>:</b>
	<?php echo CHtml::encode($data->utilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perdida')); ?>:</b>
	<?php echo CHtml::encode($data->perdida); ?>
	<br />


</div>