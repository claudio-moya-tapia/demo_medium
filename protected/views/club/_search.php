<?php
/* @var $this ClubController */
/* @var $model Club */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'club_id'); ?>
		<?php echo $form->textField($model,'club_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'institucion_id'); ?>
		<?php echo $form->textField($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facultad_id'); ?>
		<?php echo $form->textField($model,'facultad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'carrera_id'); ?>
		<?php echo $form->textField($model,'carrera_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'escuela_id'); ?>
		<?php echo $form->textField($model,'escuela_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programa_estudio_id'); ?>
		<?php echo $form->textField($model,'programa_estudio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->