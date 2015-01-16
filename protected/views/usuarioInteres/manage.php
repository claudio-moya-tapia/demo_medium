<?php
/* @var $this UsuarioInteresController */
/* @var $model UsuarioInteres */
/* @var $form CActiveForm */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $usuario->usuario_id),
    'Persona Idioma' => array('usuarioIdioma/list', 'id' => $usuario->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));
?>


<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-interes-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model, 'usuario_id'); ?>

    <div>
        <?php echo CHtml::checkBoxList('UsuarioInteres[interes]', $listUsuarioIntereses, $listIntereses, array('labelOptions' => array('style' => "display: inline-block"))); ?>            
        <br><br>
    </div>
       
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
    </div>
   
    <?php $this->endWidget(); ?>
    
</div><!-- form -->