<?php
/* @var $this BuscadorFiltroItemController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Buscador Filtro Items',
);

$this->menu=array(
	array('label'=>'Create BuscadorFiltroItem', 'url'=>array('create')),
	array('label'=>'Manage BuscadorFiltroItem', 'url'=>array('admin')),
);
?>

<h1>Buscador Filtro Items</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
