<?php
/* @var $this UsuarioLaboralController */
/* @var $data UsuarioLaboral */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_laboral_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_laboral_id), array('view', 'id'=>$data->usuario_laboral_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_id); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('industria_id')); ?>:</b>
	<?php echo CHtml::encode($data->industria_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_experiencia_id')); ?>:</b>
	<?php echo CHtml::encode($data->area_experiencia_id); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('cargo_id')); ?>:</b>
	<?php echo CHtml::encode($data->cargo_id); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ingreso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_egreso')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_egreso); ?>
	<br />

</div>