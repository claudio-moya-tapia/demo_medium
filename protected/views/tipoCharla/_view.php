<?php
/* @var $this TipoCharlaController */
/* @var $data TipoCharla */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_charla_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_charla_id), array('view', 'id'=>$data->tipo_charla_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>