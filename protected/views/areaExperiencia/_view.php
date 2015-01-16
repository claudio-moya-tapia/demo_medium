<?php
/* @var $this AreaExperienciaController */
/* @var $model AreaExperiencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_experiencia_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->area_experiencia_id), array('view', 'id'=>$data->area_experiencia_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>