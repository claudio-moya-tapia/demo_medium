<?php
/* @var $this TipoCargoController */
/* @var $data TipoCargo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_cargo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_cargo_id), array('view', 'id'=>$data->tipo_cargo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>