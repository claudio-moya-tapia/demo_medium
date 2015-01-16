<?php
/* @var $this PerfilController */
/* @var $data Perfil */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfil_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->perfil_id), array('view', 'id'=>$data->perfil_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />


</div>