<?php
/* @var $this CharlaController */
/* @var $model Charla */

$this->breadcrumbs=array(
	'Charlas'=>array('index'),
	$model->charla_id=>array('view','id'=>$model->charla_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Charla', 'url'=>array('index')),
	array('label'=>'Create Charla', 'url'=>array('create')),
	array('label'=>'View Charla', 'url'=>array('view', 'id'=>$model->charla_id)),
	array('label'=>'Manage Charla', 'url'=>array('admin')),
);
?>

<h1>Update Charla <?php echo $model->charla_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>