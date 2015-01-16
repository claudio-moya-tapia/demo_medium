<?php
/* @var $this RangoEmpleadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rango Empleados',
);

$this->menu=array(
	array('label'=>'Create RangoEmpleado', 'url'=>array('create')),
	array('label'=>'Manage RangoEmpleado', 'url'=>array('admin')),
);
?>

<h1>Rango Empleados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
