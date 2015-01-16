<?php
/* @var $this RangoPerdidaController */
/* @var $data RangoPerdida */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_perdida_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->rango_perdida_id), array('view', 'id'=>$data->rango_perdida_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>