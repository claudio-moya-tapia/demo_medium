<?php
/* @var $this TipoGiroController */
/* @var $data TipoGiro */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_giro_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_giro_id), array('view', 'id'=>$data->tipo_giro_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>