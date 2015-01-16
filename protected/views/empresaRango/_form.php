<?php
/* @var $this EmpresaRangoController */
/* @var $model EmpresaRango */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-rango-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
		<?php echo $form->error($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_rango_id'); ?>
		<?php echo $form->textField($model,'tipo_rango_id'); ?>
		<?php echo $form->error($model,'tipo_rango_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rango'); ?>
		<?php echo $form->textField($model,'rango',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rango'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->