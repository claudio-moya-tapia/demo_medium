<?php
/* @var $this TipoInstitucionController */
/* @var $data TipoInstitucion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_institucion_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo_institucion_id), array('view', 'id'=>$data->tipo_institucion_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>