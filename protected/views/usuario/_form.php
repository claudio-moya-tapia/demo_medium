<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    
        <?php echo $form->hiddenField($model,'fecha_creacion'); ?>
	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
		<?php echo $form->labelEx($model,'identidad_id'); ?>
                <?php echo $form->radioButtonList($model,'identidad_id',array('1' => 'Nacional', '2' => 'Extranjera'), array('class'=>'inputRadio','separator' => ' ', 'labelOptions' => array('style' => 'display:inline', 'class'=>'labelRadio'))); ?> 
		<?php echo $form->error($model,'identidad_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->label($model,'sexo_id'); ?>
		<?php echo $form->radioButtonList($model, 'sexo_id', array('1' => 'Masculino', '2' => 'Femenino'), array('class'=>'inputRadio','separator' => ' ', 'labelOptions' => array('style' => 'display:inline', 'class'=>'labelRadio'))); ?> 
		<?php echo $form->error($model,'sexo_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_paterno'); ?>
		<?php echo $form->textField($model,'apellido_paterno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'apellido_paterno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_materno'); ?>
		<?php echo $form->textField($model,'apellido_materno',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'apellido_materno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_nacimiento'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_nacimiento',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_nacimiento'); ?>
	</div>
        
        <div class="row">                        
            <?php echo $form->labelEx($model,'tipo_fuente_ingreso_id'); ?>
            <?php echo CHtml::activeDropDownList($model, 'tipo_fuente_ingreso_id', $listTipoFuenteIngreso, array('prompt' => '(Seleccione)')); ?>
            <?php echo $form->error($model,'tipo_fuente_ingreso'); ?>
        </div>
        <div class="row buttons">
            <input type="button" id="btnSubmit" name="btnName" class="btnclass" value="Guardar" />
        </div>
	<div class="hidden">                
		<?php CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->