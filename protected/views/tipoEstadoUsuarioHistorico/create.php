<?php
/* @var $this TipoEstadoUsuarioHistoricoController */
/* @var $model TipoEstadoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Estado Usuario Historicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoEstadoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Manage TipoEstadoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Create TipoEstadoUsuarioHistorico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>