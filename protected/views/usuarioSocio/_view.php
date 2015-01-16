<?php
/* @var $this UsuarioSocioController */
/* @var $data UsuarioSocio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('socio_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->socio_id), array('view', 'id'=>$data->socio_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cargo_id')); ?>:</b>
	<?php echo CHtml::encode($data->cargo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_educacional_id')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_educacional_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje_propiedad')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje_propiedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_id); ?>
	<br />


</div>