<?php
/* @var $this TipoEstadoPostgradoController */
/* @var $model TipoEstadoPostgrado */

$this->breadcrumbs=array(
	'Tipo Estado Postgrados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEstadoPostgrado', 'url'=>array('index')),
	array('label'=>'Manage TipoEstadoPostgrado', 'url'=>array('admin')),
);
?>

<h1>Create TipoEstadoPostgrado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>