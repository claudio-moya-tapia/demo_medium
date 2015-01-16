<?php
/* @var $this UsuarioCursoController */
/* @var $data UsuarioCurso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_cuso_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_cuso_id), array('view', 'id'=>$data->usuario_cuso_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_id')); ?>:</b>
	<?php echo CHtml::encode($data->curso_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />


</div>