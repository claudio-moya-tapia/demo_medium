<?php
/* @var $this UsuarioSocioController */
/* @var $model UsuarioSocio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'socio_id'); ?>
		<?php echo $form->textField($model,'socio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargo_id'); ?>
		<?php echo $form->textField($model,'cargo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nivel_educacional_id'); ?>
		<?php echo $form->textField($model,'nivel_educacional_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentaje_propiedad'); ?>
		<?php echo $form->textField($model,'porcentaje_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->