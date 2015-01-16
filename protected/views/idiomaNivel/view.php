<?php
/* @var $this IdiomaNivelController */
/* @var $model IdiomaNivel */

$this->breadcrumbs = array(
    'Idioma Nivels' => array('admin'),
    $model->nombre,
);
?>

<h1>Detalle Idioma Nivel #<?php echo $model->nombre; ?></h1>

<div class="form">
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'idioma_nivel_id',
            'nombre',
        ),
    ));
    ?>

    <div class="botones">
        <div class="btn-izq">
        <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->idioma_nivel_id)); ?>
        </div>        
    </div>
</div>