<?php
/* @var $this TipoGiroController */
/* @var $model TipoGiro */

$this->breadcrumbs=array(
	'Tipo Giros'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoGiro', 'url'=>array('index')),
	array('label'=>'Manage TipoGiro', 'url'=>array('admin')),
);
?>

<h1>Create TipoGiro</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>