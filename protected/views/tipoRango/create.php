<?php
/* @var $this TipoRangoController */
/* @var $model TipoRango */

$this->breadcrumbs=array(
	'Tipo Rangos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoRango', 'url'=>array('index')),
	array('label'=>'Manage TipoRango', 'url'=>array('admin')),
);
?>

<h1>Create TipoRango</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>