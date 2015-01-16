<?php
/* @var $this InstitucionController */
/* @var $model Institucion */

$this->breadcrumbs=array(
	'Institucions'=>array('index'),
	$model->institucion_id=>array('view','id'=>$model->institucion_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Institucion', 'url'=>array('index')),
	array('label'=>'Create Institucion', 'url'=>array('create')),
	array('label'=>'View Institucion', 'url'=>array('view', 'id'=>$model->institucion_id)),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>Update Institucion <?php echo $model->institucion_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>