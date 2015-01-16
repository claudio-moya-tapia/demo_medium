<?php
/* @var $this EmpresaRangoController */
/* @var $data EmpresaRango */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_rango_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->empresa_rango_id), array('view', 'id'=>$data->empresa_rango_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('empresa_id')); ?>:</b>
	<?php echo CHtml::encode($data->empresa_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_rango_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_rango_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango')); ?>:</b>
	<?php echo CHtml::encode($data->rango); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />


</div>