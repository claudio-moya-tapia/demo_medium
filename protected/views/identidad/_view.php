<?php
/* @var $this IdentidadController */
/* @var $data Identidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('identidad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->identidad_id), array('view', 'id'=>$data->identidad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>