<?php
/* @var $this RangoEmpleadoController */
/* @var $data RangoEmpleado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_empleado_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rango_empleado_id), array('view', 'id'=>$data->rango_empleado_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>