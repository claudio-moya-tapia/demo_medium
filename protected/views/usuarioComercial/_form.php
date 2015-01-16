<?php
/* @var $this UsuarioLaboralController */
/* @var $model UsuarioLaboral */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-laboral-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->hiddenField($model,'usuario_id'); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'actual_id'); ?>
                <?php echo $form->radioButtonList($model,'actual_id',array('1' => 'Trabajo Actual', '2' => 'Trabajo Anterior'), array('class'=>'inputRadio','separator' => ' ', 'labelOptions' => array('style' => 'display:inline', 'class'=>'labelRadio'))); ?> 
		<?php echo $form->error($model,'actual_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'empresa_id'); ?>
                <?php echo CHtml::activeDropDownList($model, 'empresa_id', $listEmpresa, array('prompt' => '(Seleccione)')); ?>		
		<?php echo $form->error($model,'empresa_id'); ?>
	</div>
        
        
	<div class="row">
		<?php echo $form->labelEx($model,'industria_id'); ?>
                <?php echo CHtml::activeDropDownList($model, 'industria_id', $listIndustria, array('prompt' => '(Seleccione)')); ?>		
		<?php echo $form->error($model,'industria_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_experiencia_id'); ?>
                <?php echo CHtml::activeDropDownList($model, 'area_experiencia_id', $listAreaExperiencia, array('prompt' => '(Seleccione)')); ?>				
		<?php echo $form->error($model,'area_experiencia_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cargo_id'); ?>
		<?php echo CHtml::activeDropDownList($model, 'cargo_id', $listCargo, array('prompt' => '(Seleccione)')); ?>				
		<?php echo $form->error($model,'cargo_id'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email', array('size' => 50, 'maxlength' => 50)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'fecha_ingreso'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_ingreso',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_ingreso'); ?>
	</div>


    <div class="row">
		<?php echo $form->labelEx($model,'fecha_egreso'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_egreso',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_egreso'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->