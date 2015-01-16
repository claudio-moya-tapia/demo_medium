<?php
/* @var $this ClubController */
/* @var $data Club */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('club_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->club_id), array('view', 'id'=>$data->club_id)); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa_estudio_id')); ?>:</b>
	<?php echo CHtml::encode($data->programa_estudio_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>