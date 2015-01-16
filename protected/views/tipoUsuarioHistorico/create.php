<?php
/* @var $this TipoUsuarioHistoricoController */
/* @var $model TipoUsuarioHistorico */

$this->breadcrumbs=array(
	'Tipo Usuario Historicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoUsuarioHistorico', 'url'=>array('index')),
	array('label'=>'Manage TipoUsuarioHistorico', 'url'=>array('admin')),
);
?>

<h1>Create TipoUsuarioHistorico</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>