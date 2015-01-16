<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $data TipoAreaEspecialidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_area_especialida_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_area_especialidad_id), array('view', 'id'=>$data->tipo_area_especialidad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>