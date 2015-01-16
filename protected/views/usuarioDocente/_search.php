<?php
/* @var $this UsuarioDocenteController */
/* @var $model UsuarioDocente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_docente_id'); ?>
		<?php echo $form->textField($model,'usuario_docente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_docente_id'); ?>
		<?php echo $form->textField($model,'tipo_docente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_area_especialidad_id'); ?>
		<?php echo $form->textField($model,'tipo_area_especialidad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_estado_laboral_docente_id'); ?>
		<?php echo $form->textField($model,'tipo_estado_laboral_docente_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->