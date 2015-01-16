<?php
/* @var $this InteresController */
/* @var $model Interes */

$this->breadcrumbs=array(
	'Interes'=>array('index'),
	'Create',
);

?>

<h1>Crear Nuevo Interes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>