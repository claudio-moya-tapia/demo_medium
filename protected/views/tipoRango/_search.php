<?php
/* @var $this TipoRangoController */
/* @var $model TipoRango */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tipo_rango_id'); ?>
		<?php echo $form->textField($model,'tipo_rango_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_empleado'); ?>
		<?php echo $form->textField($model,'numero_empleado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'utilidad'); ?>
		<?php echo $form->textField($model,'utilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perdida'); ?>
		<?php echo $form->textField($model,'perdida'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->