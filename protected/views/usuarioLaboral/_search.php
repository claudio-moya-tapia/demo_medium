<?php
/* @var $this UsuarioLaboralController */
/* @var $model UsuarioLaboral */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_laboral_id'); ?>
		<?php echo $form->textField($model,'usuario_laboral_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_experiencia_id'); ?>
		<?php echo $form->textField($model,'area_experiencia_id'); ?>
	</div>
    
    	<div class="row">
		<?php echo $form->label($model,'industria_id'); ?>
		<?php echo $form->textField($model,'industria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cargo_id'); ?>
		<?php echo $form->textField($model,'cargol_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ingreso'); ?>
		<?php echo $form->textField($model,'fecha_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_egreso'); ?>
		<?php echo $form->textField($model,'fecha_egreso'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->