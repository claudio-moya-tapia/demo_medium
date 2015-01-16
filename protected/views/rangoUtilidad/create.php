<?php
/* @var $this RangoUtilidadController */
/* @var $model RangoUtilidad */

$this->breadcrumbs=array(
	'Rango Utilidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RangoUtilidad', 'url'=>array('index')),
	array('label'=>'Manage RangoUtilidad', 'url'=>array('admin')),
);
?>

<h1>Create RangoUtilidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>