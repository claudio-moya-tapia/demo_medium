<?php
/* @var $this EmpresaRangoController */
/* @var $model EmpresaRango */

$this->breadcrumbs=array(
	'Empresa Rangos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmpresaRango', 'url'=>array('index')),
	array('label'=>'Manage EmpresaRango', 'url'=>array('admin')),
);
?>

<h1>Create EmpresaRango</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>