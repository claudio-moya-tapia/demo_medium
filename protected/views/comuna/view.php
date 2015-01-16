<?php
/* @var $this ComunaController */
/* @var $model Comuna */

$this->breadcrumbs = array(
    'Comunas' => array('admin', 'pais_id' => $model->pais_id, 'region_id' => $model->region_id, 'ciudad_id' => $model->ciudad_id),
    $model->nombre,
);
?>

<h1>Detalle Comuna #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'nombre',
            array(
                'label' => 'Pais',
                'value' => $model->pais->nombre
            ),
            array(
                'label' => 'Region',
                'value' => $model->region->nombre
            ),
            array(
                'label' => 'Ciudad',
                'value' => $model->ciudad->nombre
            ),
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->comuna_id)); ?>
        </div>        
    </div>
</div>