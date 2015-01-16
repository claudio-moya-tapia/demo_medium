<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_charla_id'); ?>
		<?php echo $form->textField($model,'usuario_charla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'charla_id'); ?>
		<?php echo $form->textField($model,'charla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institucion_id'); ?>
		<?php echo $form->textField($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facultad_id'); ?>
		<?php echo $form->textField($model,'facultad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrera_id'); ?>
		<?php echo $form->textField($model,'carrera_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'escuela_id'); ?>
		<?php echo $form->textField($model,'escuela_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programa_estudio_id'); ?>
		<?php echo $form->textField($model,'programa_estudio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_charla_id'); ?>
		<?php echo $form->textField($model,'tipo_charla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asisto'); ?>
		<?php echo $form->textField($model,'asisto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->