<?php
/* @var $this TipoDocenteController */
/* @var $data TipoDocente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_docente_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_docente_id), array('view', 'id'=>$data->tipo_docente_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>