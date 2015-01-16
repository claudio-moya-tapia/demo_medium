<?php
/* @var $this BuscadorFiltroItemController */
/* @var $model BuscadorFiltroItem */

$this->breadcrumbs=array(
	'Buscador Filtro Items'=>array('index'),
	$model->buscador_filtro_item_id=>array('view','id'=>$model->buscador_filtro_item_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BuscadorFiltroItem', 'url'=>array('index')),
	array('label'=>'Create BuscadorFiltroItem', 'url'=>array('create')),
	array('label'=>'View BuscadorFiltroItem', 'url'=>array('view', 'id'=>$model->buscador_filtro_item_id)),
	array('label'=>'Manage BuscadorFiltroItem', 'url'=>array('admin')),
);
?>

<h1>Update BuscadorFiltroItem <?php echo $model->buscador_filtro_item_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>