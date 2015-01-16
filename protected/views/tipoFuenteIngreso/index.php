<?php
/* @var $this TipoFuenteIngresoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Fuente Ingresos',
);

$this->menu=array(
	array('label'=>'Create TipoFuenteIngreso', 'url'=>array('create')),
	array('label'=>'Manage TipoFuenteIngreso', 'url'=>array('admin')),
);
?>

<h1>Tipo Fuente Ingresos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
