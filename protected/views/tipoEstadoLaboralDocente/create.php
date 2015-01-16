<?php
/* @var $this TipoEstadoLaboralDocenteController */
/* @var $model TipoEstadoLaboralDocente */

$this->breadcrumbs=array(
	'Tipo Estado Laboral Docentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEstadoLaboralDocente', 'url'=>array('index')),
	array('label'=>'Manage TipoEstadoLaboralDocente', 'url'=>array('admin')),
);
?>

<h1>Create TipoEstadoLaboralDocente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>