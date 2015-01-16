<?php
/* @var $this TipoFuenteIngresoController */
/* @var $data TipoFuenteIngreso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_fuente_ingreso_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_fuente_ingreso_id), array('view', 'id'=>$data->tipo_fuente_ingreso_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>