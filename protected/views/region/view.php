<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs = array(
    'Regiones' => array('admin','id'=>$model->pais_id),
    $model->nombre,
);
?>

<h1>Detalle Región #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(            
            array(
                'label' => 'Pais',
                'value' => $model->pais->nombre,
            ),
            'nombre',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->region_id)); ?>
        </div>        
    </div>

</div>