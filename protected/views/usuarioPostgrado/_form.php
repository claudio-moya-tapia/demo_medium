<?php
/* @var $this UsuarioPostgradoController */
/* @var $model UsuarioPostgrado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-postgrado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->hiddenField($model,'usuario_id'); ?>

        <div class="row">
		<?php echo $form->labelEx($model,'programa_estudio_id'); ?>      
                <?php echo CHtml::activeDropDownList($model,'programa_estudio_id',$listProgramaEstudio,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'programa_estudio_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_estado_postgrado_id'); ?>      
                <?php echo CHtml::activeDropDownList($model,'tipo_estado_postgrado_id',$listEstados,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_estado_postgrado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_situacion_postgrado_id'); ?>
		 <?php echo CHtml::activeDropDownList($model,'tipo_situacion_postgrado_id',$listSituaciones,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_situacion_postgrado_id'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'fecha_matricula'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_matricula',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_matricula'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'fecha_version'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_version',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_version'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->