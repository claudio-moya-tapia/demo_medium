<?php
/* @var $this UsuarioNaturalController */
/* @var $model UsuarioNatural */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-natural-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->hiddenField($model, 'usuario_id'); ?>

        <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'estado_civil_id'); ?>		            
        <?php echo CHtml::activeDropDownList($model, 'estado_civil_id', $listEstadoCivil, array('prompt' => '(Seleccione)')); ?>            
        <?php echo $form->error($model, 'estado_civil_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'pais_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'pais_id', $listPais, array('prompt' => '(Seleccione)')); ?>   
        <?php echo $form->error($model, 'pais_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'region_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'region_id', $listRegion, array('prompt' => '(Seleccione)')); ?>   
        <?php echo $form->error($model, 'region_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'ciudad_id'); ?>		
        <?php echo CHtml::activeDropDownList($model, 'ciudad_id', $listCiudad, array('prompt' => '(Seleccione)')); ?>   
        <?php echo $form->error($model, 'ciudad_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comuna_id'); ?>
        <?php echo CHtml::activeDropDownList($model, 'comuna_id', $listComuna, array('prompt' => '(Seleccione)')); ?>   
        <?php echo $form->error($model, 'comuna_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'direccion'); ?>
        <?php echo $form->textField($model, 'direccion'); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'telefono_fijo'); ?>
        <?php echo CHtml::activeDropDownList($model, 'telefono_fijo_codigo', $aryTelefonoCodigo,array('class'=>'miniselect')); ?>   
        
        <?php echo $form->textField($model, 'telefono_fijo', array('size' => 50, 'maxlength' => 50, 'class'=>'miniInputText')); ?>
        <div class="textEj"> Ej.: 2-23102128 (Cod. Area+Nro. Teléfono)</div>
        <?php echo $form->error($model, 'telefono_fijo'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'telefono_celular'); ?>
        <?php echo CHtml::activeDropDownList($model, 'telefono_celular_codigo', $aryCelularCodigo,array('class'=>'miniselect')); ?>   
        
        <?php echo $form->textField($model, 'telefono_celular', array('size' => 50, 'maxlength' => 50, 'class'=>'miniInputText')); ?>
        <div class="textEj">  Ej.: 6-8762131</div>
        <?php echo $form->error($model, 'telefono_celular'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50)); ?>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    
    <div class="row">
        <?php echo $form->labelEx($model, 'imagen'); ?>
        <?php echo $form->hiddenField($model, 'imagen', array('size' => 60, 'maxlength' => 255)); ?>

        <br />
        <div id="queue"></div>
        <input id="DocumentoUpload" name="DocumentoUpload" type="file" />

        
    </div>
    
    <div class="row">
        <div class="documentoImagen">
            <?php echo CHtml::image(Yii::app()->baseUrl.'/images/empty.gif','imagen',array('id'=>'UsuarioNatural_img','style'=>'width:auto;max-height:100px'));  ?>            
        </div>
    </div>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->