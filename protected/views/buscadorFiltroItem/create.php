<?php
/* @var $this BuscadorFiltroItemController */
/* @var $model BuscadorFiltroItem */

$this->breadcrumbs=array(
	'Buscador Filtro Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BuscadorFiltroItem', 'url'=>array('index')),
	array('label'=>'Manage BuscadorFiltroItem', 'url'=>array('admin')),
);
?>

<h1>Create BuscadorFiltroItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>