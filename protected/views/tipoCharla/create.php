<?php
/* @var $this TipoCharlaController */
/* @var $model TipoCharla */

$this->breadcrumbs=array(
	'Tipo Charlas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoCharla', 'url'=>array('index')),
	array('label'=>'Manage TipoCharla', 'url'=>array('admin')),
);
?>

<h1>Create TipoCharla</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>