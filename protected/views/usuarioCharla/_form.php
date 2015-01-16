<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-charla-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
		<?php echo $form->error($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'charla_id'); ?>
		<?php echo $form->textField($model,'charla_id'); ?>
		<?php echo $form->error($model,'charla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion_id'); ?>
		<?php echo $form->textField($model,'institucion_id'); ?>
		<?php echo $form->error($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facultad_id'); ?>
		<?php echo $form->textField($model,'facultad_id'); ?>
		<?php echo $form->error($model,'facultad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrera_id'); ?>
		<?php echo $form->textField($model,'carrera_id'); ?>
		<?php echo $form->error($model,'carrera_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'escuela_id'); ?>
		<?php echo $form->textField($model,'escuela_id'); ?>
		<?php echo $form->error($model,'escuela_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'programa_estudio_id'); ?>
		<?php echo $form->textField($model,'programa_estudio_id'); ?>
		<?php echo $form->error($model,'programa_estudio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_charla_id'); ?>
		<?php echo $form->textField($model,'tipo_charla_id'); ?>
		<?php echo $form->error($model,'tipo_charla_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asisto'); ?>
		<?php echo $form->textField($model,'asisto'); ?>
		<?php echo $form->error($model,'asisto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->