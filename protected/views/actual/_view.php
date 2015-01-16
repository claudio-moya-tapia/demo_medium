<?php
/* @var $this ActualController */
/* @var $data Actual */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('actual_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->actual_id), array('view', 'id'=>$data->actual_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>