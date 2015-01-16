<?php
/* @var $this UsuarioInteresController */
/* @var $data UsuarioInteres */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_interes_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_interes_id), array('view', 'id'=>$data->usuario_interes_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa_estudio_id')); ?>:</b>
	<?php echo CHtml::encode($data->programa_estudio_id); ?>
	<br />


</div>