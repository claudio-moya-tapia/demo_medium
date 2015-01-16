<?php
/* @var $this InteresController */
/* @var $data Interes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('interes_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->interes_id), array('view', 'id'=>$data->interes_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>