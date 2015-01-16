<?php
/* @var $this UsuarioIdiomaController */
/* @var $model UsuarioIdioma */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-idioma-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'usuario_id'); ?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'idioma_id'); ?>
		 <?php echo CHtml::activeDropDownList($model,'idioma_id',$ListIdiomas, array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'idioma_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idioma_nivel_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'idioma_nivel_id',$ListNiveles, array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'idioma_nivel_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->