<?php
/* @var $this TipoRangoController */
/* @var $model TipoRango */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-rango-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_empleado'); ?>
		<?php echo $form->textField($model,'numero_empleado'); ?>
		<?php echo $form->error($model,'numero_empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'utilidad'); ?>
		<?php echo $form->textField($model,'utilidad'); ?>
		<?php echo $form->error($model,'utilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perdida'); ?>
		<?php echo $form->textField($model,'perdida'); ?>
		<?php echo $form->error($model,'perdida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->