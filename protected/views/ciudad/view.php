<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs = array(
    'Ciudades' => array('admin','pais_id'=>$model->pais_id,'region_id'=>$model->region_id),
    $model->nombre,
);
?>

<h1>Detalle Ciudad #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(            
            array(
                'label' => 'Pais',
                'value' => $model->pais->nombre
            ),
            array(
                'label' => 'Region',
                'value' => $model->region->nombre
            ),
            'nombre',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->ciudad_id)); ?>
        </div>        
    </div>
</div>