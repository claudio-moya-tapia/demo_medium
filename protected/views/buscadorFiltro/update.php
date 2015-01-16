<?php
/* @var $this BuscadorFiltroController */
/* @var $model BuscadorFiltro */

$this->breadcrumbs=array(
	'Buscador Filtros'=>array('admin'),
	$model->titulo=>array('view','id'=>$model->buscador_filtro_id),
	'Actualizar',
);
?>

<h1>Actualizar Buscador Filtro #<?php echo $model->titulo; ?></h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Filtro'), array('buscadorFiltro/view', 'id' => $model->buscador_filtro_id), array('class' => 'tab-select')); ?>
    </li>
    <li class="tab">
        <?php echo CHtml::link(CHtml::encode('Filtro items'), array('buscadorFiltroItem/manage', 'id' => $model->buscador_filtro_id)); ?>
    </li>
</ul>
<div class="clear"></div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>