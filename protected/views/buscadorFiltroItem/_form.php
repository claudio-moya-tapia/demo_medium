<?php
/* @var $this BuscadorFiltroItemController */
/* @var $model BuscadorFiltroItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buscador-filtro-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'buscador_filtro_id'); ?>
		<?php echo $form->textField($model,'buscador_filtro_id'); ?>
		<?php echo $form->error($model,'buscador_filtro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tabla'); ?>
		<?php echo $form->textField($model,'tabla',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tabla'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tabla_id'); ?>
		<?php echo $form->textField($model,'tabla_id'); ?>
		<?php echo $form->error($model,'tabla_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->