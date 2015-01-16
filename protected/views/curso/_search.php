<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'curso_id'); ?>
		<?php echo $form->textField($model,'curso_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'es_optativo_id'); ?>
		<?php echo $form->textField($model,'es_optativo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_academica_id'); ?>
		<?php echo $form->textField($model,'area_academica_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_docente_id'); ?>
		<?php echo $form->textField($model,'usuario_docente_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->