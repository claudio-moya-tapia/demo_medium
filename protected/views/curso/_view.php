<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->curso_id), array('view', 'id'=>$data->curso_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_optativo_id')); ?>:</b>
	<?php echo CHtml::encode($data->es_optativo_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_academica_id')); ?>:</b>
	<?php echo CHtml::encode($data->area_academica_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_docente_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_docente_id); ?>
	<br />


</div>