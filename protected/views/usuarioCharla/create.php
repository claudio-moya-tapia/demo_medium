<?php
/* @var $this UsuarioCharlaController */
/* @var $model UsuarioCharla */

$this->breadcrumbs=array(
	'Usuario Charlas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuarioCharla', 'url'=>array('index')),
	array('label'=>'Manage UsuarioCharla', 'url'=>array('admin')),
);
?>

<h1>Create UsuarioCharla</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>