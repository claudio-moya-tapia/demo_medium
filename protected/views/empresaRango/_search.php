<?php
/* @var $this EmpresaRangoController */
/* @var $model EmpresaRango */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'empresa_rango_id'); ?>
		<?php echo $form->textField($model,'empresa_rango_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_rango_id'); ?>
		<?php echo $form->textField($model,'tipo_rango_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango'); ?>
		<?php echo $form->textField($model,'rango',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orden'); ?>
		<?php echo $form->textField($model,'orden'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->