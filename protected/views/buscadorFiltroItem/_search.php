<?php
/* @var $this BuscadorFiltroItemController */
/* @var $model BuscadorFiltroItem */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'buscador_filtro_item_id'); ?>
		<?php echo $form->textField($model,'buscador_filtro_item_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'buscador_filtro_id'); ?>
		<?php echo $form->textField($model,'buscador_filtro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tabla'); ?>
		<?php echo $form->textField($model,'tabla',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tabla_id'); ?>
		<?php echo $form->textField($model,'tabla_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->