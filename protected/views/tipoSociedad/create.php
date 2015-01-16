<?php
/* @var $this TipoSociedadController */
/* @var $model TipoSociedad */

$this->breadcrumbs=array(
	'Tipo Sociedads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoSociedad', 'url'=>array('index')),
	array('label'=>'Manage TipoSociedad', 'url'=>array('admin')),
);
?>

<h1>Create TipoSociedad</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>