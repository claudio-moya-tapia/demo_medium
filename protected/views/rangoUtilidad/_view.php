<?php
/* @var $this RangoUtilidadController */
/* @var $data RangoUtilidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_utilidad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rango_utilidad_id), array('view', 'id'=>$data->rango_utilidad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>