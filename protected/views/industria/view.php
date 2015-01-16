<?php
/* @var $this IndustriaController */
/* @var $model Industria */

$this->breadcrumbs = array(
    'Industrias' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle Industria #<?php echo $model->titulo; ?></h1>

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
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->industria_id)); ?>
        </div>        
    </div>
</div>