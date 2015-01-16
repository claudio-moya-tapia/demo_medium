<?php
/* @var $this TipoSituacionPostgradoController */
/* @var $data TipoSituacionPostgrado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_situacion_postgrado_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_situacion_postgrado_id), array('view', 'id'=>$data->tipo_situacion_postgrado_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>