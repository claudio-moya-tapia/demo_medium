<?php
/* @var $this UsuarioPregradoController */
/* @var $data UsuarioPregrado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_pregrado_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_pregrado_id), array('view', 'id'=>$data->usuario_pregrado_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_id')); ?>:</b>
	<?php echo CHtml::encode($data->institucion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera_id')); ?>:</b>
	<?php echo CHtml::encode($data->carrera_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_egreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_egreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_titulacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_titulacion); ?>
	<br />

	*/ ?>

</div>