<?php
/* @var $this CharlaController */
/* @var $model Charla */

$this->breadcrumbs=array(
	'Charlas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Charla', 'url'=>array('index')),
	array('label'=>'Manage Charla', 'url'=>array('admin')),
);
?>

<h1>Create Charla</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>