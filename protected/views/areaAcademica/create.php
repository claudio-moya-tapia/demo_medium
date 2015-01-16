<?php
/* @var $this AreaAcademicaController */
/* @var $model AreaAcademica */

$this->breadcrumbs=array(
	'Area Academicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AreaAcademica', 'url'=>array('index')),
	array('label'=>'Manage AreaAcademica', 'url'=>array('admin')),
);
?>

<h1>Create AreaAcademica</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>