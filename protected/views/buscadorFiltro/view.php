<?php
/* @var $this BuscadorFiltroController */
/* @var $model BuscadorFiltro */

$this->breadcrumbs = array(
    'Buscador Filtros' => array('admin'),
    $model->titulo,
);
?>

<h1>Detalle Buscador Filtro #<?php echo $model->titulo; ?></h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Filtro'), array('buscadorFiltro/view', 'id' => $model->buscador_filtro_id), array('class' => 'tab-select')); ?>
    </li>
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Filtro items'), array('buscadorFiltroItem/manage', 'id' => $model->buscador_filtro_id)); ?>
    </li>
</ul>
<div class="clear"></div>

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
            <?php echo CHtml::link(CHtml::encode('Actualizar'), array('update', 'id' => $model->buscador_filtro_id)); ?>
        </div>        
    </div>
</div>