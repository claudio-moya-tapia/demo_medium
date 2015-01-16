<?php
/* @var $this TipoSociedadController */
/* @var $data TipoSociedad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sociedad_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_sociedad_id), array('view', 'id'=>$data->tipo_sociedad_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>