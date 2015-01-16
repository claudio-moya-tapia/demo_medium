<?php
/* @var $this UsuarioCharlaController */
/* @var $data UsuarioCharla */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_charla_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_charla_id), array('view', 'id'=>$data->usuario_charla_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('charla_id')); ?>:</b>
	<?php echo CHtml::encode($data->charla_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_id')); ?>:</b>
	<?php echo CHtml::encode($data->institucion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facultad_id')); ?>:</b>
	<?php echo CHtml::encode($data->facultad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera_id')); ?>:</b>
	<?php echo CHtml::encode($data->carrera_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('escuela_id')); ?>:</b>
	<?php echo CHtml::encode($data->escuela_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('programa_estudio_id')); ?>:</b>
	<?php echo CHtml::encode($data->programa_estudio_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_charla_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_charla_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asisto')); ?>:</b>
	<?php echo CHtml::encode($data->asisto); ?>
	<br />

	*/ ?>

</div>