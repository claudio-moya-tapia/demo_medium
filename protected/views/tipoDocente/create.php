<?php
/* @var $this TipoDocenteController */
/* @var $model TipoDocente */

$this->breadcrumbs=array(
	'Tipo Docentes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoDocente', 'url'=>array('index')),
	array('label'=>'Manage TipoDocente', 'url'=>array('admin')),
);
?>

<h1>Create TipoDocente</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>