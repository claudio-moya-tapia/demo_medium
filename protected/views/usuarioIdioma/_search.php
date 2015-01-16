<?php
/* @var $this UsuarioIdiomaController */
/* @var $model UsuarioIdioma */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_idioma_id'); ?>
		<?php echo $form->textField($model,'usuario_idioma_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idioma_id'); ?>
		<?php echo $form->textField($model,'idioma_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idioma_nivel_id'); ?>
		<?php echo $form->textField($model,'idioma_nivel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_cursado'); ?>
		<?php echo $form->textField($model,'fecha_cursado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->