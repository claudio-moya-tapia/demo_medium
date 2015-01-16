<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pais_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'pais_id',$listPais,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'pais_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'region_id',$listRegion,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ciudad_id'); ?>		
                <?php echo CHtml::activeDropDownList($model,'ciudad_id',$listCiudad,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'ciudad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comuna_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'comuna_id',$listComuna,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'comuna_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_sociedad_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'tipo_sociedad_id',$listTipoSociedad,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_sociedad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'razon_social'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_postal'); ?>
		<?php echo $form->textField($model,'codigo_postal',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'codigo_postal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_giro_id'); ?>
		<?php echo CHtml::activeDropDownList($model,'tipo_giro_id',$listGiro,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_giro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_antiguedad'); ?>
		<?php echo CHtml::activeDropDownList($model,'tipo_antiguedad_id',$listTipoAntiguedad,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'tipo_antiguedad'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'rango_empleado'); ?>
		<?php echo CHtml::activeDropDownList($model,'rango_empleado_id',$listRangoEmpleado,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'rango_empleado'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'rango_utilidad'); ?>
		<?php echo CHtml::activeDropDownList($model,'rango_utilidad_id',$listRangoUtilidad,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'rango_utilidad'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'rango_perdida'); ?>
		<?php echo CHtml::activeDropDownList($model,'rango_perdida_id',$listRangoPerdida,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'rango_perdida'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'rango_facturacion'); ?>
		<?php echo CHtml::activeDropDownList($model,'rango_facturacion_id',$listRangoFacturacion,array('prompt'=>'(Seleccione)')); ?>   
		<?php echo $form->error($model,'rango_facturacion'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'telefono_fijo'); ?>
		<?php echo $form->textField($model,'telefono_fijo',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono_fijo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_celular'); ?>
		<?php echo $form->textField($model,'telefono_celular',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono_celular'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_fax'); ?>
		<?php echo $form->textField($model,'telefono_fax',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'telefono_fax'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->