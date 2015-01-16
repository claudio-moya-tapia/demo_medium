<?php
/* @var $this UsuarioCursoController */
/* @var $model UsuarioCurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-curso-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->hiddenField($model, 'fecha_creacion'); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_id'); ?>
                <?php echo CHtml::activeDropDownList($model, 'usuario_id', $ListUsuarios, array('prompt' => '(Seleccione)')); ?>            
		<?php echo $form->error($model,'usuario_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'curso_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'curso_id', $ListCursos, array('prompt' => '(Seleccione)')); ?>            
		<?php echo $form->error($model,'curso_id'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->