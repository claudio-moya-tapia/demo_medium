<?php
/* @var $this UsuarioSocioController */
/* @var $model UsuarioSocio */

$this->breadcrumbs=array(
	'Usuario Socios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuarioSocio', 'url'=>array('index')),
	array('label'=>'Manage UsuarioSocio', 'url'=>array('admin')),
);
?>

<h1>Create UsuarioSocio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>