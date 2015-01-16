<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Personas' => array('admin'),
    $model->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $model
));
?>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'label' => 'Identidad',
                'value' => $model->identidad->titulo
            ),
            'rut',
            array(
                'label' => 'Sexo',
                'value' => $model->sexo->nombre
            ),
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'fecha_nacimiento',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('usuario/update', 'id' => $model->usuario_id)); ?>
        </div>        
    </div>

</div>