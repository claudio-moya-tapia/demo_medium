<?php
/* @var $this UsuarioPregradoController */
/* @var $model UsuarioPregrado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-pregrado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son requeridos.</p>
         
         <?php echo $form->hiddenField($model,'usuario_id'); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'institucion_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'institucion_id',$listInstitucion,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'carrera_id'); ?>
                <?php echo CHtml::activeDropDownList($model,'carrera_id',$listCarreras,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'carrera_id'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_titulacion'); ?>
		<?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'fecha_titulacion',
                    'options' => array(                        
                        'dateFormat'=>'dd-mm-yy',
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                    ),
                ));
                ?>
		<?php echo $form->error($model,'fecha_titulacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->