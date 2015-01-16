<?php
/* @var $this UsuarioInteresController */
/* @var $model UsuarioInteres */

$this->breadcrumbs=array(
	'Usuario Interes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuarioInteres', 'url'=>array('index')),
	array('label'=>'Manage UsuarioInteres', 'url'=>array('admin')),
);
?>

<h1>Create UsuarioInteres</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>