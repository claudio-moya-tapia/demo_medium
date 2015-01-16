<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'empresa_id'); ?>
		<?php echo $form->textField($model,'empresa_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pais_id'); ?>
		<?php echo $form->textField($model,'pais_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'region_id'); ?>
		<?php echo $form->textField($model,'region_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ciudad_id'); ?>
		<?php echo $form->textField($model,'ciudad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comuna_id'); ?>
		<?php echo $form->textField($model,'comuna_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_sociedad_id'); ?>
		<?php echo $form->textField($model,'tipo_sociedad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo_postal'); ?>
		<?php echo $form->textField($model,'codigo_postal',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'giro_id'); ?>
		<?php echo $form->textField($model,'giro_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_antiguedad_id'); ?>
		<?php echo $form->textField($model,'tipo_antiguedad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_empleado_id'); ?>
		<?php echo $form->textField($model,'rango_empleado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_utilidad_id'); ?>
		<?php echo $form->textField($model,'rango_utilidad_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_perdida_id'); ?>
		<?php echo $form->textField($model,'rango_perdida_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rango_facturacion_id'); ?>
		<?php echo $form->textField($model,'rango_facturacion_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_fijo'); ?>
		<?php echo $form->textField($model,'telefono_fijo',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_celular'); ?>
		<?php echo $form->textField($model,'telefono_celular',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'telefono_fax'); ?>
		<?php echo $form->textField($model,'telefono_fax',array('size'=>45,'maxlength'=>45)); ?>
	</div>
        <div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->