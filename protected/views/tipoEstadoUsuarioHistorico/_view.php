<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $data TipoEstadoUsuarioHistorico */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_estado_usuario_historico_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_estado_usuario_historico_id), array('view', 'id'=>$data->tipo_estado_usuario_historico_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_usuario_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uduario_id')); ?>:</b>
	<?php echo CHtml::encode($data->uduario_id); ?>
	<br />


</div>