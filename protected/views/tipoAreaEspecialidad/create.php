<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $model TipoAreaEspecialidad */

$this->breadcrumbs=array(
	'Tipo Area Especialidads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoAreaEspecialidad', 'url'=>array('index')),
	array('label'=>'Manage TipoAreaEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Create TipoAreaEspecialidad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>