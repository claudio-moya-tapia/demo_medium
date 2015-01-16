<?php
/* @var $this TipoAreaEspecialidadController */
/* @var $model TipoAreaEspecialidad */

$this->breadcrumbs=array(
	'Tipo Area Especialidads'=>array('index'),
	$model->tipo_area_especialidad_id=>array('view','id'=>$model->tipo_area_especialidad_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoAreaEspecialidad', 'url'=>array('index')),
	array('label'=>'Create TipoAreaEspecialidad', 'url'=>array('create')),
	array('label'=>'View TipoAreaEspecialidad', 'url'=>array('view', 'id'=>$model->tipo_area_especialidad_id)),
	array('label'=>'Manage TipoAreaEspecialidad', 'url'=>array('admin')),
);
?>

<h1>Update TipoAreaEspecialidad <?php echo $model->tipo_area_especialidad_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>