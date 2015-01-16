<?php
/* @var $this UsuarioSocioController */
/* @var $model UsuarioSocio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-socio-form',
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
		<?php echo $form->labelEx($model,'cargo_id'); ?>
		<?php echo $form->textField($model,'cargo_id'); ?>
		<?php echo $form->error($model,'cargo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivel_educacional_id'); ?>
		<?php echo $form->textField($model,'nivel_educacional_id'); ?>
		<?php echo $form->error($model,'nivel_educacional_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentaje_propiedad'); ?>
		<?php echo $form->textField($model,'porcentaje_propiedad'); ?>
		<?php echo $form->error($model,'porcentaje_propiedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
		<?php echo $form->error($model,'empresa_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->