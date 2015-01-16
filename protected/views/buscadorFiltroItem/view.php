<?php
/* @var $this BuscadorFiltroItemController */
/* @var $model BuscadorFiltroItem */

$this->breadcrumbs=array(
	'Buscador Filtro Items'=>array('index'),
	$model->buscador_filtro_item_id,
);

$this->menu=array(
	array('label'=>'List BuscadorFiltroItem', 'url'=>array('index')),
	array('label'=>'Create BuscadorFiltroItem', 'url'=>array('create')),
	array('label'=>'Update BuscadorFiltroItem', 'url'=>array('update', 'id'=>$model->buscador_filtro_item_id)),
	array('label'=>'Delete BuscadorFiltroItem', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->buscador_filtro_item_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BuscadorFiltroItem', 'url'=>array('admin')),
);
?>

<h1>View BuscadorFiltroItem #<?php echo $model->buscador_filtro_item_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'buscador_filtro_item_id',
		'buscador_filtro_id',
		'tabla',
		'tabla_id',
	),
)); ?>
