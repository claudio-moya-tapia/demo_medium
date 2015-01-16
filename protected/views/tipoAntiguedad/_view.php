<?php
/* @var $this TipoAntiguedadController */
/* @var $data TipoAntiguedad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_antiguedad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_antiguedad_id), array('view', 'id'=>$data->tipo_antiguedad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>