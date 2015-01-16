<?php
/* @var $this EsOptativoController */
/* @var $data EsOptativo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('es_optativo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->es_optativo_id), array('view', 'id'=>$data->es_optativo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />


</div>