<?php
/* @var $this InstitucionController */
/* @var $data Institucion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->institucion_id), array('view', 'id'=>$data->institucion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_institucion_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_institucion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_vertical_id')); ?>:</b>
	<?php echo CHtml::encode($data->institucion_vertical_id); ?>
	<br />


</div>