<?php
/* @var $this TipoSituacionPostgradoController */
/* @var $model TipoSituacionPostgrado */

$this->breadcrumbs=array(
	'Tipo Situacion Postgrados'=>array('index'),
	$model->tipo_situacion_postgrado_id=>array('view','id'=>$model->tipo_situacion_postgrado_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoSituacionPostgrado', 'url'=>array('index')),
	array('label'=>'Create TipoSituacionPostgrado', 'url'=>array('create')),
	array('label'=>'View TipoSituacionPostgrado', 'url'=>array('view', 'id'=>$model->tipo_situacion_postgrado_id)),
	array('label'=>'Manage TipoSituacionPostgrado', 'url'=>array('admin')),
);
?>

<h1>Update TipoSituacionPostgrado <?php echo $model->tipo_situacion_postgrado_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>