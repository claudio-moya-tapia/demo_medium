<?php
/* @var $this UsuarioLaboralController */
/* @var $model UsuarioLaboral */
/* @var $usuario Usuario */

$this->breadcrumbs = array(
    'Personas' => array('usuario/admin'),
    'Persona' => array('usuario/view', 'id' => $model->usuario_id),
    'Usuario Laboral' => array('list', 'id' => $model->usuario_id),
    $usuario->rut,
);

$this->renderPartial('//usuario/_tabs', array(
    'model' => $usuario
));
?>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array(
                'label' => 'Usuario',
                'value' => $model->usuario->nombre . ' ' . $model->usuario->apellido_paterno
            ),
            array(
                'label' => 'Empresa',
                'value' => $model->empresa->nombre
            ),
            array(
                'label' => 'Área experiencia',
                'value' => $model->area_experiencia->titulo
            ),
            array(
                'label' => 'Cargo',
                'value' => $model->cargo->titulo
            ),
            array(
                'label' => 'Fecha Ingreso',
                'value' => $this->stringFormat->applyFecha($model->fecha_ingreso)
            ),
            array(
                'label' => 'Fecha Egreso',
                'value' => $this->stringFormat->applyFecha($model->fecha_egreso)
            ),
        ),
    ));
    ?>
    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id'=>$model->usuario_laboral_id)); ?>
        </div>        
    </div>

</div>

