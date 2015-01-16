<?php
/* @var $this EsOptativoController */
/* @var $model EsOptativo */

$this->breadcrumbs=array(
	'Es Optativos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EsOptativo', 'url'=>array('index')),
	array('label'=>'Manage EsOptativo', 'url'=>array('admin')),
);
?>

<h1>Create EsOptativo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>