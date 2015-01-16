<?php
/* @var $this UsuarioPostgradoController */
/* @var $model UsuarioPostgrado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usuario_postgrado_id'); ?>
		<?php echo $form->textField($model,'usuario_postgrado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_id'); ?>
		<?php echo $form->textField($model,'usuario_id'); ?>
	</div>

    	<div class="row">
		<?php echo $form->label($model,'programa_estudio_id'); ?>
		<?php echo $form->textField($model,'programa_estudio_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'tipo_estado_postgrado_id'); ?>
		<?php echo $form->textField($model,'tipo_estado_postgrado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_situacion_postgrado_id'); ?>
		<?php echo $form->textField($model,'tipo_situacion_postgrado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_matricula'); ?>
		<?php echo $form->textField($model,'fecha_matricula'); ?>
	</div>

    	<div class="row">
		<?php echo $form->label($model,'fecha_version'); ?>
		<?php echo $form->textField($model,'fecha_version'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->