<?php
/* @var $this TipoNivelEducacionalController */
/* @var $data TipoNivelEducacional */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_educacional_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nivel_educacional_id), array('view', 'id'=>$data->nivel_educacional_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>