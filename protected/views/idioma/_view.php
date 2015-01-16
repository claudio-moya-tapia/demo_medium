<?php
/* @var $this IdiomaController */
/* @var $data Idioma */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idioma_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idioma_id), array('view', 'id'=>$data->idioma_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>