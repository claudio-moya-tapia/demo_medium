<?php
/* @var $this TipoFuenteIngresoController */
/* @var $model TipoFuenteIngreso */

$this->breadcrumbs = array(
    'Tipo Fuente Ingresos' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle TipoFuenteIngreso #<?php echo $model->titulo; ?></h1>

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
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->tipo_fuente_ingreso_id)); ?>
        </div>        
    </div>

</div>