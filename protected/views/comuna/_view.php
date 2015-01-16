<?php
/* @var $this ComunaController */
/* @var $data Comuna */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('comuna_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->comuna_id), array('view', 'id'=>$data->comuna_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_id')); ?>:</b>
	<?php echo CHtml::encode($data->pais_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:</b>
	<?php echo CHtml::encode($data->region_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>