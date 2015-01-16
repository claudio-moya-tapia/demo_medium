<?php
/* @var $this TipoSituacionPostgradoController */
/* @var $model TipoSituacionPostgrado */

$this->breadcrumbs=array(
	'Tipo Situacion Postgrados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoSituacionPostgrado', 'url'=>array('index')),
	array('label'=>'Manage TipoSituacionPostgrado', 'url'=>array('admin')),
);
?>

<h1>Create TipoSituacionPostgrado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>