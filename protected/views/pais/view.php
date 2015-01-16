<?php
/* @var $this PaisController */
/* @var $model Pais */

$this->breadcrumbs = array(
    'Paises' => array('admin'),
    $model->nombre,
);
?>

<h1>Detalle Pais #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(            
            'nombre',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->pais_id)); ?>
        </div>        
    </div>

</div>
