<?php
/* @var $this UsuarioPregradoController */
/* @var $model UsuarioPregrado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_pregrado_id'); ?>
		<?php echo $form->textField($model,'usuario_pregrado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institucion_id'); ?>
		<?php echo $form->textField($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrera_id'); ?>
		<?php echo $form->textField($model,'carrera_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_egreso'); ?>
		<?php echo $form->textField($model,'fecha_egreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_titulacion'); ?>
		<?php echo $form->textField($model,'fecha_titulacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->