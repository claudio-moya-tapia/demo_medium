<?php
/* @var $this TipoEstadoPostgradoController */
/* @var $model TipoEstadoPostgrado */

$this->breadcrumbs=array(
	'Tipo Estado Postgrados'=>array('index'),
	$model->tipo_estado_postgrado_id=>array('view','id'=>$model->tipo_estado_postgrado_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEstadoPostgrado', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoPostgrado', 'url'=>array('create')),
	array('label'=>'View TipoEstadoPostgrado', 'url'=>array('view', 'id'=>$model->tipo_estado_postgrado_id)),
	array('label'=>'Manage TipoEstadoPostgrado', 'url'=>array('admin')),
);
?>

<h1>Update TipoEstadoPostgrado <?php echo $model->tipo_estado_postgrado_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>