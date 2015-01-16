<?php
/* @var $this SexoController */
/* @var $data Sexo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sexo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sexo_id), array('view', 'id'=>$data->sexo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>