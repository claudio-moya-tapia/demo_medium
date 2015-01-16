<?php
/* @var $this TipoEstadoLaboralDocenteController */
/* @var $model TipoEstadoLaboralDocente */

$this->breadcrumbs=array(
	'Tipo Estado Laboral Docentes'=>array('index'),
	$model->tipo_estado_laboral_docente_id=>array('view','id'=>$model->tipo_estado_laboral_docente_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoEstadoLaboralDocente', 'url'=>array('index')),
	array('label'=>'Create TipoEstadoLaboralDocente', 'url'=>array('create')),
	array('label'=>'View TipoEstadoLaboralDocente', 'url'=>array('view', 'id'=>$model->tipo_estado_laboral_docente_id)),
	array('label'=>'Manage TipoEstadoLaboralDocente', 'url'=>array('admin')),
);
?>

<h1>Update TipoEstadoLaboralDocente <?php echo $model->tipo_estado_laboral_docente_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>