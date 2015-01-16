<?php
/* @var $this IndustriaController */
/* @var $data Industria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('industria_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->industria_id), array('view', 'id'=>$data->industria_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>