<?php
/* @var $this AreaAcademicaController */
/* @var $data AreaAcademica */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_academica_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->area_academica_id), array('view', 'id'=>$data->area_academica_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>