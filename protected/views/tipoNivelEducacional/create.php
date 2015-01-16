<?php
/* @var $this TipoNivelEducacionalController */
/* @var $model TipoNivelEducacional */

$this->breadcrumbs=array(
	'Tipo Nivel Educacionals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoNivelEducacional', 'url'=>array('index')),
	array('label'=>'Manage TipoNivelEducacional', 'url'=>array('admin')),
);
?>

<h1>Create TipoNivelEducacional</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>