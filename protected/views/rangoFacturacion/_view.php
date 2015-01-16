<?php
/* @var $this RangoFacturacionController */
/* @var $data RangoFacturacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_facturacion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rango_facturacion_id), array('view', 'id'=>$data->rango_facturacion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>