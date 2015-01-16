<?php
/* @var $this UsuarioIdiomaController */
/* @var $data UsuarioIdioma */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_idioma_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_idioma_id), array('view', 'id'=>$data->usuario_idioma_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idioma_id')); ?>:</b>
	<?php echo CHtml::encode($data->idioma_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idioma_nivel_id')); ?>:</b>
	<?php echo CHtml::encode($data->idioma_nivel_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_cursado')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_cursado); ?>
	<br />


</div>