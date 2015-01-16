<?php
/* @var $this AreaExperienciaController */
/* @var $model AreaExperiencia */

$this->breadcrumbs = array(
    'Area Experiencia' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle Area Experiencia #<?php echo $model->titulo; ?></h1>

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
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->area_experiencia_id)); ?>
        </div>        
    </div>
</div>