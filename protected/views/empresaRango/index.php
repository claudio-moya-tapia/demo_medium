<?php
/* @var $this EmpresaRangoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresa Rangos',
);

$this->menu=array(
	array('label'=>'Create EmpresaRango', 'url'=>array('create')),
	array('label'=>'Manage EmpresaRango', 'url'=>array('admin')),
);
?>

<h1>Empresa Rangos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
