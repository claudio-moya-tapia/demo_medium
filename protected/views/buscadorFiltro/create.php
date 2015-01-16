<?php
/* @var $this BuscadorFiltroController */
/* @var $model BuscadorFiltro */

$this->breadcrumbs=array(
	'Buscador Filtros'=>array('admin'),
	'Crear',
);
?>

<h1>Crear Buscador Filtro</h1>

<ul class="tabs">
    <li class="tab">        
        <?php echo CHtml::link(CHtml::encode('Filtro'), array('buscadorFiltro/view', 'id' => $model->buscador_filtro_id), array('class' => 'tab-select')); ?>
    </li>
</ul>
<div class="clear"></div>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>