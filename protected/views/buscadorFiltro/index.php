<?php
/* @var $this BuscadorFiltroController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Buscador Filtros',
);

$this->menu=array(
	array('label'=>'Create BuscadorFiltro', 'url'=>array('create')),
	array('label'=>'Manage BuscadorFiltro', 'url'=>array('admin')),
);
?>

<h1>Buscador Filtros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
