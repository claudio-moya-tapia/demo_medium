<?php
/* @var $this CarreraController */
/* @var $data Carrera */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->carrera_id), array('view', 'id'=>$data->carrera_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('carrera_vertical_id')); ?>:</b>
	<?php echo CHtml::encode($data->carrera_id_json); ?>
	<br />


</div>