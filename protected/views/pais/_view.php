<?php
/* @var $this PaisController */
/* @var $data Pais */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pais_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pais_id), array('view', 'id'=>$data->pais_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>