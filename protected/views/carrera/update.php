<?php
/* @var $this CarreraController */
/* @var $model Carrera */

$this->breadcrumbs=array(
	'Carreras'=>array('index'),
	$model->carrera_id=>array('view','id'=>$model->carrera_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Carrera', 'url'=>array('index')),
	array('label'=>'Create Carrera', 'url'=>array('create')),
	array('label'=>'View Carrera', 'url'=>array('view', 'id'=>$model->carrera_id)),
	array('label'=>'Manage Carrera', 'url'=>array('admin')),
);
?>

<h1>Update Carrera <?php echo $model->carrera_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>