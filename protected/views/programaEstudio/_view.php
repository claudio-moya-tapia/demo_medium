<?php
/* @var $this ProgramaEstudioController */
/* @var $data ProgramaEstudio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa_estudio_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->programa_estudio_id), array('view', 'id'=>$data->programa_estudio_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>