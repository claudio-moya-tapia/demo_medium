<?php
/* @var $this ActualController */
/* @var $model Actual */

$this->breadcrumbs=array(
	'Actuals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Actual', 'url'=>array('index')),
	array('label'=>'Manage Actual', 'url'=>array('admin')),
);
?>

<h1>Create Actual</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>