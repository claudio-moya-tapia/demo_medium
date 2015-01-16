<?php
/* @var $this IdentidadController */
/* @var $model Identidad */

$this->breadcrumbs=array(
	'Identidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Identidad', 'url'=>array('index')),
	array('label'=>'Manage Identidad', 'url'=>array('admin')),
);
?>

<h1>Create Identidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>