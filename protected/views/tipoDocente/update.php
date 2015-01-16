<?php
/* @var $this TipoDocenteController */
/* @var $model TipoDocente */

$this->breadcrumbs=array(
	'Tipo Docentes'=>array('index'),
	$model->tipo_docente_id=>array('view','id'=>$model->tipo_docente_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoDocente', 'url'=>array('index')),
	array('label'=>'Create TipoDocente', 'url'=>array('create')),
	array('label'=>'View TipoDocente', 'url'=>array('view', 'id'=>$model->tipo_docente_id)),
	array('label'=>'Manage TipoDocente', 'url'=>array('admin')),
);
?>

<h1>Update TipoDocente <?php echo $model->tipo_docente_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>