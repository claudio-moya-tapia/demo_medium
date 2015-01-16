<?php
/* @var $this ProgramaEstudioController */
/* @var $model ProgramaEstudio */

$this->breadcrumbs=array(
	'Programa Estudios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProgramaEstudio', 'url'=>array('index')),
	array('label'=>'Manage ProgramaEstudio', 'url'=>array('admin')),
);
?>

<h1>Create ProgramaEstudio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>