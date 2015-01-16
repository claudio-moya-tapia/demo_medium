<?php
/* @var $this UsuarioPostgradoController */
/* @var $data UsuarioPostgrado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_postgrado_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usuario_postgrado_id), array('view', 'id'=>$data->usuario_postgrado_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_id); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('programa_estudio_id')); ?>:</b>
	<?php echo CHtml::encode($data->programa_estudio_id); ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_estado_postgrado_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_estado_postgrado_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_situacion_postgrado_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_situacion_postgrado_id); ?>
	<br />

	<b><?php /* echo CHtml::encode($data->getAttributeLabel('fecha_matricula')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_matricula); */?>
	<br />
	<b><?php /* echo CHtml::encode($data->getAttributeLabel('fecha_version')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_version); */?>
	<br />

</div>