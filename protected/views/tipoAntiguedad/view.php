<?php
/* @var $this TipoAntiguedadController */
/* @var $model TipoAntiguedad */

$this->breadcrumbs = array(
    'Antiguedad' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle Antiguedad #<?php echo $model->titulo; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'titulo',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
        <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->tipo_antiguedad_id)); ?>
        </div>        
    </div>
</div>