<?php
/* @var $this UsuarioDocenteController */
/* @var $model UsuarioDocente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-docente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

       
        <?php echo $form->hiddenField($model, 'usuario_id'); ?>
	<?php echo $form->errorSummary($model); ?>
        
	
	<div class="row">
		<?php echo $form->labelEx($model,'tipo_docente_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'tipo_docente_id',$listTipoDocente, array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_docente_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_area_especialidad_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'tipo_area_especialidad_id',$listTipoAreaEspecialidad, array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_area_especialidad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_estado_laboral_docente_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'tipo_estado_laboral_docente_id',$listTipoEstadoLaboralDocente, array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_estado_laboral_docente_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->