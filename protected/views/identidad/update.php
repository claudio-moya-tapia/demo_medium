<?php
/* @var $this IdentidadController */
/* @var $model Identidad */

$this->breadcrumbs=array(
	'Identidads'=>array('index'),
	$model->identidad_id=>array('view','id'=>$model->identidad_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Identidad', 'url'=>array('index')),
	array('label'=>'Create Identidad', 'url'=>array('create')),
	array('label'=>'View Identidad', 'url'=>array('view', 'id'=>$model->identidad_id)),
	array('label'=>'Manage Identidad', 'url'=>array('admin')),
);
?>

<h1>Update Identidad <?php echo $model->identidad_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>