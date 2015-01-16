<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ciudad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pais_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'pais_id',$listPais); ?>   
		<?php echo $form->error($model,'pais_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
	        <?php echo CHtml::activeDropDownList($model,'region_id',$listRegion); ?>   
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array()); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->