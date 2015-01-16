<?php
/* @var $this IdiomaNivelController */
/* @var $data IdiomaNivel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idioma_nivel_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idioma_nivel_id), array('view', 'id'=>$data->idioma_nivel_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>