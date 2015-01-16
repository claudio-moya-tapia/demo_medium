<?php
/* @var $this CharlaController */
/* @var $data Charla */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('charla_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->charla_id), array('view', 'id'=>$data->charla_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_termino')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_termino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>