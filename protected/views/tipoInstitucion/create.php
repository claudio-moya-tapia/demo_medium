<?php
/* @var $this TipoInstitucionController */
/* @var $model TipoInstitucion */

$this->breadcrumbs=array(
	'Tipo Institucions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoInstitucion', 'url'=>array('index')),
	array('label'=>'Manage TipoInstitucion', 'url'=>array('admin')),
);
?>

<h1>Create TipoInstitucion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>