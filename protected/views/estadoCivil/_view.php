<?php
/* @var $this EstadoCivilController */
/* @var $data EstadoCivil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_civil_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->estado_civil_id), array('view', 'id'=>$data->estado_civil_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>