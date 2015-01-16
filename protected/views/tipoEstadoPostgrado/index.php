<?php
/* @var $this TipoEstadoPostgradoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Estado Postgrados',
);

$this->menu=array(
	array('label'=>'Create TipoEstadoPostgrado', 'url'=>array('create')),
	array('label'=>'Manage TipoEstadoPostgrado', 'url'=>array('admin')),
);
?>

<h1>Tipo Estado Postgrados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
