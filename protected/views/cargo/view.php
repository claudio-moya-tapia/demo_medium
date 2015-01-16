<?php
/* @var $this TipoCargoController */
/* @var $model TipoCargo */

$this->breadcrumbs = array(
    'Tipo Cargo' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle Tipo Cargo #<?php echo $model->titulo; ?></h1>

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
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->tipo_cargo_id)); ?>
        </div>        
    </div>

</div>