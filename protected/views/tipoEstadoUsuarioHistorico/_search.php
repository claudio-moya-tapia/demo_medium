<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $model TipoEstadoUsuarioHistorico */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'tipo_estado_usuario_historico_id'); ?>
		<?php echo $form->textField($model,'tipo_estado_usuario_historico_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_usuario_id'); ?>
		<?php echo $form->textField($model,'tipo_usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uduario_id'); ?>
		<?php echo $form->textField($model,'uduario_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->